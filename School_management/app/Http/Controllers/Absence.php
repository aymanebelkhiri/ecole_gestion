<?php

namespace App\Http\Controllers;

use App\Mail\absence as MailAbsence;
use App\Models\Absence_etudiant;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Absence extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Absence = new Absence_etudiant();
        $Absence->MasseHoraire= strip_tags($request->input("heures"));
        $Absence->module= strip_tags($request->input("module"));
        $Absence->Etudiant= strip_tags($request->input("etudiant"));
        $Absence->save();
        $et=Etudiant::findOrFail($Absence->Etudiant);
        Mail::to($et->Email)->send(new MailAbsence());

        return view('prof.EtudiantAbsence',[
            'success' => 'Absence    added successfully.',
            'data' => $request->all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $Absences =Absence_etudiant::where(["Etudiant"=>auth()->user()->id])->get();
            return view('etudiant.Absence',compact('Absences'));
           
        } catch (\Throwable $th) {
            return view('etudiant.Absence');
           
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $array = explode('*', $id);
    
        $id_abs = $array[0];  
        $grp = $array[1];   

        return view("prof.edit_absence",[
            
            "Absence"=>Absence_etudiant::findOrFail($id_abs),
            "grp"=>$grp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Absence=Absence_etudiant::findOrFail($id);
        $Absence->MasseHoraire=strip_tags($request->input("MasseHoraire"));
        $Absence->save();
        $et=Etudiant::findOrFail($Absence->Etudiant);
        Mail::to($et->Email)->send(new MailAbsence());
        return view('prof.EtudiantAbsence',[
            'success' => 'Absence edited successfully.',
            'data' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $array = explode('*', $id);
    
        $id_abs = $array[0];  
        $grp = $array[1];   
        $data=array();
        $data["grp"]=$grp;
    
        $Absence=Absence_etudiant::findOrFail($id_abs);
        $Absence->delete();
    
        return view('prof.EtudiantAbsence',[
            'success' => 'Absence deleted successfully.',
            'data' => $data
        ]);
    }
}
