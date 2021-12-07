<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\AssController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\GenerateController;

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

//Home screen
Route::get('/', [GenerateController::class, 'index']);

//Assword
Route::get('/ass', [AssController::class, 'index']);

//Common password controller
Route::resource('common', CommonController::class, [
    'except' => ['edit','update']
]);

//Words resource controller
Route::resource('words', WordController::class);
Route::post('words/process', [WordController::class, 'process'])->name('words.process');


//Suggestion controller
Route::resource('suggestions', SuggestionController::class, [
    'except' => ['show']
]);
Route::post('suggestions/process', [SuggestionController::class, 'process'])->name('suggestions.process');
Route::post('suggestions/{suggestion}/approve', [SuggestionController::class, 'approve'])->name('suggestions.approve');

//Dashboard
Route::get('/dashboard', [PortalController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/account', [PortalController::class, 'account'])->middleware(['auth'])->name('account');

//Ajax
Route::get('/quick_ass', 'App\Http\Controllers\WordController@quick_ass')->middleware('ajax');


require __DIR__.'/auth.php';
