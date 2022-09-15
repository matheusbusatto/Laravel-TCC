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

use App\Http\Controllers\ExpenseController;
use App\Models\Expense;

Route::get('/', [ExpenseController::class, 'index']);
Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');


Route::get('/expenseTable', [ExpenseController::class, 'table']);

//rota de envio dos dados do fomulario de criação de despesas
Route::post('/expenses', [ExpenseController::class, 'store']);

Route::get('/test', function () {
    return view('test');
});

Route::get('/controlPanel', function () {
    return view('controlPanel');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
