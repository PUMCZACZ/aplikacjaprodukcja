<?php
namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class TransportOutlineTest extends TestCase
{
    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = $this->createAdmin();
    }

    /** @test */
    public function it_has_transport_create_route()
    {
        // given
        $route = route('transport.create');

        // when
        $reponse = $this->actingAs($this->admin)
            ->get($route);

        // then
        $reponse->assertStatus(200);
        $reponse->assertSeeText('Dodaj transport');
    }
}
