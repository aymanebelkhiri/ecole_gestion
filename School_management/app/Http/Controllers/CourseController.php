<?php

namespace App\Http\Controllers;

use App\Models\Filiére;
use App\Models\Module;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Filiére::all();
        return view('Courses.index', compact('courses'));
    }
    public function show($id)
    {
        $course = Filiére::findOrFail($id);
        return view('Courses.show', compact('course'));
    }
}
