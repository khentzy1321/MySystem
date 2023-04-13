<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::post('/heartbeat', function(Request $request) {
        $user = $request->user();
        $user->last_active_at = now();
        $user->save();

        return response()->json(['success' => true]);
    });
});
Route::post('/logouts', '\App\Http\Controllers\Auth\LoginController@logout')->name('logouts');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
Route::resource('bio', 'App\Http\Controllers\BioProfile');
Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('chats', 'App\Http\Controllers\ChatController');
Route::get('users/bgView/{id}', [App\Http\Controllers\UserController::class, 'bgView']);
Route::get('users/profView/{id}', [App\Http\Controllers\UserController::class, 'profView']);
Route::put('users/updateBackImage/{id}', [App\Http\Controllers\UserController::class, 'updateBackImage']);
Route::put('users/updateProfImage/{id}', [App\Http\Controllers\UserController::class, 'updateProfImage']);
Route::get('/scan', 'App\Http\Controllers\BarcodeScannerController@handleBarcode');
