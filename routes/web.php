<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// use App\Mail\LogMailable;
// use Illuminate\Support\Facades\Mail;

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
    return redirect('login');
});

Route::view('login', 'auth.login')->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'login']);
Route::view('register', 'auth.register')->name('register')->middleware('guest');
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth')->group(
    function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        Route::resource('tasks', TaskController::class);
        Route::resource('logs', LogController::class);
        Route::post('logout', [AuthController::class, 'logout']);
    }
);

// Route::get('mail', function(){
//     $mail = new LogMailable;
//     Mail::to('email-address')->send($mail);
//     return 'send';
// });
