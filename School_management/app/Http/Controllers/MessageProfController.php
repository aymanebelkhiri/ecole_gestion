<?php

namespace App\Http\Controllers;

use App\Mail\message;
use Illuminate\Http\Request;
use App\Models\Prof;
use App\Models\MessageProf;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\facades\DB;
use Illuminate\Support\Facades\Mail;

class MessageProfController extends Controller
{
    public function FormMessage(){
        $Prof = Prof::pluck('Nom');
        return view('etudiant.FormProf',compact('Prof'));
    }

    public function SendMessage(Request $request){
       $request->validate([
        'Prof',
        'message'
       ]);

       
       $prof = Prof::where('Nom',$request->Prof)->value('id_prof');
       $email = Prof::where('Nom',$request->Prof)->value('Email');
       
       $Message = MessageProf::create([
           'Message'=>$request->message,
           'Prof'=>$prof,
           'Etudiant'=>Auth::user()->id
       ]);
       Mail::to($email)->send(new message());
       if($Message){
           $MessageSucces = 'Message sent successfully';
           return view('etudiant.FormProf',compact('MessageSucces'));
       }else{
           $MessageFail ='try again';
           return view('etudiant.FormProf',compact('MessageFail'));
       }
           
      
    }
}
