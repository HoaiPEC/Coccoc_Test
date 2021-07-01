<?php

class ShippingFee implements ShippingFeeInterface
{
    private $weight;
    private $width;
    private $height;
    private $depth;

    public function __construct($weight, $width, $height, $depth)
    {
        $this->weight = $weight;
        $this->width = $width;
        $this->height = $height;
        $this->depth = $depth;
    }

    public function calculateShippingFee()
    {
        return max($this->feeByDimension(), $this->feeByWeight());
    }

    public function volume()
    {
        return $this->width * $this->height * $this->depth;
    }

    public function feeByWeight()
    {
        return $this->weight * config('weight_coefficient');
    }

    public function feeByDimension()
    {
        return $this->volume() * config('dimension_coefficient');
    }
}
