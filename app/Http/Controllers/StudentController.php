<?php

namespace App\Http\Controllers;

use App\Imports\StudentsImport;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function showStudent()
    {
        $students = Student::all();
        return view('pages.students', compact("students"));
    }

    public function editStudent(Request $request, $id)
    {
        $student = Student::find($id);
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->save();

        return redirect()->back();
    }

    public function addStudent(Request $request)
    {
        $student = new Student();
        $student->nim = $request->nim;
        $student->name = $request->name;
        $student->save();

        return redirect()->back();
    }

    public function deleteStudent(Request $request, $id)
    {
        $user = auth()->user();
        if(!Hash::check($request->password, $user->password)){
            return redirect()->back();
        }
        $student = Student::find($id);
        Borrow::where("student_id", $student->id)->delete();
        $student->delete();

        return redirect()->back();
    }

    public function showDetailStudent()
    {
        return view('pages.detail-student');
    }

    public function importStudents(Request $request)
    {
        $importer = new StudentsImport();
        $importer->import($request->file("students"));

        // return ["failures" => $importer->failures(), "errors" => $importer->errors()];
        // return $importer->failures();
        return redirect()->back();
    }
}
