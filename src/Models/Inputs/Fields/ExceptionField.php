<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Enums\Types\ShipmentStatusField;

class ExceptionField
{
    public string $statusCode;
    public int $cancellationReasonId;

    public function __construct()
    {
        $this->statusCode = (ShipmentStatusField::DEX)->value;
        $this->cancellationReasonId = 1;
    }
}
