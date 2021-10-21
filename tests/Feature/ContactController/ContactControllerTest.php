<?php

namespace Tests\Feature\ContactController;

use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_contact_controller_return_contact_view()
    {
        $response = $this->get('contact');

        $response->assertStatus(200);
    }
    public function test_contact_controller_store_contact_details_on_contact_table()
    {
        $response = $this->post('contact',[
            'name' => 'Mohammed raffic',
            'email' => 'raffic1998@gmail.com',
            'subject' => 'Feature test',
            'message' => 'testing the contactControllerTest'
        ]);
        $user = User::factory()->create([
            'role' => 1,
        ]);
        $contact = Contact::first();
        Mail::to($user->email)->send(new ContactMail($contact));
       // dd($response->content());
        $response->assertSessionHas('contact-us');
        $response->assertStatus(302);
        $this->assertEquals('raffic1998@gmail.com',$contact->email);

    }
    public function test_contact_controller_contact_Store_Details_by_an_auth_user()
    {
        $user = User::factory()->create();
        $this->actingAs($user);
        $response=  $this->post('user-contact',[
            'name' => $user->name,
            'email' => $user->email,
            'subject' => 'Feature test',
            'message' => 'testing the contactControllerTest'
        ]);
        $contact = Contact::first();
      $response->assertStatus(302);
      $this->assertEquals($contact->name,$user->name);
      $response->assertSessionHas('contact-us');
    }

    public function test_contact_controller_delete_Contact_Detail_by_an_auth_user()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $contact=Contact::factory()->create([
            'name' => $user->name,
            'email'=> $user->email
        ]);
        $con=Contact::first();
        $response = $this->get('delete-contact/'.$contact->id);

        $response->assertStatus(200);
        $this->assertEquals($contact->id,$con->id);

    }
    public function test_contact_controller_edit_Contact_by_an_auth_user()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $contact=Contact::factory()->create([
            'name' => $user->name,
            'email'=> $user->email,
        ]);
        $response=$this->get('edit-contact/'.$contact->id);
        $con=Contact::first();
        $response->assertStatus(200);
        $this->assertEquals($contact->subject,$con->subject);

    }
    public function test_contact_controller_update_contact_by_an_auth_user()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $contact=Contact::factory()->create([
            'name' => $user->name,
            'email'=> $user->email,
        ]);
        $response=$this->post('update-contact/'.$contact->id,[
            'name'=>$contact->name,
            'email' =>$contact->email,
            'subject' => 'Good',
            'message' => 'Better'
        ]);
        $con=Contact::first();
        $response->assertStatus(302);
//        dd($con);
        $response->assertSessionHas('update');
        $this->assertEquals('Good',$con->subject);
        $this->assertNotEquals('Better',$contact->message);

    }
}
