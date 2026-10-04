<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\CancellationReasonField;
use Accurate\Shipping\Services\Core\Service as CoreService;
use Accurate\Shipping\Client\Query;
use Accurate\Shipping\Client\Variable;
use Accurate\Shipping\Models\Filters\ListCancellationReasonsFilter;

class CancellationReason extends CoreService
{
    public function listcancellationreasons(ListCancellationReasonsFilter $input, array $output)
    {
        $field = new Field(CancellationReasonField::class, $output);
        $query = (new Query('listCancellationReasonsDropdown'))
            ->setVariables([new Variable('input', 'ListCancellationReasonsFilterInput', true)])
            ->setArguments([
                'input' => '$input',
            ])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($query, ['input' => $input]);
    }
}
