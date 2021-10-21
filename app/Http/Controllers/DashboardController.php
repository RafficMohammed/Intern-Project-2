<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardHomePage()
    {
        $user=Auth::user();
        $conall=Contact::all();
        $contact =Contact::where('email',$user->email)->get();
        if ($user->role==0)
        {
            return view('user.dashboard',compact('contact','user'));
        }
        else
        {
            return  view('admin.dashboard',compact('conall','user'));
        }

    }
}
