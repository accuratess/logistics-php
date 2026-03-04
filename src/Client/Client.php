<?php

namespace Accurate\Shipping\Client;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    public static self $shared;
    private GuzzleClient $httpClient;
    private string $endpoint;
    private array $headers;

    public function __construct(string $endpoint, array $headers = [])
    {
        $this->endpoint = $endpoint;
        $this->headers = $headers;
        $this->httpClient = new GuzzleClient([
            'base_uri' => $endpoint,
            'headers'  => array_merge([
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ], $headers),
        ]);
    }

    public static function init(string $endpoint, array $headers = []): void
    {
        self::$shared = new self($endpoint, $headers);
    }

    public function runQuery(Query $query, bool $resultsAsArray = false, array $variables = []): GraphQLResponse
    {
        // Ensure the operation renders with the correct `query { }` / `mutation { }` wrapper
        $query->markAsRoot();
        $queryString = (string) $query;
        $fileMap = $this->extractFiles($variables);

        if (empty($fileMap)) {
            $response = $this->httpClient->post(self::$shared->endpoint, [
                'json' => [
                    'query'     => $queryString,
                    'variables' => $variables,
                ],
            ]);
        } else {
            $multipart = [
                [
                    'name'     => 'operations',
                    'contents' => json_encode([
                        'query'     => $queryString,
                        'variables' => $variables,
                    ]),
                ],
            ];

            $map = [];
            $index = 0;
            foreach ($fileMap as $path => $fileSource) {
                $map[$index] = [$path];

                $contents = $fileSource;
                $filename = 'file';

                if (is_string($fileSource)) {
                    $contents = fopen($fileSource, 'r');
                    $filename = basename($fileSource);
                } elseif ($fileSource instanceof \Psr\Http\Message\UploadedFileInterface) {
                    $contents = $fileSource->getStream()->detach();
                    $filename = $fileSource->getClientFilename();
                }

                $multipart[] = [
                    'name'     => (string) $index,
                    'contents' => $contents,
                    'filename' => $filename,
                ];
                $index++;
            }

            // Insert 'map' after 'operations'
            array_splice($multipart, 1, 0, [[
                'name'     => 'map',
                'contents' => json_encode($map),
            ]]);

            $response = $this->httpClient->post(self::$shared->endpoint, [
                'multipart' => $multipart,
            ]);
        }

        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, $resultsAsArray);

        return new GraphQLResponse($data);
    }

    protected function extractFiles(&$variables, string $path = 'variables'): array
    {
        $files = [];
        if (is_array($variables) || is_object($variables)) {
            foreach ($variables as $key => &$value) {
                $currentPath = $path . '.' . $key;
                if (is_string($value) && @file_exists($value) && !is_dir($value)) {
                    $files[$currentPath] = $value;
                    $value = null;
                } elseif ($value instanceof \Psr\Http\Message\UploadedFileInterface) {
                    $files[$currentPath] = $value;
                    $value = null;
                } elseif (is_object($value) || is_array($value)) {
                    $files = array_merge($files, $this->extractFiles($value, $currentPath));
                }
            }
        }
        return $files;
    }
}
