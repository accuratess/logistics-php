<?php

namespace Accurate\Shipping\Services\Core;

use GraphQL\Query;

interface ServiceInterface
{
    // /**
    //  * 
    //  *
    //  * @param array $output
    //  * @return array
    //  */
    // public function getEnumValues(array $output): array;

    // /**
    //  *
    //  *
    //  * @param string $queryName
    //  * @param array $selectedValues
    //  * @return void
    //  */
    // public function buildQuery($queryName, $selectedValues): Query;

    // /**
    //  * 
    //  *
    //  * @param array $output
    //  * @return array
    //  */
    // public function getOutput($output): array;

    /**
     * 
     *
     * @param array $output
     * @return array
     */
    public function runOperation(object  $operation, ?array $variables = null): object;
}
