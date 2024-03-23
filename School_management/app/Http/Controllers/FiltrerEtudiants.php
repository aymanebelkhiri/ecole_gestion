<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FiltrerEtudiants extends Controller
{
    public function store(Request $request)
    {
        return view('admin.etudiants.liste',[
            "data"=>$request->all()
        ]);
        
    }
}
