<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BookController extends Controller
{
    public function showBook()
    {
        $books = Book::all();
        return view('pages.books', compact("books"));
    }


    public function showDetailBook($id)
    {
        $book = Book::find($id);
        return view('pages.detail-book', compact("book"));
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::find($id);
        if ($request->hasFile("cover")) {
            $file = $request->file('cover');
            $tujuan_upload = 'cover'; //nama folder
            $coverFile = md5(time());
            $coverFile = 'cover-' . $coverFile . '.' . $file->getClientOriginalExtension();
            $file->move($tujuan_upload, $coverFile);
            $book->cover = $coverFile;
        }
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->publish_year = $request->publish_year;
        $book->synopsis = $request->synopsis;
        $book->status = $request->status;
        $book->save();

        return redirect("/books/detail/" . $id);
    }

    public function deleteBook(Request $request, $id)
    {
        $user = auth()->user();
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back();
        }
        $book = Book::find($id);
        $book->delete();

        return redirect("/books");
    }

    public function postBook(Request $request)
    {
        $bookCode = "B-" . time();
        $file = $request->file('cover');
        $tujuan_upload = 'cover'; //nama folder
        $coverFile = md5($bookCode);
        $coverFile = 'cover-' . $coverFile . '.' . $file->getClientOriginalExtension();
        $file->move($tujuan_upload, $coverFile);

        $quantity = $request->quantity;
        for ($i = 0; $i < $quantity; $i++) {
            $book = new Book();
            $book->book_code = $bookCode . "-" . ($i + 1);
            $book->title = $request->title;
            $book->author = $request->author;
            $book->publisher = $request->publisher;
            $book->publish_year = $request->publish_year;
            $book->synopsis = $request->synopsis;
            $book->cover = $coverFile;
            $book->status = 1;
            $book->save();
        }
        return \redirect()->back();
    }
}
