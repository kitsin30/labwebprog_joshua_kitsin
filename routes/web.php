<?php

use App\Http\Controllers\accountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\manageProductController;
use App\Http\Controllers\ProductController;
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

//sementara
Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/register', [accountController::class, 'index']);
Route::post('/register', [accountController::class, 'store'])->name('createAccount');

Route::get('/manageProduct', [ProductController::class, 'manageView']);

Route::get('/manageAddProduct', [ProductController::class, 'addProductView']);
Route::post('/manageAddProduct', [ProductController::class, 'store'])->name('addProduct');

Route::get('/manageUpdateProduct/{productID}', [ProductController::class, 'updateProductView'])->name('updateView');
Route::patch('/manageUpdateProduct', [ProductController::class, 'update'])->name('updateProduct');

Route::delete('/deleteProduct', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

Route::get('/home', [ProductController::class, 'index']);

Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::resource('/category', CategoryController::class, [
    'only' => ['show']
]);

Route::resource('/product', ProductController::class, [
    'only' => ['show']
]);
