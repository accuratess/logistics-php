<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Return;

use Accurate\Shipping\Enums\Types\ReturnTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;
use Accurate\Shipping\Models\Inputs\Fields\Return\Core\ReturnType;

/**
 * 
 */
class FeesCollectedPartialyReturnField extends ReturnType
{
    /**
     * 
     *
     * @param float $fees
     */
    public function __construct(public float $fees)
    {
        $this->statusCode = (ShipmentStatusField::RTS)->value;
        $this->returnTypeCode = (ReturnTypeField::FPC)->value;
        $this->cancellationReasonId = 1;
        $this->fees = $fees;
    }
}
