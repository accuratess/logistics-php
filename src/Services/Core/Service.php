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
                return (object) [
                    'status' => 422,
                    'data'   => null,
                    'errors' => $response->getErrors(),
                ];
            }

            return (object) [
                'status' => 200,
                'data'   => $response->getResults(),
            ];
        } catch (\Exception $e) {
            return (object) [
                'status' => 500,
                'data'   => $e->getMessage(),
            ];
        }
    }
}
