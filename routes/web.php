<?php

use App\Http\Controllers;
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
});

Route::middleware('auth')->group(function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::resource('friends', Controllers\FriendsController ::class);
    Route::resource('groups', Controllers\GroupsController ::class);
    Route::post('groups/{id}/add-friends', [Controllers\GroupsController ::class, 'addFriends'])->name('groups.add-friends');

});


require __DIR__.'/auth.php';
