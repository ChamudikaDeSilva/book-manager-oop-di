<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[LoginController::class,'showLoginForm'])->name('login.form');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('dashboard',[BookController::class,'index'])->name('dashboard');
    Route::get('books/create',[BookController::class,'create'])->name('books.create');
    Route::post('books',[BookController::class,'store'])->name('books.store');
    Route::get('books/{book}/edit',[BookController::class,'edit'])->name('books.edit');
    Route::put('books/{book}',[BookController::class,'update'])->name('books.update');
    Route::get('books-list',[BookController::class,'booksIndex'])->name('books.index');
    Route::delete('books/{book}',[BookController::class,'destroy'])->name('books.destroy');
    Route::get('book/view/{book}',[BookController::class,'show'])->name('books.show');

});
