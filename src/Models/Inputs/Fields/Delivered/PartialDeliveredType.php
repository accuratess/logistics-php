<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Delivered;

use Accurate\Shipping\Models\Inputs\Fields\Delivered\Core\DeliveryType;
use Accurate\Shipping\Enums\Types\DeliveryTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;

/**
 * 
 */
class PartialDeliveredType extends DeliveryType
{
    public function __construct(public float $deliveredAmount)
    {
        $this->statusCode = (ShipmentStatusField::DTR)->value;
        $this->deliveryTypeCode = (DeliveryTypeField::PD)->value;
        $this->deliveredAmount = $deliveredAmount;
    }
}
