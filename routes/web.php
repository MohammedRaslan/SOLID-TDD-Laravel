<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\RegularAccountController;
use App\Http\Controllers\SavingAccountController;

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

Route::prefix('bank')->group(function(){
    Route::post('create',[BankController::class,'store']);
});

Route::prefix('account')->group(function(){
    Route::post('regular/calculate',[RegularAccountController::class,'calculateTotal']);
    Route::post('saving/calculate',[SavingAccountController::class,'calculateTotal']);

});
