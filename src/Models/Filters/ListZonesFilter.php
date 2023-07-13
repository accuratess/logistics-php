<?php

namespace Accurate\Shipping\Models\Filters;

use Accurate\Shipping\Models\Filters\ListServiceFilter;

class ListZonesFilter
{
    /**
     * 
     *
     * @var int $parentId
     */
    public ?int $parentId;

    /**
     * 
     *
     * @var Service $service
     */
    public ?Service $service;

    public function __construct(
        ?int $parentId = null,
        ?Service $service = null,
    ) {
        $this->parentId = $parentId;
        $this->service = $service;
    }
}
