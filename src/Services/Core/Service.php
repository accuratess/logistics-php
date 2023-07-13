<?php

namespace Accurate\Shipping\Services\Core;

use Accurate\Shipping\Client\Client;
use GraphQL\Exception\QueryError;
use GraphQL\Query;
use Illuminate\Support\Facades\Response;

class Service implements ServiceInterface
{
    // /**
    //  * 
    //  *
    //  * @param array $output
    //  * @return void
    //  */
    // function getEnumValues(array $output): array
    // {
    //     $arrayValues = [];
    //     foreach ($output as $val) {
    //         if (is_array($val)) {
    //             $this->getEnumValues(output: $val);
    //         } else {
    //             $arrayValues[] = $val->value;
    //         }
    //     }
    //     return $arrayValues;
    // }

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

    // /**
    //  * 
    //  *
    //  * @param [type] $queryName
    //  * @param [type] $selectedValues
    //  * @return Query
    //  */
    // function buildQuery($queryName, $selectedValues): Query
    // {
    //     return (new Query($queryName))->setSelectionSet($this->getOutput($selectedValues));
    // }

    // /**
    //  * 
    //  *
    //  * @param [type] $output
    //  * @return array
    //  */
    // function getOutput($output): array
    // {
    //     $outer = [];
    //     foreach ($output as $key => $value) {
    //         if (is_array($value)) {
    //             $outer[] = $this->buildQuery($key, $value);
    //         } else {
    //             $outer[] = is_string($value) ? $value : $value->value;
    //         }
    //     }

    //     return $outer;
    // }
}
