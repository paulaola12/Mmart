<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
// use App\Http\Controllers\userController;

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
// CART Controller



// PRODUCT CONTROLLER
Route::get('/',[ProductsController::class, 'index'])->name('frontPage.mart');

Route::get('/mart/{id}', [ProductsController::class, 'show'])->name('show.mart');

// show products form
Route::get('/products', [ProductsController::class, 'register']);

// create Products
Route::post('/product-create', [ProductsController::class, 'create']);

// show cart
Route::get('/cart',[ProductsController::class, 'cart'])->name('cart.mart');
// checkout
Route::get('/checkout',[ProductsController::class, 'checkout'])->name('checkout.mart');
// Pay
Route::post('/pay', [ProductsController::class, 'pay'])->name('pay.mart');


// USER CONTROLLER

// show registeration form
Route::get('/register', [UserController::class, 'create'])->name('register.mart');

//create user registeration
Route::post('/create', [UserController::class, 'register'])->name('create.mart');

// Log in of already created user
Route::get('/login',[UserController::class, 'login'])->name('login.mart');

// authenticate User
Route::post('/authenticate',[UserController::class, 'authenticate']);

// verify the buyer is logged in
Route::post('/verify/{id}', [UserController::class, 'addToCart']);






// Route::get('/let', function () {
//     return view('cart');
// })->name('cart.mart');

// Route::get('/mart/registera',[UserController::class, 'index']);

// Route::get('/mart/registeraa',[UserController::class, 'showa'])->name('register.mart');












// Route::get('/login', function () {
//     return view('registeation');
// })->name('login.mart');







Route::get('/contact-us', function () {
    return view('contact-us');
})->name('contact-us.mart');