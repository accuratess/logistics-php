<?php

namespace Accurate\Shipping\Models\Inputs;

use Accurate\Shipping\Models\Inputs\Fields\DeliveredField;
use Accurate\Shipping\Models\Inputs\Fields\ExceptionField;
use Accurate\Shipping\Models\Inputs\Fields\HoldedField;
use Accurate\Shipping\Models\Inputs\Fields\ReturnField;
use InvalidArgumentException;

/**
 * 
 */
class UpdateStatus
{
    public function __construct(
        public ?int $id = null,  // Made nullable to allow one of them to be null
        public ?int $remoteShipmentId = null,  // Made nullable to allow one of them to be null
        public ?string $notes = '',
        public ?DeliveredField $deliveredField = null,
        public ?ExceptionField $deliveryException = null,
        public ?HoldedField $holdToRedeliver = null,
        public ?ReturnField $returnField = null,
    ) {
        // Validate that at least one of $id or $remoteShipmentId is provided
        if (is_null($id) && is_null($remoteShipmentId)) {
            throw new InvalidArgumentException('Either id or remoteShipmentId must be provided.');
        }

        // Optional: Add a check to prevent both from being set simultaneously if needed
        if (!is_null($id) && !is_null($remoteShipmentId)) {
            throw new InvalidArgumentException('Both id and remoteShipmentId cannot be provided together.');
        }
    }
}
