<?php

namespace Accurate\Shipping\Models\Inputs\Fields\Delivered\Core;

use Accurate\Shipping\Enums\Types\DeliveryTypeField;
use Accurate\Shipping\Enums\Types\ShipmentStatusField;

abstract class DeliveryType
{
    /**
     * 
     *
     * @var ShipmentStatusField $statusCode
     */
    public string $statusCode;

    /**
     * 
     *
     * @var DeliveryTypeField $deliveryTypeCode
     */
    public string $deliveryTypeCode;

}
