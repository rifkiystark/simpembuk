<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showBook()
    {
        return view('pages.books');
    }


    public function showDetailBook()
    {
        return view('pages.detail-book');
    }
}
