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
    Route::group(["prefix" => "books"], function () {
        Route::get("/", [BookController::class, "showBook"]);
        Route::post("/", [BookController::class, "postBook"]);
        Route::post("/{id}", [BookController::class, "updateBook"]);
        Route::post("/delete/{id}", [BookController::class, "deleteBook"]);
        Route::get("/detail/{id}", [BookController::class, "showDetailBook"]);
    });

    Route::group(["prefix" => "students"], function () {
        Route::get("/", [StudentController::class, "showStudent"]);
        Route::post("/", [StudentController::class, "addStudent"]);
        Route::post("/import", [StudentController::class, "importStudents"]);
        Route::post("/{id}", [StudentController::class, "editStudent"]);
        Route::post("/delete/{id}", [StudentController::class, "deleteStudent"]);
        Route::get("/detail", [StudentController::class, "showDetailStudent"]);
    });

    Route::group(["prefix" => "librarians"], function () {
    Route::get("/", [LibrarianController::class, "showLibrarian"]);
        Route::post("/", [LibrarianController::class, "addLibrarian"]);
        Route::post("/{id}", [LibrarianController::class, "editLibrarian"]);
        Route::post("/delete/{id}", [LibrarianController::class, "deleteLibrarian"]);
    });

    Route::group(["prefix" => "book-borrow"], function(){
        Route::get("/", [BorrowController::class, "showBookBorrow"]);
        Route::post("/borrow", [BorrowController::class, "borrow"]);
        Route::post("/return", [BorrowController::class, "return"]);
    });

});

require __DIR__ . '/auth.php';
