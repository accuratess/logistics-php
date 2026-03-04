<?php

namespace Accurate\Shipping\Enums\Fields\Core;

use Exception;
use Accurate\Shipping\Client\Query;
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
     * Convert the selected fields to an array suitable for Query::setSelectionSet().
     * Resets internal state on each fresh (top-level) call to prevent duplicate entries.
     *
     * @param array|null $selected Internal use for recursion — pass null from outside.
     * @return array
     */
    function toArray(?array $selected = null): array
    {
        // Reset output only on a fresh (non-recursive) call
        if ($selected === null) {
            $this->out = [];
        }

        foreach ($selected ?? $this->selected as $value) {
            if ($value instanceof self) {
                // Recursively resolve nested Field scopes into a Query sub-node
                $nestedItems = [];
                foreach ($value->fields as $field) {
                    if ($field instanceof self) {
                        // Recurse into deeply nested Field
                        $nestedItems = array_merge($nestedItems, $this->toArray($field->fields));
                    } else {
                        $nestedItems[] = is_string($field) ? $field : $field->value;
                    }
                }
                $this->out[] = $this->buildQuery($value->scopeName, $nestedItems);
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
