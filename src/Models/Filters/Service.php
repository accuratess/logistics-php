<?php

namespace Accurate\Shipping\Models\Filters;

class Service
{
    /**
     * 
     *
     * @var int $serviceId
     */
    public int $serviceId;

    public function __construct(int $serviceId)
    {
        $this->serviceId = $serviceId;
    }
}
