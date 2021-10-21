<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ManageUserControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_manage_user_controller_return_all_users_on_view_page()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $response=$this->get('manage/alluser');

        $response->assertStatus(200);
    }
    public function test_admin_manage_user_controller_edit_user_data()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $all=User::factory()->create();
        $response=$this->get('edit/admin-user/'.$all->id);
        $new=User::where('id',$all->id)->first();
        $this->assertEquals($all->email,$new->email);
        $response->assertStatus(200);
    }
    public function test_admin_manage_user_controller_update_other_user_data_on_database()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $all=User::factory()->create();
        $response=$this->post('update/admin-user/'.$all->id,[
            'name' => 'raju',
            'email' => 'e@gmail.com',
            'role' => 'on'
        ]);

        $new=User::all()->last();

       $this->assertEquals(1,$new->role);
       $this->assertEquals('e@gmail.com',$new->email);
       $this->assertEquals('raju',$new->name);
        $response->assertStatus(302);
    }
    public function test_admin_manage_user_controller_return_delete_user()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $all=User::factory()->create();
        $response=$this->get('delete/admin-user/'.$all->id);
        $this->assertDatabaseHas('users',['id'=>$user->id]);
        $this->assertDatabaseMissing('users',['id'=>$all->id]);
        $response->assertStatus(200);

    }
    public function test_admin_manage_user_controller_return_new_user_create_view_page()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $response=$this->get('new/admin-user');
        $response->assertStatus(200);
    }
    public function test_admin_manage_user_controller_return_create_new_user_data()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $response=$this->post('new/admin-user',[
            'name' => 'Mohammed raffic',
            'email' => 'rafficmani1998@gmail.com',
            'password' => '123456',
            'confirm' => '123456'
        ]);

        $new=User::all()->last();
        $this->assertEquals('Mohammed raffic',$new->name);
        $this->assertDatabaseHas('users',['id' => $new->id]);
        $response->assertStatus(302);
    }
}
