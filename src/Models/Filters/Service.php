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

    /**
     *
     *
     * @var int $fromZoneId
     */
    public int $fromZoneId;

    /**
     *
     *
     * @var int $fromSubzoneId
     */
    public int $fromSubzoneId;

    public function __construct(int $serviceId,int $fromZoneId,int $fromSubzoneId)
    {
        $this->serviceId = $serviceId;
        $this->fromZoneId = $fromZoneId;
        $this->fromSubzoneId = $fromSubzoneId;
    }
}
