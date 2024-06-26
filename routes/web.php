<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegistroController;
use App\Http\Middleware\Verificar;

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

//Route::post('/student/addAssists',[StudentController::class,'addAssists'])->name('student.addAssists');
Route::get('student/export', [StudentController::class, 'exportDataInExcel'])->name('exportDataInExcel');

Route::get('registro',[RegistroController::class,'index'])->name('registro.index');



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
Route::get('/student/addAssists/{id}',[StudentController::class,'addAssists'])->name('student.addAssists');
Route::get('/lesson',[LessonController::class,'create'])->name("lesson.created");

Route::get('/assist/view',[StudentController::class,'addAssistsView'])->name('assist.view');
Route::get('/student/viewSearch',[StudentController::class,'viewSearch'])->name('student.viewSearch');
Route::post('/student/showSearch/',[StudentController::class,'showSearch'])->name('student.showSearch');

Route::post('/insert/lesson', [LessonController::class, 'store'])->name('lesson.add');

    Route::resource('student',StudentController::class)->middleware('log','registro');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
