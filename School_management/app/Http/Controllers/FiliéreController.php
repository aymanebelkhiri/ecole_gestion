<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiére ;

class FiliéreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Filiéres = Filiére::all();
        return view('admin.filiéres.index',compact('Filiéres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.filiéres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{


    $Filiére = new Filiére(); // Création d'une nouvelle instance de modèle

    // Remplissage des attributs
    $Filiére->Nom = $request->nom;
    $Filiére->Description = $request->description;
    $Filiére->Domaine = $request->domaine;

    // Vérification et gestion du fichier image
    if ($request->hasFile('img')) {
        $img = $request->file('img')->store('photos', 'public');
        $Filiére->photo = $img;
    }

    // Enregistrement de l'objet dans la base de données
    $saved = $Filiére->save();

    if ($saved) {
        return redirect()->route('filiéres.index')->with('success', 'Filiére ajoutée avec succès');
    } else {
        return redirect()->route('filiéres.create')->with('Echec', 'Échec de l\'ajout de la filiére');
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
    public function edit(string $id)
    {
        $Filiére = Filiére::findOrFail($id);
        return view('admin.filiéres.edit',compact('Filiére'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $filiére = Filiére::find($id);
    

        $filiére->Nom = $request->input('Nom');
        $filiére->Description = $request->input('description');
        $filiére->Domaine = $request->input('domaine');  
        if ($request->hasFile('img')) {
            $img = $request->file('img')->store('photos', 'public');
            $filiére->photo = $img;
        }
    
        // Enregistrement de l'objet dans la base de données
        $saved = $filiére->save();
    
        if ($saved) {
            $messageSuccess = 'filiére mis à jour avec succès';
            return redirect()->route('filiéres.index')->with('messageSuccess', $messageSuccess);
        } else {
            $messageEchec = 'Échec de la mise à jour du groupe';
            return back()->with('messageEchec', $messageEchec);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filiére $Filiére)
    {
        if ($Filiére) {
            $Filiére->delete();
            return redirect()->route('filiéres.index')->with('success', 'Étudiant supprimé avec succès');
        } 
    }
    
}
