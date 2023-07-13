<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Enums\Types\ShipmentStatusField;

class HoldedField
{
    public string $statusCode;
    public int $cancellationReasonId;

    public function __construct(
        public $deliveryDate = null,
    ) {
        $this->statusCode = (ShipmentStatusField::HTR)->value;
        $this->cancellationReasonId = 1;
        $this->deliveryDate = $deliveryDate;
    }
}
