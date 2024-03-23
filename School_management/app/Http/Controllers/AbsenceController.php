<?php
 
namespace App\Http\Controllers;
use App\Models\Absence_etudiant;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
 
class AbsenceController extends Controller
{
    public function getAbsence($id){
        $Absences =Absence_etudiant::where(["Etudiant"=>$id])->get();
        return view('etudiant.Absence',compact('Absences'));
    }
}