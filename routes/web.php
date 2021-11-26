<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\AssController;


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
    return view('public.home');
});


//Assword
Route::get('/ass', [AssController::class, 'index']);

//Word submit - Show the screen
Route::get('/words/suggest', [WordController::class, 'showSuggest']);
Route::post('/words/suggest', [WordController::class, 'saveSuggest'])->name("words.suggestSave");


//Common password controller
Route::resource('common', CommonController::class);

//Words resource controller
Route::resource('words', WordController::class);

Route::get('/dashboard', function () {
    return view('portal.index');
})->middleware(['auth'])->name('dashboard');

//Ajax
Route::get('/quick_ass', 'App\Http\Controllers\WordController@quick_ass')->middleware('ajax');


require __DIR__.'/auth.php';
