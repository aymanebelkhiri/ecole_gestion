<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Filiére;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Modules = Module::all();
        return view('admin.modules.index',compact('Modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Filiéres = Filiére::all();
        return view('admin.modules.create',compact('Filiéres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([      
            'nom' => 'required',
            'MasseH'=>'required',
            'Coefficient'=>'required',
            'filiére'=>'required',
        ]);
        
        $FiliéreId = Filiére::where('Nom', $request->filiére)->value('id');
    
        $Module = Module::create([
            'Nom'=>$request->nom,
            'MasseHoraire'=>$request->MasseH,
            'Coefficient'=>$request->Coefficient,
            'Filiére'=>$FiliéreId
        ]);
    
        if($Module){
            return redirect()->route('modules.index')->with('success', 'Course added succesfully');
        }else{
            $echec= 'Failed to add the course';
            return view('admin.modules.create',compact('echec'));
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
        $Filiéres = Filiére::all();
        $Module = Module::findOrFail($id);
        return view('admin.modules.edit',compact('Filiéres','Module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $module = Module::find($id);
    
        $request->validate([
            'Nom' => 'required',
            'MasseH' => 'required',
            'Coefficient'=>'required',
            'filiére' => 'required'
        ]);
    
        $filiereId = DB::table('filiéres')->where('Nom',$request->filiére)->value('id');
    
        $module->Nom = $request->input('Nom');
        $module->MasseHoraire = $request->input('MasseH');
        $module->Coefficient = $request->input('Coefficient');
        $module->Filiére = $filiereId; 
    
        if ($module->save()) {
            return redirect()->route('modules.index')->with('messageSuccess');
        } else {
            return back()->with('messageEchec');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Module $Module)
    {
        if ($Module) {
            $Module->delete();
            return redirect()->route('modules.index');
        } else {
            return redirect()->route('modules.index');
        }
    }
}
