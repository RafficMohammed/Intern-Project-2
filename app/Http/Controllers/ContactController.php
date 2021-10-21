<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUi()
    {
        return view ('contact');
    }
    public function contactStore(ContactRequest $request)
    {
      $contact=  Contact::create([
            'name' =>$request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        $users=User::where('role',1)->get();
        if (isset($users))
        {
            foreach ($users as $user)
          {
            Mail::to($user->email)->send(new ContactMail($contact));
          }
            return back()->with('contact-us','Your Response has been submitted');
        }
        else{

            return back()->with('contact-us','Your Response has been submitted');
        }


    }

    public function contactUserView()
    {
        return view('user.contact');
    }
    public function contactStoreDetails(ContactRequest $request)
    {
        $contact=Contact::create([
            'name' =>$request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);
        return redirect('dashboard')->with('contact-us','Your Response has been submitted');
    }
    public function deleteContactDetail($id)
    {
        Contact::where('id',$id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Your Response has been deleted Successfully !'
        ]);
    }

    public function editContact($id)
    {
       $contact= Contact::where('id',$id)->firstorfail();

       return view('user.edit',compact('contact'));
    }

    public function updateContact($id,ContactRequest $request)
    {
        Contact::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        return redirect('dashboard')->with('update','Response has been updated');
    }
}
