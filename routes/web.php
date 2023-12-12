<?php

use App\Http\Controllers\LaundryController;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'customer') {
            return view('pages.customers.dashboard');
        } elseif (auth()->user()->role === 'owner') {
            return view('pages.owner.dashboard');
        } else {
            return view('/');
        }
    });
    
    Route::get('/order', function () {
        return view('pages.customers.order.laundry');
    });
    Route::resource('/order', LaundryController::class);

    Route::get('/package/{id}', [LaundryController::class, 'showPackage'])->name('package');

    Route::get('/items/{laundryId}/{packageId}', [LaundryController::class, 'showItems'])->name('items');

    Route::get('/confirm', function () {
        return view('pages.customers.order.confirm');
    });
});



