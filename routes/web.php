<?php

use App\Http\Controllers\CartController;
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

Route::get('/','HomepageController@index')->name('homepage');

// Rutas de inicio y registro de sesion
Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');   
Route::post('/signin', 'UserController@login')->name('user.login');

// Ruta de página principal
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Rutas de las funciones de cliente para portafolios
Route::get('portfolios/contractsign/{id}', 'PortfolioController@contractsign')->name('portfolios.contractsign');
Route::post('portfolios/signcontract/{id}', 'PortfolioController@signcontract')->name('portfolios.signcontract');

Route::get('cart/create/{portfolio}', 'CartController@create')->name('cart.create');
Route::get('/cart', 'CartController@index')->name('cart.index');

// Rutas de las funciones de compra de portafolios
Route::get('order/create/{cart}', 'OrderController@create')->name('order.create');
Route::get('/order', 'OrderController@index')->name('order.review');

//Route::post('orders/{order}/transaction-done', 'OrderController@transaction')->name('order.transaction');
//Route::get('orders/{order}/purchase/success', function() {
//    echo 'La compra fue realizada exitosamente';
//})->name('order.transaction.success');

// Rutas de las funciones de cliente para portafolios
Route::get('/portfolios', 'PortfolioController@index')->name('portfolios.index');    
Route::get('/portfolios/show/{id}', 'PortfolioController@show')->name('portfolios.show');

// Rutas de las funciones de cliente para contratos
Route::get('/contracts', 'ContractController@index')->name('contracts.index');    
Route::get('/contracts/show/', 'ContractController@show')->name('contracts.show');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();