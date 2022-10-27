<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

use App\Http\Controllers\LangController;


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

Route::resource('companies', CompanyController::class);     



Route::get('lang/home', [LangController::class, 'index']);
Route::get('lang/change', [LangController::class, 'change'])->name('changeLang');