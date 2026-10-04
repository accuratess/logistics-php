<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ZoneField;
use Accurate\Shipping\Models\Filters\ListZonesFilter;
use Accurate\Shipping\Services\Core\Service;
use Accurate\Shipping\Client\Query;
use Accurate\Shipping\Client\Variable;

class Zone extends Service
{
    public function listZones(ListZonesFilter $input, array $output)
    {
        $field = new Field(ZoneField::class, $output);
        $query = (new Query('listZonesDropdown'))
            ->setVariables([new Variable('input', 'ListZonesFilterInput', true)])
            ->setArguments([
                'input' => '$input',
            ])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query, ['input' => $input]);
    }
}
