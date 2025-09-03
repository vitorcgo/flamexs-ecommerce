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

// Usada para listar todos os itens da tabela 
Route::get('/admin/categorias', [CategoryController::class , 'index' ])->name('admin.categorias.index');
//Rota usada para mandar para armazenar no banco de dados aquelas informacoes
Route::post('/admin/categorias', [CategoryController::class , 'store']);

// Rota usada para gerenciar e editar o produto que voce clicou
Route::get('/admin/categorias/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categorias.edit');

// Rota para atualizar status da categoria
Route::post('/admin/categorias/{id}/status', [CategoryController::class, 'updateStatus'])->name('admin.categorias.status');

// Nessa rota temos que utilizar o metodo put pois ele somente funciona assim por causa de estarmos usando Windows\
Route::put('/admin/categorias/{id}', [CategoryController::class, 'update'])->name('admin.categorias.update');

//Rota criada somente para poder excluir uma categoria
Route::delete('/admin/categorias/{id}', [CategoryController::class, 'destroy'])->name('admin.categorias.destroy');
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
