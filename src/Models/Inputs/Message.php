<?php

namespace Accurate\Shipping\Models\Inputs;

class Message
{
    public function __construct(
        public ?int $conversationId = null,
        public ?int $shipmentId = null,
        public ?string $body = null,
        public ?array $images = [],
    ) {
        $this->removeNullable();
    }

    public function removeNullable(): void
    {
        if (is_null($this->shipmentId)) unset($this->shipmentId);
        if (is_null($this->conversationId)) unset($this->conversationId);
        if (is_null($this->images)) unset($this->images);
    }
}
