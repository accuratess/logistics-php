<?php

namespace Accurate\Shipping\Models\Filters;

class ShipmentById
{
    public function __construct(public ?int $id = null, public ?string $code = null)
    {
    }
}
