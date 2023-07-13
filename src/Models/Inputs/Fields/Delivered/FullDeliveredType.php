<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Delivered;


use Accurate\Shipping\Models\Inputs\Fields\Delivered\Core\DeliveryType;
use Accurate\Shipping\Enums\Types\DeliveryTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;

class FullDeliveredType extends DeliveryType
{
    public function __construct()
    {
        $this->statusCode = (ShipmentStatusField::DTR)->value;
        $this->deliveryTypeCode = (DeliveryTypeField::FD)->value;
    }
}
