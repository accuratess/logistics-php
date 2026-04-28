<?php

namespace Accurate\Shipping\Models\Inputs;

use Accurate\Shipping\Enums\Types\ConversationTypeField;
use InvalidArgumentException;

class StartConversation
{
    public function __construct(
        public ConversationTypeField $subjectCode,
        public ?int $shipmentId = null,
        public ?int $remoteShipmentId = null,
    ) {
        $this->removeNullable();
        // Validate that at least one of $id or $remoteShipmentId is provided
        if (is_null($shipmentId) && is_null($remoteShipmentId)) {
            throw new InvalidArgumentException('Either id or remoteShipmentId must be provided.');
        }

        // Optional: Add a check to prevent both from being set simultaneously if needed
        if (!is_null($shipmentId) && !is_null($remoteShipmentId)) {
            throw new InvalidArgumentException('Both id and remoteShipmentId cannot be provided together.');
        }
    }

    public function removeNullable(): void
    {
        if (is_null($this->shipmentId)) unset($this->shipmentId);
        if (is_null($this->remoteShipmentId)) unset($this->remoteShipmentId);
    }
}
