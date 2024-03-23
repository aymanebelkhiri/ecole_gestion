<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddNote extends Controller
{
    public function store(Request $request)
    {
        return view('prof.EtudiantNote',[
            "data"=>$request->all()
        ]);
        
    }
}
