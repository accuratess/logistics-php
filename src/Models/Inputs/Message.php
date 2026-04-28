<?php

namespace Accurate\Shipping\Models\Inputs;

use Accurate\Shipping\Enums\Types\MessageTypeField;

class Message
{
    public function __construct(
        public int $conversationId,
        public MessageTypeField $typeCode,
        public ?string $body = null,
        public ?Coordinate $coordinates = null,
        public ?array $images = [],
    ) {
        $this->removeNullable();
    }

    public function removeNullable(): void
    {
        if (is_null($this->images)) unset($this->images);
        if (is_null($this->coordinates)) unset($this->coordinates);
    }
}
