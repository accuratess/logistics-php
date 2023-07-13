<?php

namespace Accurate\Shipping\Models\Inputs\Fields;

use Accurate\Shipping\Models\Inputs\Fields\Delivered\Core\DeliveryType;
use Accurate\Shipping\Models\Inputs\Fields\Delivered\FullDeliveredType;

/**
 * The $deliveryType is FullDeliveredType or PartialDeliveredType
 *
 * @param FullDeliveredType|PartialDeliveredType  $deliveryType
 */
class DeliveredField
{
    public function __construct(public DeliveryType $deliveryType)
    {
        $this->deliveryType = $deliveryType;
    }
}
