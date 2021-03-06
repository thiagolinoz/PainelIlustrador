<?php

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
    return view('site/welcome');
});

//Auth::routes();

// Authentication Routes...
Route::get('admin', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\EncerraController@index')->name('logout');

// Registration Routes...
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

// Route resources controller
Route::resource('admin/caixaEntrada', 'CaixaEntradaController');
Route::resource('admin/sobre', 'SobreController');
Route::resource('admin/portfolio', 'PortfolioController');
Route::resource('admin/produto', 'ProdutoController');
Route::resource('admin/medidas', 'MedidasController');

//confirm set deteled true storage
Route::get('admin/portfolio/confirm/{id}', 'PortfolioController@confirm')->name('portfolio.confirm');
Route::get('admin/caixaEntrada/confirm/{id}', 'CaixaEntradaController@confirm')->name('caixaEntrada.confirm');
Route::get('admin/produto/confirm/{id}', 'ProdutoController@confirm')->name('produto.confirm');
Route::get('admin/medidas/confirm/{id}', 'MedidasController@confirm')->name('medidas.confirm');
Route::get('admin/produto/confirmaRemoveBotao/{idProduto}/{idBotao}', 'ProdutoController@confirmaRemoveBotao')->name('produto.confirmaRemoveBotao');
Route::post('admin/produto/apagaBotao/{idProduto}/{idBotao}', 'ProdutoController@apagaBotao')->name('medidas.apagaBotao');

Route::get('admin/home', 'AdminHomeController@index')->name('admin.home');
//site
Route::get('sobre', 'Site\SobreController@index');
Route::get('portfolio', 'Site\PortfolioController@index');
Route::get('contato', 'Site\ContatoController@index');
Route::get('loja', 'Site\ProdutoController@index');
Route::get('loja-detalhe/{id}', 'Site\ProdutoController@detalhe');
Route::get('loja/agradecimento', 'Site\ProdutoController@agradecimento');
Route::post('produto/botaoJson', 'Site\ProdutoController@botaoJson');

Route::post('contato/send', 'Site\ContatoController@send');
