<?php

namespace App\Http\Controllers;

use App\Models\Filiére;
use Illuminate\Http\Request;
use App\Models\Module;

class CourseAdController extends Controller
{
    public function index()
    {
        $courses = Filiére::all();
        return view('admin.CourseAd.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.CourseAd.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string',
            'MasseHoraire' => 'required|integer',
            'Coefficient' => 'required|integer',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course  = new Module();
        $course ->Nom = $request->input('Nom');
        $course ->MasseHoraire = $request->input('MasseHoraire');
        $course ->Coefficient = $request->input('Coefficient');
        $course ->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('public/images', $imageName);
            $course ->image = $imageName;
        }

        $course ->save();

        return redirect()->route('admin.CourseAd.index')->with('success', 'Module added successfully');
    }

    public function show($id)
    {
        $course = Module::findOrFail($id);
        return view('admin.CourseAd.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Module::findOrFail($id);
        return view('admin.CourseAd.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course  = Module::findOrFail($id);

        $request->validate([
            'Nom' => 'required|string',
            'MasseHoraire' => 'required|integer',
            'Coefficient' => 'required|integer',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $course ->Nom = $request->input('Nom');
        $course ->MasseHoraire = $request->input('MasseHoraire');
        $course ->Coefficient = $request->input('Coefficient');
        $course ->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('public/images', $imageName);
            $course ->image_url = $imageName;
        }

        $course ->save();

        return redirect()->route('courses.index')->with('success', 'Module updated successfully');
    }

    public function destroy($id)
    {
        $course  = Module::findOrFail($id);
        $course ->delete();
        return redirect()->route('courses.index')->with('success', 'Module deleted successfully');
    }
}
