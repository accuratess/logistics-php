<?php

namespace Accurate\Shipping\Enums\Fields;

use Accurate\Shipping\Enums\Fields\Core\Field;


enum ShippingSettingsField: string
{
   
    case DEFAULT_SHIPPING_SERVICE = "defaultShippingService";



    static function defaultShippingService(array $fields): Field
    {
        return new Field(ShippingSettingsField::class, $fields, 'defaultShippingService');
    }

}
