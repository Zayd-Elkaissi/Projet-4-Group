<?php


use App\Http\Controllers\tacheController;
use App\Http\Controllers\TutorialController;
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


Route::get('/pagination',[tacheController::class,'index']);
Route::post('pagination/fetch',[tacheController::class,'fetch'])->name('pagination.fetch');

Route::get('/', [TutorialController::class,'index'])->name('pagination.fetch');


