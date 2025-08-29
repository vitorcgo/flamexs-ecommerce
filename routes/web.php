<?php

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
Route::get('/adm', function () {
   return view('admin.login.store');
});

Route::get('/adm/produtos/create', function(){
    return view('admin.produtos.create');
});

Route::get('/adm/produtos/show', function(){
    return view('admin.produtos.show');
});

Route::get('/adm/produtos/index', function(){
    return view('admin.produtos.index');
});

// Dashboard
Route::get('/adm/dashboard', function(){
    return view('admin.dashboard.index');
});

// Vendas
Route::get('/adm/vendas', function(){
    return view('admin.vendas.index');
});

// Administradores
Route::get('/adm/administradores', function(){
    return view('admin.administradores.index');
});

// Categorias
Route::get('/adm/categorias', function(){
    return view('admin.categorias.index');
});

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

