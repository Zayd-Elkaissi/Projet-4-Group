<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\googleController;
use App\Http\Controllers\PreparationTacheController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',"auth" ]],function(){


    Route::resource('task', PreparationTacheController::class);
    Route::get('/',[PreparationTacheController::class,'index'])->name('index');
    Route::get('exportexcel',[PreparationTacheController::class,'exportexcel'])->name('exportexcel');
    Route::post('importexcel',[PreparationTacheController::class,'importexcel'])->name('importexcel');
    route::get('/filter_bief',[PreparationTacheController::class,'filter_bief'])->name('filter_bief');
    route::get('/searchtache',[PreparationTacheController::class,'search_tache'])->name('searchtache');
    route::get('/generatepdf',[PreparationTacheController::class,'generatepdf'])->name('generate');

});
Route::get('dashboard',[DashboardController::class,"index"])->name('dashboard');;

Route::get('google-auth',[googleController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[googleController::class,'callbackGoogle']);
