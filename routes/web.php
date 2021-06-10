<?php

use App\Http\Controllers\KeywordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UploadController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/documents', DocumentController::class);
Route::post('/documents/keywords', [KeywordController::class, 'store'])->name('addkeywords');
Route::resource('/filter', Filtercontroller::class, ['except' => ['create', 'show']]);
Route::post('/showFiltered', [DocumentController::class, 'showFiltered']);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/search', 'App\Http\Controllers\SearchController@search')->name('search');

require __DIR__.'/auth.php';
