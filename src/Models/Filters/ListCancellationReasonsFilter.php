<?php

namespace Accurate\Shipping\Models\Filters;

class ListCancellationReasonsFilter
{
    public function __construct(
        public ?int $active = null,
    ) {}
}
