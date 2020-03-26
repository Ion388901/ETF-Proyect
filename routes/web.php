<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');

// Rutas de inicio y registro de sesion
Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');   
Route::post('/signin', 'UserController@login')->name('user.login');

// Ruta de página principal
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Rutas de las funciones de cliente para portafolios
Route::get('/portfolios/cart', 'PortfolioController@cart')->name('cart');
Route::get('/portfolios/add-to-cart/{id}', 'PortfolioController@addToCart')->name('add-to-cart');
Route::delete('/portfolios/remove-from-cart', 'PortfolioController@remove')->name('remove-from-cart');

// Rutas de las funciones de compra de portafolios
Route::get('orders/create', 'OrderController@create')->name('order.create');
Route::post('orders/{order}/transaction-done', 'OrderController@transaction')->name('orders.transaction');
Route::get('orders/{order}/purchase/success', function() {
    echo 'La compra fue realizada exitosamente';
})->name('orders.transaction.success');

// Rutas de las funciones de cliente para portafolios
Route::get('/portfolios', 'PortfolioController@index')->name('portfolios.index');    
Route::get('/portfolios/show/{id}', 'PortfolioController@show')->name('portfolios.show');
Route::get('/portfolios/{order?}', 'PortfolioController@index')->name('portfolios.index');

// Rutas de las funciones de cliente para contratos
// Probablemente añadir rutas para firma de contrato 
Route::get('/contracts', 'ContractController@index')->name('contracts.index');    
Route::get('/contracts/show/{id}', 'ContractController@show')->name('contracts.show');    
Route::get('/contracts/{order?}', 'ContractController@index')->name('contracts.index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
