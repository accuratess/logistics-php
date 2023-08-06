<?php

namespace Accurate\Shipping\Services\Core;

use Accurate\Shipping\Client\Client;
use GraphQL\Exception\QueryError;
use GraphQL\Query;
use Illuminate\Support\Facades\Response;

class Service
{
    /**
     * 
     *
     * @param object $operation
     * @param array $variables
     * @return void
     */
    function runOperation(object $operation, ?array $variables = null): object
    {
        try {
            $mutationesponse = Client::$shared->runQuery($operation, true, $variables ?? []);
            return Response::json($mutationesponse->getResults(), 200);
        } catch (QueryError $e) {
            return Response::json($e->getErrorDetails(), 500);
        }
    }
}
