<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProductController;

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
Route::post('/student/addAssists',[StudentController::class,'addAssists'])->name('student.addAssists');
Route::get('/assist/view',[StudentController::class,'addAssistsView'])->name('assist.view');
Route::post('/search/view',[StudentController::class,'findStudent'])->name('search.viewStudent');



Route::get('/dashboard', function () {
    return redirect()->route('student.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
Route::resource('lesson',LessonController::class);
Route::get('/details',[ProductController::class,'details']);
Route::post('/insertProduct',[ProductController::class, 'insertProduct']);
Route::get('/product/{id}',[ProductController::class,'productJson']);
Route::get('/student/assists/{id}',[StudentController::class,'getAssists'])->name('student.assists');
//Route::get('/student/addAssists/{id}',[StudentController::class,'addAssists'])->name('student.addAssists');
Route::get('/lesson',[LessonController::class,'create'])->name("lesson.created");
Route::post('/insert/lesson', [LessonController::class, 'store'])->name('lesson.add');

     Route::resource('student',StudentController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
