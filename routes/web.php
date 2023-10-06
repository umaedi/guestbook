<?php

namespace App\Http\Controllers;

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

Route::get('/', QrcodeController::class);
Route::get('/login/{jwt}', function () {
    setcookie('jwt', request()->jwt, 60);
    return redirect('/admin/dashboard');
});

Route::get('/guestbook', [GuestbookController::class, 'index']);
Route::post('/guestbook/store', [GuestbookController::class, 'store']);
Route::get('/guestbook/thankyou', [GuestbookController::class, 'thankyou']);

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index']);
});
