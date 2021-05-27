<?php

use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UploadController;
use App\Models\Document;
use Illuminate\Support\Facades\Route;

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
Route::resource('/documents', DocumentController::class);

Route::resource('/filter', Filtercontroller::class, ['except' => ['create', 'show']]);

Route::post('/showFiltered', [DocumentController::class, 'showFiltered']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

