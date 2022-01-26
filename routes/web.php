<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(["middleware" => ["auth"]], function () {
    Route::group(["prefix" => "books"], function() {
        Route::get("/", [BookController::class, "showBook"]);
        Route::post("/", [BookController::class, "postBook"]);
        Route::post("/{id}", [BookController::class, "updateBook"]);
        Route::delete("/{id}", [BookController::class, "deleteBook"]);
        Route::get("/detail/{id}", [BookController::class, "showDetailBook"]);
    });

    Route::get("students", [StudentController::class, "showStudent"]);
    Route::get("students/detail", [StudentController::class, "showDetailStudent"]);

    Route::get("librarians", [LibrarianController::class, "showLibrarian"]);
   
    Route::get("book-borrow", [BorrowController::class, "showBookBorrow"]);
});

require __DIR__.'/auth.php';
