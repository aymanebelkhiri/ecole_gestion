<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Models\Groupe;
use App\Models\Filiére;



class GroupeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Groupes = DB::table('groupes')
        ->join('filiéres','filiéres.id','=','groupes.Filiére')
        ->select('groupes.id_groupe','groupes.Nom','groupes.Effectif','filiéres.Nom as Filiére' )->get();
        return view('admin.groupes.index',compact('Groupes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Filiéres = Filiére::all(); 
        return view('admin.groupes.create',compact('Filiéres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([      
            'nom' => 'required',
            'effectif'=>'required',
            'filiére'=>'required'
        ]);
        
        $FiliéreId = Filiére::where('Nom', $request->filiére)->value('id');
    
        $Groupe = Groupe::create([
            'Nom'=>$request->nom,
            'Effectif'=>$request->effectif,
            'Filiére'=>$FiliéreId
        ]);
    
        if($Groupe){
            return redirect()->route('groupes.index')->with('success', 'Étudiant ajouté avec succès');
        }else{
            return view('admin.groupes.create');
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
    public function edit($id)
    {
        $Filiéres = Filiére::all(); 
        $Groupe = Groupe::find($id);
        return view('admin.groupes.edit',compact('Filiéres','Groupe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $groupe = Groupe::find($id);
    
        $request->validate([
            'Nom' => 'required',
            'Effectif' => 'required',
            'filiére' => 'required'
        ]);
    
        $filiereId = DB::table('filiéres')->where('Nom',$request->filiére)->value('id');
    
        // Mettre à jour les données du groupe
        $groupe->Nom = $request->input('Nom');
        $groupe->Effectif = $request->input('Effectif');
        $groupe->Filiére = $filiereId; 
    
        if ($groupe->save()) {
            $messageSuccess = 'Groupe mis à jour avec succès';
            return redirect()->route('groupes.index')->with('messageSuccess', $messageSuccess);
        } else {
            $messageEchec = 'Échec de la mise à jour du groupe';
            return back()->with('messageEchec', $messageEchec);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Groupe $Groupe)
    {
        if ($Groupe) {
            $Groupe->delete();
            return redirect()->route('groupes.index')->with('success', 'Étudiant supprimé avec succès');
        } else {
            return redirect()->route('groupes.index')->with('Echec', 'Échec de la suppression de l\'étudiant');
        }
    }
}
