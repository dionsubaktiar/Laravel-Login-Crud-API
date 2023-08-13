<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\CRUDController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;

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

Route::view('/', 'profile.index');
Route::get('/openAi', [OpenAIController::class, 'index']);
Route::post('/process', [OpenAIController::class, 'process']);
Route::resource('crud', CRUDController::class);
Route::get('/crud/{id}/edit', [CRUDController::class, 'edit']);
Route::get('/search', [CRUDController::class, 'search'])->name('crud.search');
Route::resource('api', APIController::class);
