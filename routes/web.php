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

//Continuar..


// -----------------------------------------------------------


// Rotas do Layout (Paginas que não precisam de controller, apenas exibem um front.)
Route::get('/sobre', function () {
    return view('client.layout.sobre');
});

Route::get('/troca', function () {
    return view('client.layout.troca');
});
Route::get('/contato', function () {
    return view('client.layout.contato');
});

