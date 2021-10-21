<?php

namespace Tests\Feature\Admin;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_contact_controller_return_edit_contact_view()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $contact=Contact::factory()->create([]);
        $response = $this->get('edit/admin-contact/'.$contact->id);
        $new=Contact::first();
        $this->assertEquals($new->name,$contact->name);
        $this->assertEquals($new->subject,$contact->subject);
        $response->assertStatus(200);
    }

    public function test_admin_contact_controller_return_update_contact_view()
    {
       $user= User::factory()->create([
           'role' => 1
       ]);
       $this->actingAs($user);
        $contact=Contact::factory()->create();

        $response=$this->post('update/admin-contact/'.$contact->id,[
            'name' => $contact->name,
            'email' => $contact->email,
            'subject' => 'Testing',
            'message' => 'Good'
        ]);


        $con=Contact::first();
        $this->assertEquals(1,Contact::count());
        $this->assertEquals($contact->email,$con->email);
        $this->assertEquals('Good',$con->message);
        $response->assertStatus(302);

    }

    public function test_admin_contact_controller_return_delete_contact_controller()
    {
        $user=User::factory()->create([
            'role' => 1
        ]);
        $this->actingAs($user);
        $contact=Contact::factory()->create();
        $response=$this->get('delete/admin-contact/'.$contact->id);
        $this->assertDatabaseMissing('contacts',['id'=>1]);
        $response->assertStatus(200);
    }
}
