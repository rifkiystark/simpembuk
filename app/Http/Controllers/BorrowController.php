<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function showBookBorrow()
    {
        $borrows = Borrow::all();
        return view("pages.borrow", compact("borrows"));
    }

    public function borrow(Request $request)
    {
        $borrowCode = "S-" . time();
        $student = Student::where("nim", $request->nim)->first();
        if ($student == null) {
            return redirect()->back();
        }

        $book = Book::where("book_code", $request->book_code)->first();
        if ($book == null) {
            return redirect()->back();
        }
        $borrow = new Borrow();
        $borrow->borrow_code = $borrowCode;
        $borrow->book_code = $request->book_code;
        $borrow->student_id = $student->id;
        $borrow->start_date = date("Y-m-d");
        $borrow->status = 1;
        $borrow->save();

        return redirect()->back();
    }

    public function return(Request $request)
    {
        $borrow_code = $request->borrow_code;
        $status = $request->status;

        $borrow = Borrow::where("borrow_code", $borrow_code)->first();

        if($borrow == null){
            return redirect()->back();
        }

        $borrow->status = 0;
        $borrow->end_date = date("Y-m-d");
        $borrow->save();

        $book = Book::where("book_code", $borrow->book_code)->first();

        if($book != null){
            $book->status = $status;
        }

        return redirect()->back();

    }
}
