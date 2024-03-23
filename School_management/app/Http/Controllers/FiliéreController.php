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
        $request->validate([
            'description'=>'required',
            'nom'=>'required',
            'domaine'=>'required',
        ]);

        $Filiére = Filiére::create([
            'Nom'=>$request->nom,
            'Description'=>$request->description,
            'Domaine'=>$request->domaine
        ]);

        if($Filiére){
            return redirect()->route('filiéres.index')->with('success', 'Étudiant ajouté avec succès');
        }else{
            return redirect()->route('filiéres.create')->with('Echec', 'Failed to add filiére');
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
    
        $request->validate([
            'Nom'=>'required',
            'description' => 'required',
            'domaine' => 'required'
        ]);

        $filiére->Nom = $request->input('Nom');
        $filiére->Description = $request->input('description');
        $filiére->Domaine = $request->input('domaine');  

        $filiére->save();
    
        if ($filiére->save()) {
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
