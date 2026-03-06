<?php

namespace Accurate\Shipping\Services\Core;

use Accurate\Shipping\Client\Client;
use GraphQL\Exception\QueryError;

class Service
{
    /**
     *
     *
     * @param object $operation
     * @param array $variables
     * @return object
     */
    function runOperation(object $operation, ?array $variables = null)
    {
        try {
            $mutationResponse = Client::$shared->runQuery($operation, true, $variables ?? []);
            
            $fullData = $mutationResponse->getData();
            if (isset($fullData['errors'])) {
                return (object)[
                    'status' => 400,
                    'data' => $fullData['errors']
                ];
            }

            $result =  [
                'status' => 200,
                'data' => $mutationResponse->getResults()
            ];
            return (object)$result;
        } catch (\Exception $e) {
            $result =  [
                'status' => 500,
                'data' => $e->getMessage()
            ];
            return (object)$result;
        }
    }
}
