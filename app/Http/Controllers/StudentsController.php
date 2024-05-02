<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentsCollection;
use App\Http\Resources\StudentsResource;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index()
{
    $students = Students::paginate(10);
    return new StudentsCollection($students);
}


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            // Add more validation rules as needed
        ]);

        return Students::create($request->all());
    }

    public function show(Students $student)
    {
        return new StudentsResource($student);
    }

    public function update(Request $request, $id)
    {
        $student = Students::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            // Add more validation rules as needed
        ]);

        $student->update($request->all());

        return $student;
    }

    public function destroy($id)
    {
        $student = Students::findOrFail($id);
        $student->delete();

        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}