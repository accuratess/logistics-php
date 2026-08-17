<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ShippingSettingsField;
use Accurate\Shipping\Services\Core\Service as CoreService;
use Accurate\Shipping\Client\Query;

class ShippingSettings extends CoreService
{
    public function shippingSettings(array $output)
    {
        $field = new Field(ShippingSettingsField::class, $output);
        $query = (new Query('shippingSettings'))
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query);
    }
}
