<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function getExams(){
      try {
        $exams = Exam::all();
        return view('etudiant.exams',compact('exams'));
        //code...
      } catch (\Throwable $th) {
        return view('etudiant.exams');
        //throw $th;
      }
    }
}
