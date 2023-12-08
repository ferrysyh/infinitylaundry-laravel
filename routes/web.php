<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::post('/postRegist', [LoginController::class, 'postRegist']);

Route::post('/postLogin', [LoginController::class, 'postLogin']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/service', function () {
    return view('pages.service');
});

Route::group(['middleware' => ['auth', 'checkrole:owner,customer']], function() {
    Route::get('/dashboard', function () {
        return view('pages.customers.dashboard');
    });
});

Route::get('/order', function () {
    return view('pages.customers.order.laundry');
});

Route::get('/package', function () {
    return view('pages.customers.order.package');
});

Route::get('/items', function () {
    return view('pages.customers.order.items');
});

Route::get('/confirm', function () {
    return view('pages.customers.order.confirm');
});