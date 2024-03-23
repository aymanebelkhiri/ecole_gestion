<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

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

        return redirect()->route('home')->with('successM', 'Your message was sent successfully!');
    }
}
