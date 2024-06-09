<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\CancellationReasonField;
use Accurate\Shipping\Services\Core\Service as CoreService;
use GraphQL\Query;

class CancellationReason extends CoreService
{
    public function listcancellationreasons(array $output)
    {
        $field = new Field(CancellationReasonField::class, $output);
        $query = (new Query('listCancellationReasonsDropdown'))
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query);
    }
}
