<?php

use Illuminate\Support\Facades\Route;
use Gloudemans\Shoppingcart\Facades\Cart;
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

Route::view('/', 'pages.home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');
Route::view('/contacts', 'pages.contacts');


Route::get('redirects', App\Http\Controllers\HomeController::class);

Route::get('/rytu_shop', [App\Http\Controllers\RytuController::class, 'index'])->name('rytu.index');
Route::get('/rytu_shop/{rytu}', [App\Http\Controllers\RytuController::class, 'show'])->name('rytu.show');
Route::get('/figureles_shop', [App\Http\Controllers\FigurelesController::class, 'index'])->name('figureles.index');
Route::get('/figureles_shop/{figureles}', [App\Http\Controllers\FigurelesController::class, 'show'])->name('figureles.show');
Route::get('/atributika_shop', [App\Http\Controllers\AtributikaController::class, 'index'])->name('atributika.index');
Route::get('/atributika_shop/{atributika}', [App\Http\Controllers\AtributikaController::class, 'show'])->name('atributika.show');
Route::get('/puodeliai_shop', [App\Http\Controllers\PuodeliaiController::class, 'index'])->name('puodeliai.index');
Route::get('/puodeliai_shop/{puodeliai}', [App\Http\Controllers\PuodeliaiController::class, 'show'])->name('puodeliai.show');
Route::get('/search', [App\Http\Controllers\FigurelesController::class, 'search'])->name('search');
Route::get('/krepselis', [App\Http\Controllers\KrepselioController::class, 'index'])->name('krepselis.index');
Route::post('/krepselis', [App\Http\Controllers\KrepselioController::class, 'store'])->name('krepselis.store');
Route::delete('/krepselis/{product}', [App\Http\Controllers\KrepselioController::class, 'destroy'])->name('krepselis.destroy');
Route::get('empty',function (){
   Cart::destroy();
});
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/ačiū', [App\Http\Controllers\ConfirmationController::class, 'index'])->name('confirmation.index');

Route::group(['middleware' => ['role:admin|consultant']], function () {
    Route::get('/admin', [App\Http\Controllers\Admin\ApiController::class, 'api'])->name('admin.dashboard');

    Route::resource('admin/products', App\Http\Controllers\Admin\ProductsController::class);
    Route::resource('admin/types', App\Http\Controllers\Admin\TypesController::class);
    Route::resource('admin/categories', App\Http\Controllers\Admin\CategoriesController::class);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('admin/roles', App\Http\Controllers\Admin\RolesController::class);
    Route::resource('admin/users', App\Http\Controllers\Admin\UsersController::class);
});
