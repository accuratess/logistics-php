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
    public $fromZoneId;

    /**
     *
     *
     * @var int $fromSubzoneId
     */
    public $fromSubzoneId;

    public function __construct(int $serviceId, $fromZoneId = null, $fromSubzoneId = null)
    {
        $this->serviceId = $serviceId;
        $this->fromZoneId = $fromZoneId;
        $this->fromSubzoneId = $fromSubzoneId;
    }
}
