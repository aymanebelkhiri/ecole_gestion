<?php

namespace App\Http\Controllers;

use App\Mail\editetudiant;
use App\Mail\event;
use App\Models\Etudiant;
use App\Models\Events;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Events = DB::table('events')->get();
        return view('admin.events.index',compact('Events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title' => 'required',
            'Description' => 'required',
            'Date' => 'required',
        ]);
        
        $input= $request->all();
        
        $event = Events::create($input);
        $etudiants=Etudiant::all();
        foreach($etudiants  as $et){
            Mail::to($et->Email)->send(new event());
        }
        if ($event) {
            return redirect()->route('events.index')->with('success', 'Evenement ajouté avec succès');
        } else {
            return redirect()->route('events.create')->with('fail', 'L\'événement n\'a pas été ajouté.');
        }
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    //    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $DeleteEvent= DB::table('events')->where('id_event',$id)->delete();
        return redirect()->route('events.index');
    }
}
