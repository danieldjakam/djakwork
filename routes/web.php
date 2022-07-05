<?php

use App\Http\Controllers\ProposalController;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('welcome');

Route::get('/jobs', '\App\Http\Controllers\JobController@index')->name('jobs.index');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', function(){return view('home');})->name('home');
    Route::get('/jobs/{id}', '\App\Http\Controllers\JobController@show')->name('jobs.show');
    Route::group(['name' => '/conversations'], function(){
        Route::get('/conversations', '\App\Http\Controllers\ConversationController@index')->name('conversations.index');
        Route::get('/conversations/{conversation}', '\App\Http\Controllers\ConversationController@show')->name('conversations.show');
    });
    Route::get('/acceptal/{proposal}', [ProposalController::class, 'accept'])->name('proposals.confirm');
    Route::group(['middleware' => 'proposal'], function(){
        Route::post('/submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
    });
});

