<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostAccreditationController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\LocalizationController;


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
    return redirect()->route('accreditation.index');
})->middleware('auth');
// Route::get('/tableDaccreditation', [PostAccreditationController::class, 'showPost'])->name('showPost');

 // // Accreditation Routes
Route::resource('accreditation', AccreditationController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Localization Routes

Route::get("locale/{lange}",[LocalizationController::class,'setLang']);