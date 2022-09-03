<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;//stack over flow

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

use App\Http\Controllers\SpentController;

Route::get('/', [SpentController::class, 'index']);
Route::get('/spending/create', [SpentController::class, 'create']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/controlPanel', function () {
    return view('controlPanel');
});

Route::get('/spendingTable', function () {
    return view('spendingTable');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
