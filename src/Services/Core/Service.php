<?php

namespace Accurate\Shipping\Services\Core;

use Accurate\Shipping\Client\Client;
use Accurate\Shipping\Client\Query;

class Service
{
    /**
     * Executes a GraphQL operation and returns a structured result object.
     *
     * @param Query  $operation  A Query or Mutation instance.
     * @param array  $variables  Optional GraphQL variables.
     * @return object  { status: int, data: mixed, errors?: array }
     */
    function runOperation(Query $operation, ?array $variables = null): object
    {
        try {
            $response = Client::$shared->runQuery($operation, true, $variables ?? []);

            if ($response->hasErrors()) {
                return $this->response($response->getErrors(), 422);
            }

            return $this->response($response->getResults(), 200);
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), 500);
        }
    }

    protected function response(mixed $data, int $status = 200): object
    {
        return (object) [
            'status' => $status,
            'data'   => $data
        ];
    }
}
