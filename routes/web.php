<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

// Route::get('/demo',function(){
//     echo "Demo route"."<br>";
//     echo 12345;
// });

// Route::get('/demo',function(){
//     return view('/demo');
// });

// Route::get('/{name?}', function ($name = null){
//         $data = compact('name');
//         return view('demo')->with($data);
// });

// Route::get('register', [RegisterController::class,'index']);
// Route::post('user/store', [RegisterController::class,'store'])->name('user.store');

Route::resource('companies', CompanyController::class);