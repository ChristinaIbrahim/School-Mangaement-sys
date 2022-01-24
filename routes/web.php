<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTokenIsValid;
use App\Http\Controllers\GradeController;


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


Route::middleware([EnsureTokenIsValid::class])->group(function () {
    Route::get('/', function () {
       return view('auth.login');

    });
});

Auth::routes();


Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth' ]
    ], function(){ 
        
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');
        // Route::get('/grades', 'GradeController@index')->name('grades');


        Route::get('/grades', [GradeController::class, 'index'])->name('grades');

       
        // Route::namespace(['namespace' => 'Grades'],function(){
        // // Route::get('/Grades', 'GradeController@index')->name('Grades');
        // Route::resource('Grades', 'GradeController');


        // });
        
        });
