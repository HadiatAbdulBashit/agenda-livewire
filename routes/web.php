<?php

use App\Http\Controllers\CounterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/counter', [CounterController::class, 'index'])->name('counter');
Route::get('/note', [NotesController::class, 'index'])->name('note');
Route::get('/product', [ProductController::class, 'index'])->name('product');
