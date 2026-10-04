<?php

namespace Accurate\Shipping\Models\Filters;

class ListServicesFilter
{
    public function __construct(
        public ?int $active = null,
    ) {}
}
