<?php

namespace App\Http\Controllers;

use App\Mail\editetudiant;
use App\Models\Absence_etudiant;
use App\Models\Admin;
use App\Models\Etudiant;

use App\Models\MessageProf;
use App\Models\MessageSecretary;
use App\Models\Note;
use App\Models\Prof;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EtudiantCont extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $user = new User();
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->role = "etudiants";
    $user->save();
    
    if ($request->hasFile('img')) {
        $etudiant = new Etudiant();
        $etudiant->id_etudiant = $user->id;
        $etudiant->Matricule = $request->input('matricule');
        $etudiant->Nom = $request->input('name');
        $etudiant->Prenom = ""; 
        $etudiant->DateNaissance = $request->input('date');
        $etudiant->Sexe = $request->input('sexe'); 
        $etudiant->Email = $request->input('email');
        $etudiant->Password = Hash::make($request->input('password'));
        $etudiant->Age = $request->input('age');
        $etudiant->Groupe = $request->input('grp');
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('photos', 'public');
        $etudiant->photo = $img;
        }
        $etudiant->save();
    }        
    
    return view("admin.etudiants.liste", ['data' => $request->input(), "success" => "Student Added Successfully."]);
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $array = explode('*', $id);
        $id_abs = $array[0]; 
        $grp = $array[1];   

        return view("admin.etudiants.edit",[
            "id"=>$id_abs,
            "grp"=>$grp
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $Etudiant = Etudiant::where("id_etudiant", $id)->first();
    $Etudiant->Nom = strip_tags($request->input("name"));
    $Etudiant->DateNaissance = strip_tags($request->input("date"));
    $Etudiant->Email = strip_tags($request->input("email"));
    $Etudiant->Matricule = strip_tags($request->input("matricule"));

    if ($request->hasFile('img')) {
        $img = $request->file('img')->store('photos', 'public');
        $Etudiant->photo = $img;
    }

    $Etudiant->save();

    $user = User::findOrFail($id);
    $user->name = strip_tags($request->input("name"));
    $user->email = strip_tags($request->input("email"));
    $user->save();

    // Mail::to($Etudiant->Email)->send(new editetudiant());

    return view("admin.etudiants.liste", ['data' => $request->input(), "success" => "Student Edited Successfully."]);
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
    
        $user=User::findOrFail($id_abs);
        $user->delete();
        $DeleteAbscence = Absence_etudiant::where("Etudiant",$id)->delete();
        $DeleteMessageProf = MessageProf::where("Etudiant",$id)->delete();
        $DeleteMessageSec = MessageSecretary::where("Etudiant",$id)->delete();
        $DeleteNote = Note::where("Etudiant",$id)->delete();
        $Etudiant=Etudiant::where("id_etudiant",$id)->first();
        $Etudiant->delete();
        return view("admin.etudiants.liste",['data' => $data,"success"=>"Student deleted Successfuly."]);
    }
}
