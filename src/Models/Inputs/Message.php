<?php

namespace Accurate\Shipping\Models\Inputs;

use InvalidArgumentException;

class Message
{
    public function __construct(
        public ?int $conversationId = null,
        public ?int $shipmentId = null,
        public ?int $remoteShipmentId = null,  // Made nullable to allow one of them to be null
        public ?string $body = null,
        public ?array $images = [],
        public bool $syncIntegration = false,
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
        if (is_null($this->conversationId)) unset($this->conversationId);
        if (is_null($this->images)) unset($this->images);
    }
}
