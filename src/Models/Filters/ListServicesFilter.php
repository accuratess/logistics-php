<?php

namespace Accurate\Shipping\Models\Filters;

class ListServicesFilter
{
    public function __construct(
        public ?bool $active = null,
    ) {}
}
