<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function showBookBorrow(Request $request)
    {
        $student = $request->student??"";
        $book = $request->book??"";
        $start_date = $request->start_date??"";
        $end_date = $request->end_date??"";
        $borrows = Borrow::with("book");
        if($student != ""){
            $borrows->where("student_id", $student);
        }
        if($book != ""){
            $borrows->where("book_code", $book);
        }
        if($start_date != ""){
            $borrows->whereDate("start_date", ">=", $start_date);
        }
        if($end_date != ""){
            $borrows->whereDate("end_date", "<=", $end_date);
        }
        $borrows = $borrows->get();
        $students = Student::all();
        $books = Book::all();
        return view("pages.borrow", compact("borrows", "students", "books"));
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

        if ($borrow == null) {
            return redirect()->back();
        }

        $borrow->status = 0;
        $borrow->end_date = date("Y-m-d");
        $borrow->save();

        $book = Book::where("book_code", $borrow->book_code)->first();

        if ($book != null) {
            $book->status = $status;
        }

        return redirect()->back();
    }
}
