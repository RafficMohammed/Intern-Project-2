<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function registerUi()
    {
        return view('register');
    }
    public function registerUserDetails(RegisterRequest $request)
    {
       $user= User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('dashboard')->with('login','Registered Successfully,Please login to the Dashboard');

    }


    public function loginUserDetails(LoginRequest $request)
    {
        $user=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

        return redirect('dashboard');
    }
    public function logoutUser()
    {
        Auth::logout();
        return view('login');
    }
}
