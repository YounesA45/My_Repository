<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostAccreditationController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\AccreditationController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrdonnateurController;
use App\Http\Controllers\DRTController;
use App\Http\Controllers\PosteComptableController;


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

// Route::get('/', function () {
//     return redirect()->route('accreditation.index');
// })->middleware('auth');
// Route::get('/tableDaccreditation', [PostAccreditationController::class, 'showPost'])->name('showPost');

 // // Accreditation Routes
Route::resource('accreditation', AccreditationController::class)->middleware('auth');
Route::get('/SelectTypeAccreditaions',[AccreditationController::class,'selectTypeAcc'])->middleware('auth')->name('SelectType');
Route::resource('accreditations', AdminController::class)->middleware('auth');
Route::get('/accreditation/show',[AccreditationController::class,'showAccreditation'])->middleware('auth')->name('show');
Route::post('/valider/{id}',[AccreditationController::class,'valider'])->middleware('auth')->name('valider');
Route::post('/fileWord', [AdminController::class, 'fileWord'])->name('fileWord');
Route::get('/page2', function () {
    return view('page2');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');;

// Localization Routes

Route::get("locale/{lange}",[LocalizationController::class,'setLang']);

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'products' => ProductController::class,
]);

Route::resource('Ordonnateur', OrdonnateurController::class)->middleware('auth');
Route::resource('DRT', DRTController::class)->middleware('auth');
Route::resource('PosteComptable', PosteComptableController::class)->middleware('auth');