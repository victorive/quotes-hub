<?php

use App\Http\Controllers\V1\Web\Auth\LoginController;
use App\Http\Controllers\V1\Web\Auth\LogoutController;
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
Route::get('/', [LoginController::class, 'getLoginForm'])->name('login');

Route::get('/quotes', function () {
    return view('quotes');
})->name('quotes')->middleware('auth');

Route::prefix('auth')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])->name('auth.login');
    Route::post('/logout', LogoutController::class)->name('auth.logout')->middleware('auth');
});
