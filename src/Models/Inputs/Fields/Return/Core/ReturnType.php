<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Return\Core;

/**
 * 
 */
abstract class ReturnType
{
    public string $statusCode;
    public string $returnTypeCode;
    public int $cancellationReasonId;
}
