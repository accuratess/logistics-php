<?php

namespace Accurate\Shipping\Models\Filters;

class PickupById
{
    public function __construct(public ?int $id = null, public ?string $code = null)
    {
    }
}
