<?php

namespace App\Http\Controllers;

use App\Mail\note as MailNote;
use App\Models\Etudiant;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NoteController extends Controller
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
        // Création d'une nouvelle note avec les données validées
        $note = new Note();
        $note->Title = strip_tags($request->input("title"));
        $note->Valeur = strip_tags($request->input("note"));
        $note->Module = strip_tags($request->input("module"));
        $note->Etudiant = strip_tags($request->input("etudiant"));
        // Enregistrement de la note dans la base de données
        $note->save();
        $et=Etudiant::findOrFail($note->Etudiant);
        Mail::to($et->Email)->send(new MailNote());
        // Redirection de l'utilisateur avec un message de succès et la requête
        return view('prof.EtudiantNote',[
            'success' => 'Note added successfully.',
            'data' => $request->all()
        ]);
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
    public function edit(string $id)
    {
        return view("prof.edit_note",[
            "note"=>Note::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $note=Note::findOrFail($id);
        $note->Valeur=strip_tags($request->input("valeur"));
        $note->save();
        $et=Etudiant::findOrFail($note->Etudiant);
        Mail::to($et->Email)->send(new MailNote());
        return view('prof.EtudiantNote',[
            'success' => 'Note edited successfully.',
            'data' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $array = explode('*', $id);
    
        // Now $array contains all the values separately
    
        $noteId = $array[0];  // Note ID
        $module = $array[1];   // Module
        $grp = $array[2];  // Group ID
        $title = $array[3];    // Title
        $data=array();
        $data["module"]=$module;
        $data["grp"]=$grp;
        $data["title"]=$title;
        // Now you can use these variables as needed
    
        $note = Note::findOrFail($noteId);
        $note->delete();
    
        return view('prof.EtudiantNote',[
            'success' => 'Note deleted successfully.',
            'data' => $data
        ]);
    }
    

}
