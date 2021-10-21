<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPassword extends Controller
{
    public function forgotPasswordView()
    {
        return view('forgotPassword');
    }
    public function linkForgotPassword(Request $request)
    {
        $user =User::where('email',$request->email)->first();
        if ($user)
        {
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return back()->with('link','We had sent link in an email');
        }else
        {
            return back()->with('link','Invalid Email Id');
        }
    }

    public function resetPasswordView($id)
    {
        $user=User::where('id',$id)->first();
        return view('resetPassword',compact('user'));

    }
    public function passwordChanged($id,Request $request)
    {
        User::where('id',$id)->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/')->with('passwordChanged','Password has been changed Successfully');
    }


}
