<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'store']);
Route::get('/contacts/{id}/edit', [ContactController::class, 'edit']);
Route::post('contacts/update', [ContactController::class, 'update']);
Route::get('/contacts/{id}/delete', [ContactController::class, 'destroy']);
