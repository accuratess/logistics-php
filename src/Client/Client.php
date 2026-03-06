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

    public static function init(string $endpoint, array $headers = [])
    {
        self::$shared = new self($endpoint, $headers);
    }

    public function runQuery($query, bool $resultsAsArray = false, array $variables = [])
    {
        $queryString = (string) $query;
        $fileMap = $this->extractFiles($variables);

        if (empty($fileMap)) {
            $response = $this->httpClient->post('', [
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
            foreach ($fileMap as $path => $filePath) {
                $map[$index] = [$path];
                $multipart[] = [
                    'name'     => (string) $index,
                    'contents' => fopen($filePath, 'r'),
                    'filename' => basename($filePath),
                ];
                $index++;
            }

            // Insert 'map' after 'operations'
            array_splice($multipart, 1, 0, [[
                'name'     => 'map',
                'contents' => json_encode($map),
            ]]);

            $response = $this->httpClient->post('', [
                'multipart' => $multipart,
            ]);
        }

        $contents = $response->getBody()->getContents();
        $data = json_decode($contents, $resultsAsArray);

        return new class($data) {
            private $data;
            public function __construct($data) { $this->data = $data; }
            public function getResults() { 
                return is_array($this->data) ? ($this->data['data'] ?? []) : ($this->data->data ?? []); 
            }
            public function getData() { return $this->data; }
        };
    }

    private function extractFiles(&$variables, string $path = 'variables'): array
    {
        $files = [];
        if ($variables instanceof \UnitEnum) {
            return $files;
        }

        if (is_array($variables) || is_object($variables)) {
            foreach ($variables as $key => &$value) {
                $currentPath = $path . '.' . $key;
                if (is_string($value) && @file_exists($value) && !is_dir($value)) {
                    $files[$currentPath] = $value;
                    $value = null;
                } elseif (is_array($value) || is_object($value)) {
                    $files = array_merge($files, $this->extractFiles($value, $currentPath));
                }
            }
        }
        return $files;
    }
}
