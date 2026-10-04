<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ServiceField;
use Accurate\Shipping\Services\Core\Service as CoreService;
use Accurate\Shipping\Client\Query;
use Accurate\Shipping\Client\Variable;
use Accurate\Shipping\Models\Filters\ListServicesFilter;

class Service extends CoreService
{
    public function listServices(ListServicesFilter $input, array $output)
    {
        $field = new Field(ServiceField::class, $output);
        $query = (new Query('listShippingServicesDropdown'))
            ->setVariables([new Variable('input', 'ListShippingServicesFilterInput', true)])
            ->setArguments([
                'input' => '$input',
            ])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query, ['input' => $input]);
    }
}
