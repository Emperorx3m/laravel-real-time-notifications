<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Events\MyEvent;

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
    auth()->login(User::first());

    return view('welcome');
});

//Route::post('broadcasting/auth', function () {
//    return Auth::check();
//});

Route::get('/push', function () {
    
	event(new MyEvent("Random number currently is " . mt_rand(100, 10000)));

	event(new App\Events\RealTimeMessage("Real time message  " . mt_rand(1000, 20000)));
    //return view('welcome');
});

