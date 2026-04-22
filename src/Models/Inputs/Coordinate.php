<?php

namespace Accurate\Shipping\Models\Inputs;

class Coordinate
{
    public function __construct(
        public float $latitude,
        public float $longitude,
    ) {}
}
