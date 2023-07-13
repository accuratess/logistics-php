<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Return;

use Accurate\Shipping\Enums\Types\ReturnTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;
use Accurate\Shipping\Models\Inputs\Fields\Return\Core\ReturnType;

class FullyDueField extends  ReturnType
{
    public function __construct()
    {
        $this->returnTypeCode = (ReturnTypeField::WFDF)->value;
        $this->statusCode = (ShipmentStatusField::RTS)->value;
        $this->cancellationReasonId = 1;
    }
}
