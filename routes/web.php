<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home.index');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[AdminController::class,'index'])->name('home')->middleware(['auth','admin']);

route::get('/',[HomeController::class,'index'])->name('home.index');

route::get('/categoryPage',[AdminController::class,'categoryPage'])->name('category.index')->middleware(['auth','admin']);;
route::post('/addCategory',[AdminController::class,'addCategory'])->name('category.add')->middleware(['auth','admin']);;
route::get('/category_delete/{id}',[AdminController::class,'deleteCategory'])->name('category.delete')->middleware(['auth','admin']);;
route::get('/category_edit/{id}',[AdminController::class,'editCategory'])->name('category.edit')->middleware(['auth','admin']);;
route::post('/category_update/{id}',[AdminController::class,'updateCategory'])->name('category.update')->middleware(['auth','admin']);;
route::get('/bookPage',[AdminController::class,'bookPage'])->name('book.index')->middleware(['auth','admin']);;
route::get('/book_add',[AdminController::class,'addBook'])->name('book.add')->middleware(['auth','admin']);;
route::post('/book_create',[AdminController::class,'createBook'])->name('book.create')->middleware(['auth','admin']);;
route::get('/book_delete/{id}',[AdminController::class,'deleteBook'])->name('book.delete')->middleware(['auth','admin']);;
route::get('/book_edit/{id}',[AdminController::class,'editBook'])->name('book.edit')->middleware(['auth','admin']);;
route::post('/book_update/{id}',[AdminController::class,'updateBook'])->name('book.update')->middleware(['auth','admin']);;

route::get('/book_details/{id}',[HomeController::class,'bookDetails'])->name('book.details');

route::get('/borrow_books/{id}',[HomeController::class,'bookBorrow'])->name('book.borrow')->middleware(['auth']);;

route::get('/requestPage',[AdminController::class,'borrowPage'])->name('book.request')->middleware(['auth','admin']);;
route::get('/approve_book/{id}',[AdminController::class,'approveBook'])->name('book.approve')->middleware(['auth','admin']);;
route::get('/reject_book/{id}',[AdminController::class,'rejectBook'])->name('book.reject')->middleware(['auth','admin']);;
route::get('/return_book/{id}',[AdminController::class,'returnBook'])->name('book.return')->middleware(['auth','admin']);;

route::get('/book/history',[HomeController::class,'bookHistory'])->name('book.history')->middleware(['auth']);;
route::get('/cancel/request/{id}',[HomeController::class,'cancelRequest'])->name('cancel.request')->middleware(['auth']);;
route::get('/explore/books',[HomeController::class,'exploreBooks'])->name('explore.books');
route::get('/search/books',[HomeController::class,'searchBooks'])->name('search.books');
route::get('/search/category/{id}',[HomeController::class,'searchCategory'])->name('category.search');
