<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ZoneField;
use Accurate\Shipping\Models\Filters\ListZonesFilter;
use Accurate\Shipping\Services\Core\Service;
use GraphQL\Query;
use GraphQL\Variable;

class Zone extends Service
{
    /**
     * list zones if parentId = null or subzones parentId = the parentId that you want to get subzones for it 
     *
     * @param ListZonesFilterInput $input
     * @param array $output
     * @param [type] $paginatorInfo
     * @param integer|null $first
     * @param integer|null $page
     * @return void
     */
    public function listZones(ListZonesFilter $input, array $output)
    {
        $field = new Field(ZoneField::class, $output);
        $query = (new Query('listZonesDropdown'))
            ->setVariables([new Variable('input', 'ListZonesFilterInput', true)])
            ->setArguments([
                'input' => '$input',
            ])->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query, ['input' => $input]);
    }
}
