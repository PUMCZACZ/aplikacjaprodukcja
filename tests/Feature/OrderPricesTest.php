<?php
namespace Tests\Feature;

use App\Models\Order;
use App\OrderTypeEnum;
use Tests\TestCase;

class OrderPricesTest extends TestCase
{
    /** @test */
    public function it_calculates_order_bag_prices()
    {
        $order = Order::factory()->create([
            'quantity'   => 123,
            'order_type' => OrderTypeEnum::BAG,
        ]);

        // when
        $order->recalculatePrices();
        $order = $order->fresh();

        // then
        $this->assertInstanceOf(Order::class, $order);
        $this->assertNotNull($order->packing_cost);
        $this->assertEquals(298890, $order->packing_cost);
    }

    /** @test */
    public function it_calculates_order_big_bag_prices()
    {
        //given
        $order = Order::factory()->create([
            'order_type' => OrderTypeEnum::BIGBAG,
            'quantity'   => 3,
            'weight'     => 2045,
        ]);
        //when
        $order->recalculatePrices();
        $order = $order->fresh();
        //then
        $this->assertInstanceOf(Order::class, $order);
        $this->assertNotNull($order->packing_cost);
        $this->assertEquals(320250, $order->packing_cost);
    }
}
