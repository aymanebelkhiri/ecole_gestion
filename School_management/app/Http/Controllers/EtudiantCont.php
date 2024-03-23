<?php

namespace App\Http\Controllers;

use App\Mail\editetudiant;
use App\Models\Admin;
use App\Models\Etudiant;
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
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']), // Assurez-vous de hasher le mot de passe
            'role' => $data['role'],
        ]);
    
        if ($data['role'] === 'etudiants') {
            Etudiant::create([
                'id_etudiant' => $user->id, // Utilisation de l'ID de l'utilisateur comme clé primaire
                'Matricule' => $data['matricule'],
                'Nom' => $data['name'],
                'Prenom' => "", // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
                'DateNaissance' => $data['date'],
                'Sexe' => $data['sexe'], // Assurez-vous de spécifier une valeur pour chaque colonne non nullable
                'Email' => $data['email'],
                'Password' => Hash::make($data['password']), // Assurez-vous de hasher le mot de passe
                'Age' => $data['age'],
                'Groupe' => $data["grp"],
            ]);
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
        $Etudiant=Etudiant::where("id_etudiant",$id)->first();
        $Etudiant->delete();
        return view("admin.etudiants.liste",['data' => $data,"success"=>"Student deleted Successfuly."]);
    }
}
