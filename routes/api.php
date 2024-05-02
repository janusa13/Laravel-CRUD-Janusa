<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/assists/{id}',[ApiController::class,'condicionStudent']);

/* cada vez que una persona acceda a esa persona
 que quede un registro en la BD

 cada vez que entre a una ruta de tipo get que se llame Log
 un middleware que registre en la BD dia, hora y la IP.
 */