<?php

namespace App\Http\Controllers;

use App\Mail\exam as MailExam;
use App\Models\Etudiant;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Exams extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("prof.exams");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("prof.add_exams");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        return view("prof.edit_exam",[
            "exam"=>Exam::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Exam=Exam::findOrFail($id);
        $Exam->titre=strip_tags($request->input("titre"));
        $Exam->heur=strip_tags($request->input("heur"));
        $Exam->Date=strip_tags($request->input("date"));
        $Exam->disc=strip_tags($request->input("disc"));
        $Exam->module=strip_tags($request->input("module"));
        $groupe=strip_tags($request->input("grp"));
        $Exam->save();
        $ets=Etudiant::where("Groupe",$groupe)->get();
        foreach ($ets as $et) {
            Mail::to($et->Email)->send(new MailExam());
        }
        return view('prof.exams',[
            "success"=>'Exam Edited successfully.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Exam=Exam::findOrFail($id);
        $Exam->delete();
        return view('prof.exams',[
            "success"=>'Exam Deleted successfully.'
        ]);
    }
}
