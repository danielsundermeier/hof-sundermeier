<?php

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
    return view('bluehpatenschaft.index');
});

Route::get('/bluehpatenschaft', function () {
    return view('bluehpatenschaft.index');
})->name('bluehpatenschaft.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/impressum', [ App\Http\Controllers\Legal\ImpressumController::class, 'index' ])->name('legal.impressum.index');
Route::post('/contact', [App\Http\Controllers\ContactformController::class, 'store'])->middleware(['honey'])->name('contactform.store');

require __DIR__.'/auth.php';
