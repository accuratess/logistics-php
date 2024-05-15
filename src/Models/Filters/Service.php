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

    public function __construct(int $serviceId,int $fromZoneId = null,int $fromSubzoneId = null)
    {
        $this->serviceId = $serviceId;
        $this->fromZoneId = $fromZoneId;
        $this->fromSubzoneId = $fromSubzoneId;
        $this->prepareForInput();
    }

    public function prepareForInput(): void
    {
        if(is_null($this->fromZoneId)) unset($this->fromZoneId);
        if(is_null($this->fromSubzoneId)) unset($this->fromSubzoneId);
    }
}
