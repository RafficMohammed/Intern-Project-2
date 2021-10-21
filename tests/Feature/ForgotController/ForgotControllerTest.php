<?php

namespace Tests\Feature\ForgotController;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Notifications\DbNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class ForgotControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_forgot_controller_forgot_user_password_return_forgot_view_page()
    {
        $response = $this->get('forgot/user-password');

        $response->assertStatus(200);
    }

    public function test_forgot_controller_forgot_user_provide_email_return_verification_mail()
    {
        Mail::fake();
        $user=User::factory()->create([
            'email' => 'rafficmani1998@gmail.com'
        ]);
        $response=$this->post('forgot/user-password',[
            'email' => 'rafficmani1998@gmail.com'
        ]);

        Mail::assertSent(ForgotPasswordMail::class,function ($mail) use ($user)
        {
            return $mail->user->email === $user->email;
        });

        $response->assertStatus(302);
    }
    public function test_forgot_password_return_reset_Password_View()
    {
        $user=User::factory()->create();
         $response=$this->get('reset/user-password/'.$user->id);
         $response->assertStatus(200);
    }
    public function test_forgot_password_return_updated_reset_password_in_table()
    {
        $user=User::factory()->create();
        $response=$this->post('reset/user-password/'.$user->id,[
            'password' => Hash::make('123456')
        ]);
        $response->assertStatus(302);
    }
}
