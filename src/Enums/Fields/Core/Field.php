<?php

namespace Accurate\Shipping\Enums\Fields\Core;

use Exception;
use GraphQL\Query;
use UnitEnum;

class Field
{
    public $selected;
    public $out = [];

    function __construct(public $enumClass, public array $fields, public ?string $scopeName = null)
    {
        $this->selected = $fields;
        foreach ($fields as $field) {
            if ($field instanceof UnitEnum && !$field instanceof $enumClass) {
                throw new Exception(get_class($field) . '::' . $field->name . ' is not of type ' . $enumClass);
            }
        }
    }

    /**
     * 
     *
     * @param [type] $output
     * @return array
     */
    function toArray($selected = null): array
    {
        foreach ($selected ?? $this->selected  as $value) {
            if ($value instanceof self) {
                $this->out[] = $this->buildQuery($value->scopeName, array_map(function ($field) {
                    if ($field instanceof self) $this->toArray($field);
                    return $field->value;
                }, $value->fields));
            } else {
                $this->out[] = is_string($value) ? $value : $value->value;
            }
        }

        return $this->out;
    }

    /**
     * 
     *
     * @param [type] $queryName
     * @param [type] $selectedValues
     * @return Query
     */
    function buildQuery($queryName, $selectedValues): Query
    {
        return (new Query($queryName))->setSelectionSet($selectedValues);
    }
}
