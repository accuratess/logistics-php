<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Enums\Types\ShipmentStatusField;

class HoldedField
{
    public string $statusCode;

    public function __construct(
        public int $cancellationReasonId,
        public $deliveryDate = null,
    ) {
        $this->statusCode = (ShipmentStatusField::HTR)->value;
    }
}
