<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\PickupField;
use Accurate\Shipping\Models\Filters\ListPickupFilter;
use Accurate\Shipping\Models\Filters\ShipmentById as FiltersShipmentById;
use Accurate\Shipping\Models\Inputs\filters\ShipmentById;
use Accurate\Shipping\Models\Inputs\Shipment as InputsShipment;
use Accurate\Shipping\Models\Inputs\UpdateStatus as UpdateStatusInput;
use Accurate\Shipping\Services\Core\Service as CoreService;
use GraphQL\Mutation;
use GraphQL\Query;
use GraphQL\Variable;

/**
 * 
 */
class Pickup extends CoreService
{
    /**
     * 
     *
     * @param ShipmentById $input
     * @param array $output
     * @return void
     */
    public function shipment(FiltersShipmentById $input, array $output)
    {
        $field = new Field(ShipmentField::class, $output);

        $query = (new Query('shipment'))
            ->setArguments($input->id != null ? ['id' => $input->id] : ['code' => $input->code])
            ->setSelectionSet(
                $field->toArray()
            );
        return $this->runOperation($query);
    }

    /**
     * Undocumented function
     *
     * @param ShipmentInput $input
     * @param array $output
     * @return void
     */
    public function saveShipment(InputsShipment $input, $output)
    {
        $field = new Field(ShipmentField::class, $output);
        $mutation = (new Mutation('saveShipment'))
            ->setVariables([new Variable('input', 'ShipmentInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(
                $field->toArray()
            );

        return $this->runOperation($mutation, $this->prepareVariables($input));
    }

    /**
     * prepare variabl set for save shipment [create, update]
     *
     * @param $input
     * @return array
     */
    private function prepareVariables($input): array
    {
        if ($input->id == null) unset($input->id);
        if ($input->code == null) unset($input->code);
        return ['input' => $input];
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @param array $output
     * @return void
     */
    public function deleteShipment(int $id, array $output)
    {
        $field = new Field(ShipmentField::class, $output);

        $query = (new Mutation('deleteShipment'))
            ->setArguments(['id' => $id])
            ->setSelectionSet(
                $field->toArray()
            );
        return $this->runOperation($query);
    }

    /**
     * Undocumented function
     *
     * @param ListPickupFilter $input
     * @param array $output
     * @param [type] $paginatorInfo
     * @param integer|null $first
     * @param integer|null $page
     * @return void
     */
    public function listPickups(ListPickupFilter $input, array $output, int $first = null, int $page = null): object
    {
        $field = new Field(PickupField::class, $output);

        $query = (new Query('listPickups'))
            ->setVariables([new Variable('input', 'ListPickupsFilterInput', true)])
            ->setArguments([
                'input' => '$input',
                'first' => $first,
                'page' => $page
            ])->setSelectionSet(
                [
                    (new Query('paginatorInfo'))->setSelectionSet(
                        [
                            "hasMorePages",
                            "currentPage",
                            "count",
                            "total",
                            "lastPage"
                        ]
                    ),
                    (new Query('data'))->setSelectionSet(
                        $field->toArray()
                    )
                ]
            );

        $result = (object) array_filter((array) $input, fn ($val) => !is_null($val));
        $variables = [
            'input' => $result, 'first' => $first, 'page' => $page
        ];
        /** @var mixed */
        $result = $this->runOperation($query, $variables);
        return $result;
    }

    /**
     * the delivery Agent is only use this 
     *
     * @param UpdateStatusInput $input
     * @param array $output
     */
    public function updatePickupStatus(UpdateStatusInput $input, array $output)
    {
        $field = new Field(PickupField::class, $output);
        $mutation = (new Mutation('updatePickupStatus'))
            ->setVariables([new Variable('input', 'UpdatePickupStatusInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet(
                $field->toArray()
            );
        return $this->runOperation($mutation, ['input' => $this->prepareInput($input)]);
    }

    function prepareInput($input)
    {
        $inputValues = [];
        foreach ($input as $key => $value) {
            if (!is_null($value)) {
                if (!is_object($value) && !is_array($value)) $inputValues[$key] = $value;
                if (is_object($value) || is_array($value)) $inputValues = array_merge($inputValues, $this->prepareInput($value));
            }
        }
        return  $inputValues;
    }
}
