<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ServiceField;
use Accurate\Shipping\Services\Core\Service as CoreService;
use GraphQL\Query;

class Service extends CoreService
{
    public function listServices(array $output)
    {
        $field = new Field(ServiceField::class, $output);
        $query = (new Query('listShippingServicesDropdown'))
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query);
    }
}
