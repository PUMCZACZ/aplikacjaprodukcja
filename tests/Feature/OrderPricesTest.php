<?php
namespace Tests\Feature;

use App\Models\Order;
use Tests\TestCase;

class OrderPricesTest extends TestCase
{
    /** @test */
    public function it_calculates_order_prices()
    {
        $order = Order::factory()->create([
            'quantity' => 123,
        ]);

        // when
        $order->recalculatePrices();
        $order = $order->fresh();

        // then
        $this->assertInstanceOf(Order::class, $order);
        $this->assertNotNull($order->packing_cost);
        $this->assertEquals(298890, $order->packing_cost);
    }
}
