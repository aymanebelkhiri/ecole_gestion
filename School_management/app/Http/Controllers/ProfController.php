<?php

namespace App\Http\Controllers;

use App\Mail\editetudiant;
use App\Models\Filiére;
use App\Models\FiliéresProf;
use App\Models\Groupe;
use App\Models\groupe_Prof;
use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use App\Models\Prof;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Profs = DB::table('profs')
        ->join('modules','modules.id_module','=','profs.Module')
        ->select('profs.id_prof','profs.Nom','profs.Email','profs.Sexe','modules.Nom as Module')
        ->get();
        return view('admin.profs.index',compact('Profs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Modules = Module::all();
        $Groupes = Groupe::all();
        return view('admin.profs.create',compact('Modules',"Groupes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Module = Module::findOrFail($request['module']);;
        $grp = Groupe::findOrFail($request['grp']);
        $filiere = Filiére::where("Nom",$request['filiere'])->first();
        $user = User::create([
            'name' => $request['nom'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);
        $NewProf = Prof::create([
            "id_prof"=>$user->id,
            'Nom'=>$request->nom,
            'Email'=>$request->email,
            'Sexe'=>$request->sexe,
            'Module'=>$Module->id_module,
            'Password'=>Hash::make($request['password'])
        ]);
        $groupe_prof = groupe_Prof::create([
            'Groupe' => $grp->id_groupe,
            'Prof' =>$user->id,
        ]);
        $filiere_prof = FiliéresProf::create([
            'id_filiére' => $filiere->id,
            'id_prof' =>$user->id,
        ]);
        
        if($NewProf){
            return redirect()->route('profs.index')->with('success', 'Étudiant ajouté avec succès');
        }else{
            return view('admin.profs.create');
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
        $Prof = Prof::find($id);
        $Modules= Module::all();
        return view('admin.profs.edit',compact('Prof','Modules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $Prof = Prof::findOrFail($id);
    $user = User::findOrFail($id);

    $Module = Module::where('Nom', $request->Module)->value('id_module');
    // dd($request->all());
    $Prof->update([
        'Nom' => $request->nom,
        'Email' => $request->email,
        'Sexe' => $request->sexe,
        'Module' => $Module,
    ]);
    $user=User::findOrFail($id);
    $user->name=strip_tags($request->input("nom"));
    $user->email=strip_tags($request->input("email"));
    $user->save();
    Mail::to(strip_tags($request->input("email")))->send(new editetudiant());
    if ($Prof) {
        return redirect()->route('profs.index')->with('MessageSucces', 'Professeur mis à jour avec succès');
    } else {
        return redirect()->route('profs.edit', $id)->with('MessageEchec', 'Échec de la mise à jour du professeur');
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $DeleteGroupeProf = groupe_Prof::where("Prof",$id)->delete();
        $DeletefiliereProf = FiliéresProf::where("id_prof",$id)->delete();
        $DeleteProf = Prof::find($id)->delete();

        $user = User::find($id)->delete();
        return redirect()->route('profs.index');
    }
}
