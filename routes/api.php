<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\CRUDController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('articles', 'APIController@index');
Route::get('articles/{id}', 'APIController@show');
Route::post('articles', 'APIController@store');
Route::put('articles/{id}', 'APIController@update');
Route::delete('articles/{id}', 'APIController@delete');
