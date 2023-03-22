<?php
namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Order;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use InteractsWithDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_protects_admin_routes()
    {
        // given
        $admin = $this->createAdmin();
        $notAdmin = $this->createUser();

        // when
        $adminResponse = $this
            ->actingAs($admin)
            ->get(route('home'));

        // then
        $adminResponse->assertStatus(200);

        // when
        $notAdminResponse = $this->actingAs($notAdmin)
            ->get(route('home'));

        // then
        $notAdminResponse->assertStatus(JsonResponse::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_test_db()
    {
        // given
        $count = Order::query()->count();
        $order = Order::factory()->create();

//        $this->assertDatabaseCount('orders', $count+1);

        $this->assertEquals($count + 1, Order::query()->count());

        // when
//        $this->assertEquals(3, $order->weight);
    }
}
