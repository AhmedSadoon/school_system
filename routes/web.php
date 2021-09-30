<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['middleware' => ['guest']], function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});


 //==============================Translate all pages============================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ], function () {

     //==============================dashboard============================
     Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

   //==============================dashboard============================
   Route::resource('Grades', App\Http\Controllers\Web\Grade\GradeController::class);


    //==============================Classrooms============================

    Route::resource('Classrooms', App\Http\Controllers\Web\ClassRoom\ClassroomController::class);

        Route::post('delete_all', [App\Http\Controllers\Web\ClassRoom\ClassroomController::class, 'delete_all'])->name('delete_all');

        Route::post('Filter_Classes', [App\Http\Controllers\Web\ClassRoom\ClassroomController::class, 'Filter_Classes'])->name('Filter_Classes');




});
