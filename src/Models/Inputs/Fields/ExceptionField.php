<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Enums\Types\ShipmentStatusField;

class ExceptionField
{
    public string $statusCode;

    public function __construct(public ?int $cancellationReasonId = null)
    {
        $this->statusCode = (ShipmentStatusField::DEX)->value;
    }
}
