<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
// Rutas de inicio de sesión
Route::get('/register', 'UserController@register')->name('user.register');
Route::post('/register', 'UserController@create')->name('user.create');
Route::get('/logout', 'UserController@logout')->name('user.logout');
Route::get('/signin', 'UserController@signin')->name('user.signin');
Route::post('/signin', 'UserController@login')->name('user.login');

// Ruta de entrada
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// Rutas de las funciones de los portafolios
Route::get('portfolios/create', 'PortfolioController@create')->name('portfolios.create');
Route::get('portfolios/{order?}', 'PortfolioController@index')->name('portfolios.index');
Route::post('portfolios', 'PortfolioController@store')->name('portfolios.store');
Route::get('portfolios/show/{id}', 'PortfolioController@show')->name('portfolios.show');
Route::delete('portfolios/destroy/{id}', 'PortfolioController@destroy')->name('portfolios.destroy');
Route::get('portfolios/edit/{id}', 'PortfolioController@edit')->name('portfolios.edit');
Route::put('portfolios/update/{id}', 'PortfolioController@update')->name('portfolios.update');

// Rutas de las funciones de los contratos (añadir mas rutas)
Route::get('contracts/create', 'ContractController@create')->name('contracts.create');
Route::post('contracts', 'ContractController@store')->name('contracts.store');
Route::get('contracts', 'ContractController@index')->name('contracts.index');
Route::get('contracts/show/{id}', 'ContractController@show')->name('contracts.show');
Route::delete('contracts/destroy/{id}', 'ContractController@destroy')->name('contracts.destroy');
Route::get('contracts/edit/{id}', 'ContractController@edit')->name('contracts.edit');
Route::put('contracts/update/{id}', 'ContractController@update')->name('contracts.update');
Route::get('contracts/{contract}/portfolios/create', 'PortfolioContractController@create')->name('contracts.portfolio.create');
Route::post('contracts/{contract}/portfolios', 'PortfolioContractController@store')->name('contracts.portfolio.store');
