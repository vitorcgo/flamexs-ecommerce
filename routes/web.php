<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddAdministratorController;
use App\Http\Controllers\AddProductController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ViewProductController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/sobre', function () {
    return view('sobre');
});


Route::get('/troca', function () {
    return view('troca');
});


Route::get('/contato', function () {
    return view('contato');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/cadastro', function () {
    return view('cadastro');
});

Route::get('/produtos', function () {
    return view('produtos');
});

Route::get('/produto/{id}', function ($id) {
    return view('produto-detalhes');
});

Route::get('/login-adm', function () {
    return view('login-adm');
});

Route::get('/adm', function () {
   return view('/login-adm');
});
