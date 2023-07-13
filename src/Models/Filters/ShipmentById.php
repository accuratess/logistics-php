<?php

namespace Accurate\Shipping\Models\Filters;

class ShipmentById
{
    /**
     * 
     *
     * @var int $id
     */
    public ?int $id;

    /**
     * 
     *
     * @var string $code
     */
    public ?string $code;

    public function __construct(
        int $id = null,
        string $code = null,
    ) {
        $this->id = $id;
        $this->code = $code;
    }
}
