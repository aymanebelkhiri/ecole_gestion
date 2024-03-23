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
    public function store(Request $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = "etudiants";
        $user->save();
        
        if ($data['role'] === 'etudiants') {
            $etudiant = new Etudiant();
            $etudiant->id_etudiant = $user->id;
            $etudiant->Matricule = $data['matricule'];
            $etudiant->Nom = $data['name'];
            $etudiant->Prenom = ""; // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
            $etudiant->DateNaissance = $data['date'];
            $etudiant->Sexe = $data['sexe']; // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
            $etudiant->Email = $data['email'];
            $etudiant->Password = Hash::make($data['password']); // Assurez-vous de hasher le mot de passe
            $etudiant->Age = $data['age'];
            $etudiant->Groupe = $data["grp"];
            $etudiant->save();
        }        
        return view("admin.etudiants.liste",['data' => $data->input(),"success"=>"Student Add Successfuly."]);
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
     *  error khaado yt9ad !!! aymane
     */
    public function update(Request $request, string $id)
    {
        $Etudiant=Etudiant::where("id_etudiant",$id)->first();
        $Etudiant->Nom=strip_tags($request->input("name"));
        $Etudiant->DateNaissance=strip_tags($request->input("date"));
        $Etudiant->Email=strip_tags($request->input("email"));
        $Etudiant->Matricule=strip_tags($request->input("matricule"));
        $Etudiant->save();
        $user=User::findOrFail($id);
        $user->name=strip_tags($request->input("name"));
        $user->email=strip_tags($request->input("email"));
        $user->save();
        Mail::to($Etudiant->Email)->send(new editetudiant());
        return view("admin.etudiants.liste",['data' => $request->input(),"success"=>"Student Edided Successfuly."]);
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
