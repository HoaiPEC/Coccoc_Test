<?php

class Item
{
    protected $shippingFee;
    protected $price;

    public function __construct(ShippingFeeInterface $shippingFee, $price)
    {
        $this->shippingFee = $shippingFee;
        $this->price = $price;
    }

    public function getItemPrice()
    {
        return $this->getPrice() + $this->shippingFee->calculateShippingFee();
    }

    public function getPrice()
    {
        return $this->price;
    }
}