<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TranDetailController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [accountController::class, 'authCheck']);

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [accountController::class, 'loginAction'])->name('loginAccount');

Route::get('/register', [accountController::class, 'index']);
Route::post('/register', [accountController::class, 'store'])->name('createAccount');

Route::get('/home', [ProductController::class, 'index']);

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::resource('/category', CategoryController::class, [
    'only' => ['show']
]);

Route::resource('/product', ProductController::class, [
    'only' => ['show']
]);

Route::middleware(['admin.middleware'])->group(function () {
    Route::get('/manageProduct', [ProductController::class, 'manageView']);

    Route::get('/manageAddProduct', [ProductController::class, 'addProductView']);
    Route::post('/manageAddProduct', [ProductController::class, 'store'])->name('addProduct');

    Route::get('/manageUpdateProduct/{productID}', [ProductController::class, 'updateProductView'])->name('updateView');
    Route::patch('/manageUpdateProduct', [ProductController::class, 'update'])->name('updateProduct');

    Route::delete('/deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
});

Route::middleware(['admin.customer.middleware'])->group(function () {
    Route::get('/profile', [accountController::class, 'profileView']);

    Route::get('/logout', [accountController::class, 'logout'])->name('logout');
});

Route::middleware(['customer.middleware'])->group(function () {
    Route::get('/cart', [TransactionController::class, 'viewCart']);

    Route::get('/history', [TransactionController::class, 'viewHistory']);
});
