<?php

namespace Tests;
use PHPUnit\Framework\TestCase;
use function MongoDB\Driver\Monitoring\removeSubscriber;

class ItemTest extends TestCase
{
    protected $item;
    protected $shippingFee;

    protected function setUp(): void
    {
        parent::setUp();
        $this->item = new \Item(new \ShippingFee(10, 10, 30, 10), 1000);
        $this->shippingFee = new \ShippingFee(10, 10, 30, 10);
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        unset($this->item);
        unset($this->shippingFee);
    }

    public function test_get_price_function()
    {
        $result = $this->item->getPrice();
        $this->assertEquals($result, 1000);
    }

    public function test_get_item_price_function()
    {
        $result = $this->item->getItemPrice();
        $this->assertEquals($result, 1000 + $this->shippingFee->calculateShippingFee());
    }

    public function testTrueIsTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }
}