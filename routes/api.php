<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/all', [ContactController::class, 'index']);
Route::get('/view/{id}', [ContactController::class, 'show']);
Route::get('/search/{value}', [ContactController::class, 'searchByValue']);
Route::get('/getcities', [ContactController::class, 'getCities']);
Route::get('/getstates', [ContactController::class, 'getStates']);
Route::get('/getcontacts/{value}', [ContactController::class, 'getContacts']);
Route::post('/post', [ContactController::class, 'store']);
Route::put('/update/{id}', [ContactController::class, 'update']);
Route::delete('/delete/{id}', [ContactController::class, 'destroy']);