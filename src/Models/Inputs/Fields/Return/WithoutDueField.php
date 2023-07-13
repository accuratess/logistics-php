<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Return;

use Accurate\Shipping\Enums\Types\ReturnTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;
use Accurate\Shipping\Models\Inputs\Fields\Return\Core\ReturnType;

class WithoutDueField extends ReturnType
{
    public function __construct()
    {
        $this->statusCode = (ShipmentStatusField::RTS)->value;
        $this->returnTypeCode = (ReturnTypeField::WODF)->value;
        $this->cancellationReasonId = 1;
    }
}
