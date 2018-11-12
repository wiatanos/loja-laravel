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

Route::get('/', 'homeController@index');


Route::prefix('carrinho')->group(function () {
    Route::get('/', 'homeController@carrinho');
    Route::post('/insert', 'carrinhoController@insert')->name('insert');
    Route::post('/quantity', 'carrinhoController@quantity')->name('quantity');
    Route::post('/remove', 'carrinhoController@remove')->name('remove');
});

// Route::get('compra-finalizada', function(){
//     return view('compra-concluida');
// });

Route::get('compra-finalizada', 'homeController@finalizada');
Route::get('painel', 'homeController@painel');

Route::post('produto/pesquisa', 'produtoController@search');

Route::resources([
    'produto'   => 'produtoController',
    'categoria' => 'categoriaController',
    'pedido'    => 'pedidoController'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
