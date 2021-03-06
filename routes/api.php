<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(["middleware" => "apikey.validate"], function () {

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'create']);
Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::post('/course', [CourseController::class, 'create']);
Route::delete('/course/{id}', [CourseController::class, 'destroy']);
Route::put('/course/{id}', [CourseController::class, 'edit']);

//Ruta para imagenes

Route::post('uploadFile','App\Http\Controllers\CargaController@uploadFile');


});