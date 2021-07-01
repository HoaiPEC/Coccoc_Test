<?php

namespace Tests;
use PHPUnit\Framework\TestCase;

class ShippingFeeTest extends TestCase
{
    protected $shippingFee;

    protected function setUp(): void
    {
        parent::setUp();
        $this->shippingFee = new \ShippingFee(100, 200, 10, 20);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->shippingFee);
    }

    public function test_volume_function()
    {
        $result = $this->shippingFee->volume();
        $this->assertEquals($result, 200 * 10 * 20);
    }

    public function test_fee_by_weight_function()
    {
        $result = $this->shippingFee->feeByWeight();
        $this->assertEquals($result, 100 * config('weight_coefficient'));
    }

    public function test_fee_by_dimension_function()
    {
        $result = $this->shippingFee->feeByDimension();
        $this->assertEquals($result, 200 * 10 * 20 * config('dimension_coefficient'));
    }

    public function test_calculate_shipping_fee_function()
    {
        $result = $this->shippingFee->calculateShippingFee();
        $this->assertEquals($result, max(100 * config('weight_coefficient'), 200 * 10 * 20 * config('dimension_coefficient')));
    }
}