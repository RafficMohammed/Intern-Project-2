<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function editAdminContact($id)
    {
        $contact=Contact::where('id',$id)->first();

        return view('admin.edit',compact('contact'));

    }
    public function updateAdminContact($id,ContactRequest $request)
    {
        Contact::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('dashboard')->with('update','Updated Successfully');

    }
    public function deleteAdminContact($id)
    {
        Contact::where('id',$id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Successfully deleted'
        ]);
    }
}
