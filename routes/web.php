<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MyPimeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});



//registrarse
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register']);



//login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);



//cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Recuperar contraseña
Route::get('forgot', [AuthController::class, 'forgot'])->name('password.request');
Route::post('forgot_post', [AuthController::class, 'forgot_post'])->name('password.email');
Route::get('reset/{token}', [AuthController::class, 'getReset'])->name('password.reset');
Route::post('reset_post/{token}', [AuthController::class, 'postReset'])->name('password.update');






//superadmin
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', function () {
        return view('superadmin.dashboard');
    })->name('superadmin.dashboard');

    Route::get('/superadmin/mypimes', function () {
        return view('superadmin.mypimes');
    })->name('superadmin.mypimes');

    Route::resource('mypimes', MyPimeController::class);
    Route::post('mypimes/{mypime}/toggle-status', [MyPimeController::class, 'toggleStatus'])->name('mypimes.toggleStatus');

     // Rutas de gestión de usuarios
     Route::resource('users', UserController::class);
     Route::post('users/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('users.toggleStatus');
});





//admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});







//Usuarios
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        return view('user.home', compact('user'));
    })->name('user.home');


    Route::get('/products', [ProductController::class, 'show'])->name('products.index');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/placeOrder', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

});
