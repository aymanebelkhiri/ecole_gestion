<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class addAbsence extends Controller
{
    public function store(Request $request)
    {
        return view('prof.EtudiantAbsence',[
            "data"=>$request->all()
        ]);
        
    }
}
