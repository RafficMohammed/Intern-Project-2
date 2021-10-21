<?php

namespace Tests\Feature\DashController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dashboard_controller_return_view_dashboard_HomePage()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('dashboard');

        $response->assertStatus(200);
    }
}
