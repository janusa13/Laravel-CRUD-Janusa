<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

Route::resource('lesson',LessonController::class);

Route::resource('student',StudentController::class);

Route::get('/details',[ProductController::class,'details']);

Route::post('/insertProduct',[ProductController::class, 'insertProduct']);

Route::get('/product/{id}',[ProductController::class,'productJson']);

Route::get('/student/assists/{id}',[StudentController::class,'getAssists'])->name('student.assists');

Route::get('/student/addAssists/{id}',[StudentController::class,'addAssists'])->name('student.addAssists');

Route::get('/lesson',[LessonController::class,'create'])->name("lesson.created");

Route::post('/insert/lesson', [LessonController::class, 'store'])->name('lesson.add');