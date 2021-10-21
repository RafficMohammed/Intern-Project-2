<?php

namespace Tests\Feature\UserController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_controller_return_register_Ui()
    {
        $response = $this->get('register-new-member');

        $response->assertStatus(200);
    }
    public function test_user_controller_register_User_Details_store_user_details()
    {
        $response=$this->post('register-new-member',[
            'name' => 'raffic',
            'email' => 'raffimani1998@gmail.com',
            'password' => '123456',
            'confirm'=>'123456'
        ]);

        //dd($response);
        $user=User::first();
        $this->assertEquals('raffic',$user->name);
        $response->assertStatus(302);
    }
    public function test_user_controller_login_User_Details_return_redirect_dashboard()
    {
        $user=User::factory()->create();
        $response=$this->post('/',[
            'email' => $user->email,
            'password' => $user->password
        ]);
        $new = User::first();
        $this->assertEquals($user->email,$new->email);
        $this->assertEquals('0',$new->role);
        $response->assertStatus(302);
    }
    public function test_user_controller_logout_user_return_login_page()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $response=$this->get('logout',[$user]);

        $response->assertStatus(200);
    }
}
