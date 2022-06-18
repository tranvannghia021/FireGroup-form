<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
// list
Route::get('/',[ContactController::class,'index'])->name('list-contact');
// add
Route::get('/add',[ContactController::class,'create'])->name('form-contact');
Route::post('/add',[ContactController::class,'store'])->name('add-contact');
//edit
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('edit-contact');
Route::post('/edit/{id}',[ContactController::class,'update'])->name('update-contact');
//delete
Route::get('/destroy/{id}',[ContactController::class,'destroy'])->name('delete');
//filter
Route::post('/',[ContactController::class,'filter']);
