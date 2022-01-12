<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function showLibrarian()
    {
        return view("pages.librarians");
    }
}
