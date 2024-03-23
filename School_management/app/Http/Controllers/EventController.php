<?php

namespace App\Http\Controllers;
use App\Http\Events;
use Illuminate\Support\facades\DB;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function getEvents(){
        
        $events = DB::table('Events')->get();
        return view('etudiant.Events',compact('events'));


    }
}
