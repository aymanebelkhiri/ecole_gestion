<?php

namespace App\Http\Controllers;

use App\Mail\contact;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    // admin mapping 
    public function getMessage (){
        $contact = ContactMessage::orderBy('created_at', 'desc')->get();
        return view ('admin.contactAdmin.index',compact('contact'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactMessage = new ContactMessage();
        $contactMessage->name = $validatedData['name'];
        $contactMessage->email = $validatedData['email'];
        $contactMessage->subject = $validatedData['subject'];
        $contactMessage->message = $validatedData['message'];
        $contactMessage->save();
        $admins=Admin::all();
        foreach($admins as $admin){
        Mail::to($admin->Email)->send( new contact());
        }
        return redirect()->route('home')->with('successM', 'Your message was sent successfully!');
    }
}
