<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SavingAccountController;
use App\Http\Controllers\RegularAccountController;

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
    Route::post('regular/calculate',[AccountController::class,'calculateRegularAccountTotal']);
    Route::post('saving/calculate',[AccountController::class,'calculateSavingAccountTotal']);
});

Route::prefix('export')->group(function(){
    Route::post('php',[ExportController::class,'exportToPhp']); 
    Route::post('json',[ExportController::class,'exportToJson']); 

});
