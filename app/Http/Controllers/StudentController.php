<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function showStudent()
    {
        return view('pages.students');
    }


    public function showDetailStudent()
    {
        return view('pages.detail-student');
    }
}
