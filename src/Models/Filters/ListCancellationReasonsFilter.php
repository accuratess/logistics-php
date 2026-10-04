<?php

namespace Accurate\Shipping\Models\Filters;

class ListCancellationReasonsFilter
{
    public function __construct(
        public ?bool $active = null,
    ) {}
}
