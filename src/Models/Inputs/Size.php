<?php

namespace Accurate\Shipping\Models\Inputs;

class Size
{
    /**
     * 
     *
     * @var float $length
     */
    public float $length;

    /**
     * 
     *
     * @var float $height
     */
    public float $height;

    /**
     * 
     *
     * @var float $width
     */
    public float $width;

    public function __construct(float $length = null, $width = null, float $height = null)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
    }
}
