<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;


//--------------------------------------------------------


// Rotas do Cliente - Depois trocamos para sincronizar com os controllers, 
// apenas arrumei a organização das paginas - Vitor


// Pagina Principal
Route::get('/', function () {
    return view('client.home.index');
});

// Pagina de Produtos
Route::get('/produtos', function () {
    return view('client.produtos.index');
});
// Pagina do produto por ID
Route::get('/produto/{id}', function ($id) {
    return view('client.produtos.show');
});

// Pagina de Login - Usuario
Route::get('/login', function () {
    return view('client.login.store');
});

// Pagina de Cadastro - Usuario
Route::get('/cadastro', function () {
    return view('client.cadastro.store');
});

// -----------------------------------------------------------


// Rotas do Administrador - Painel
Route::get('/admin', function () {
   return view('admin.login.store');
});

Route::get('/admin/produtos/create', function(){
    return view('admin.produtos.create');
});

Route::get('/admin/produtos/show', function(){
    return view('admin.produtos.show');
});

Route::get('/admin/produtos/index', function(){
    return view('admin.produtos.index');
});

Route::get('/admin/produtos/edit/{id}', function($id){
    return view('admin.produtos.edit');
});

// Dashboard
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard.index');
});

// Vendas
Route::get('/admin/vendas', function(){
    return view('admin.vendas.index');
});

// Administradores
Route::get('/admin/administradores', function(){
    return view('admin.administradores.index');
});

Route::get('/admin/administradores/create', function () {
    return view('admin.administradores.create');
});

Route::get('/admin/administradores/edit/{id}', function ($id) {
    return view('admin.administradores.edit');
});

// Categorias
// Route::get('/admin/categorias', function(){
//     return view('admin.categorias.index');
// });

// Usada para listar todos os itens da tabela 
Route::get('/admin/categorias', [CategoryController::class , 'index' ]);

Route::post('/admin/categorias', [CategoryController::class , 'store']);

//Continuar..


// -----------------------------------------------------------


// Rotas do Layout (Paginas que não precisam de controller, apenas exibem um front.)
Route::get('/sobre', function () {
    return view('client.home.sobre');
});

Route::get('/troca', function () {
    return view('client.home.troca');
});
Route::get('/contato', function () {
    return view('client.home.contato');
});
