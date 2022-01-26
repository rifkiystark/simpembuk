<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function showBookBorrow()
    {
        return view("pages.borrow");
    }
}
