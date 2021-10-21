<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ManageUserController extends Controller
{
    public function manageAllUser()
    {
        $auth = Auth::user();
        $user = User::where('email' ,'!=', $auth->email)->get();
        return view('admin.manageuser',compact('user'));
    }
    public function editAllUser($id)
    {
        $user=User::where('id',$id)->first();
        return view('admin.edituser',compact('user'));
    }

    public function deleteAdminUser($id)
    {
        User::where('id',$id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Deleted Successfully'
        ]);
    }
    public function newUser()
    {
        return view('admin.newuser');
    }
    public function newUserStoreDetails(RegisterRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('manage/alluser');
    }

    public function updateAdminUser($id,Request $request)
    {

       $user= User::where('id',$id)->update([
           'name' => $request->name,
           'email' => $request->email,
           'role' => $request->role == 'on'?1:0,
        ]);

       return redirect('manage/alluser');

    }
}
