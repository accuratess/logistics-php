<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ShipmentField;
use Accurate\Shipping\Models\Filters\ListShipmentFilter;
use Accurate\Shipping\Models\Filters\ShipmentById as FiltersShipmentById;
use Accurate\Shipping\Models\Inputs\filters\ShipmentById;
use Accurate\Shipping\Models\Inputs\Shipment as InputsShipment;
use Accurate\Shipping\Models\Inputs\UpdateStatus as UpdateStatusInput;
use Accurate\Shipping\Services\Core\Service as CoreService;
use GraphQL\Mutation;
use GraphQL\Query;
use GraphQL\Variable;
use UnitEnum;

/**
 * 
 */
class Shipment extends CoreService
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
     * @param ListShipmentFilter $input
     * @param array $output
     * @param [type] $paginatorInfo
     * @param integer|null $first
     * @param integer|null $page
     * @return void
     */
    public function listShipments(ListShipmentFilter $input, array $output, $paginatorInfo = null, int $first = null, int $page = null)
    {
        $field = new Field(ShipmentField::class, $output);

        $query = (new Query('listShipments'))
            ->setVariables([new Variable('input', 'ListShipmentsFilterInput', true)])
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

        return $this->runOperation($query, $variables);
    }

    /**
     * the delivery Agent is only use this 
     *
     * @param UpdateStatusInput $input
     * @param array $output
     */
    public function updateShipmentStatus(UpdateStatusInput $input, array $output)
    {
        $field = new Field(ShipmentField::class, $output);
        $mutation = (new Mutation('updateShipmentStatus'))
            ->setVariables([new Variable('input', 'UpdateShipmentStatusInput', true)])
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
