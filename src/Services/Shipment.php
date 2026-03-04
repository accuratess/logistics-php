<?php

namespace Accurate\Shipping\Services;

use Accurate\Shipping\Enums\Fields\Core\Field;
use Accurate\Shipping\Enums\Fields\ShipmentField;
use Accurate\Shipping\Models\Filters\ListShipmentFilter;
use Accurate\Shipping\Models\Filters\ShipmentById as FiltersShipmentById;
use Accurate\Shipping\Models\Inputs\Shipment as InputsShipment;
use Accurate\Shipping\Models\Inputs\UpdateStatus as UpdateStatusInput;
use Accurate\Shipping\Services\Core\Service as CoreService;
use Accurate\Shipping\Client\Mutation;
use Accurate\Shipping\Client\Query;
use Accurate\Shipping\Client\Variable;

/**
 * Service for Shipment-related GraphQL operations.
 */
class Shipment extends CoreService
{
    /**
     * Fetch a single shipment by ID or code.
     *
     * @param FiltersShipmentById $input
     * @param array               $output
     * @return object
     */
    public function shipment(FiltersShipmentById $input, array $output): object
    {
        $field = new Field(ShipmentField::class, $output);

        $query = (new Query('shipment'))
            ->setArguments($input->id !== null ? ['id' => $input->id] : ['code' => $input->code])
            ->setSelectionSet($field->toArray());

        return $this->runOperation($query);
    }

    /**
     * Create or update a shipment.
     *
     * @param InputsShipment $input
     * @param array          $output
     * @return object
     */
    public function saveShipment(InputsShipment $input, array $output): object
    {
        $field = new Field(ShipmentField::class, $output);
        $mutation = (new Mutation('saveShipment'))
            ->setVariables([new Variable('input', 'ShipmentInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet($field->toArray());

        return $this->runOperation($mutation, $this->prepareVariables($input));
    }

    /**
     * Delete a shipment by ID.
     *
     * @param int   $id
     * @param array $output
     * @return object
     */
    public function deleteShipment(int $id, array $output): object
    {
        $field = new Field(ShipmentField::class, $output);
        $mutation = (new Mutation('deleteShipment'))
            ->setArguments(['id' => $id])
            ->setSelectionSet($field->toArray());

        return $this->runOperation($mutation);
    }

    /**
     * List shipments with pagination.
     *
     * @param ListShipmentFilter $input
     * @param array              $output
     * @param int|null           $first
     * @param int|null           $page
     * @return object
     */
    public function listShipments(ListShipmentFilter $input, array $output, ?int $first = null, ?int $page = null): object
    {
        $field = new Field(ShipmentField::class, $output);

        $query = (new Query('listShipments'))
            ->setVariables([
                new Variable('input', 'ListShipmentsFilterInput', true),
                new Variable('first', 'Int', false),
                new Variable('page', 'Int', false),
            ])
            ->setArguments([
                'input' => '$input',
                'first' => '$first',
                'page'  => '$page',
            ])
            ->setSelectionSet([
                (new Query('paginatorInfo'))->setSelectionSet([
                    'hasMorePages',
                    'currentPage',
                    'count',
                    'total',
                    'lastPage',
                ]),
                (new Query('data'))->setSelectionSet($field->toArray()),
            ]);

        $cleanInput = (object) array_filter((array) $input, fn($val) => !is_null($val));

        $variables  = [
            'input' => $cleanInput,
            'first' => $first ?? 20,
            'page'  => $page ?? 1,
        ];

        return $this->runOperation($query, $variables);
    }

    /**
     * Update the status of a shipment (used by delivery agents).
     *
     * @param UpdateStatusInput $input
     * @param array             $output
     * @return object
     */
    public function updateShipmentStatus(UpdateStatusInput $input, array $output): object
    {
        $field = new Field(ShipmentField::class, $output);
        $mutation = (new Mutation('updateShipmentStatus'))
            ->setVariables([new Variable('input', 'UpdateShipmentStatusInput', true)])
            ->setArguments(['input' => '$input'])
            ->setSelectionSet($field->toArray());

        return $this->runOperation($mutation, ['input' => $this->removeNulls($input)]);
    }

    // ------------------------------------------------------------------ //
    //  Private helpers
    // ------------------------------------------------------------------ //

    private function prepareVariables(InputsShipment $input): array
    {
        $data = clone $input;
        if ($data->id === null) unset($data->id);
        if ($data->code === null) unset($data->code);
        return ['input' => $data];
    }

    /**
     * Recursively remove null values from an object/array while
     * preserving the nested structure (does NOT flatten).
     */
    private function removeNulls(mixed $input): mixed
    {
        if (is_object($input)) {
            $result = [];
            foreach ((array) $input as $key => $value) {
                if (!is_null($value)) {
                    $result[$key] = $this->removeNulls($value);
                }
            }
            return (object) $result;
        }

        if (is_array($input)) {
            return array_filter(
                array_map(fn($v) => $this->removeNulls($v), $input),
                fn($v) => !is_null($v)
            );
        }

        return $input;
    }
}
