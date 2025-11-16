<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\SocialLoginController;

/*
|--------------------------------------------------------------------------
| Rotas do Cliente (Páginas Públicas)
|--------------------------------------------------------------------------
*/

// Página Principal  - Isso já resolve o erro do "welcome not found"
Route::get('/', [ClientProductController::class, 'home'])->name('client.home.index');

// Páginas de Produtos
Route::get('/produtos', [ClientProductController::class, 'index'])->name('client.produtos.index');
Route::get('/produto/{id}', [ClientProductController::class, 'show'])->name('client.produtos.show');

// -----------------------------------------------------------
// Suas Rotas de Layout
// -----------------------------------------------------------

Route::get('/sobre', function () {
    return view('client.home.sobre');
});
Route::get('/troca', function () {
    return view('client.home.troca');
});
Route::get('/contato', function () {
    return view('client.home.contato');
});

//--------------------------------------------------------
// Suas Rotas de Cliente
//--------------------------------------------------------

Route::get('/user/carrinho/comprar', function () {
    return view ('.client.carrinho.index');
});
Route::get('/user/carrinho/sucesso', function () {
    return view('.client.carrinho.concluido');
});

// Rotas para Login Social (Google)
Route::get('/login/google', [SocialLoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);


/*
|--------------------------------------------------------------------------
| Rotas do Perfil do Cliente (Logado)
|--------------------------------------------------------------------------
*/

// Grupo que exige que o *CLIENTE* (guarda 'web') esteja logado
Route::middleware(['auth'])->group(function () {

    // Página principal do perfil
    Route::get('/user' , function () {
        return view('client.usuario.user.index');
    })->name('user.index');

    // Páginas de edição
    Route::get('/user/info', function () {
        return view('client.usuario.user.edit');
    })->name('user.info.edit');

    Route::get('/user/info/password', function () {
        return view('client.usuario.password.edit');
    })->name('user.password.edit');

    Route::get('/user/address', function () {
        return view('client.usuario.address.edit');
    })->name('user.address.edit');

    // Rotas que recebem os dados (UPDATE/PATCH)
    Route::patch('/user/info', [UserProfileController::class, 'update'])->name('user.info.update');
    Route::patch('/user/address', [AddressController::class, 'update'])->name('user.address.update');

    // Rota 'ponte' para o Breeze
    Route::get('/dashboard', function () {
        return redirect('/user');
    })->name('dashboard');
});

// Carrega as rotas de autenticação do CLIENTE (login, cadastro, etc.)
require __DIR__.'/auth.php';


/*
|--------------------------------------------------------------------------
| Rotas do Painel de Admin
|--------------------------------------------------------------------------
|
| Todas as rotas do admin estão agora agrupadas e com o prefixo '/admin'.
|
*/

Route::prefix('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Autenticação do Admin (O que NÃO precisa de login)
    |--------------------------------------------------------------------------
    | Usamos o middleware 'guest:admin' para que, se o admin já estiver
    | logado, ele seja redirecionado para o dashboard, e não para o login.
    */
    Route::middleware('guest:admin')->group(function () {

        // Mantivemos sua URL original (GET /admin) para a página de login
        Route::get('/', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');

        // O formulário de /admin enviará os dados para (POST /admin)
        Route::post('/', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    });


    /*
    |--------------------------------------------------------------------------
    | Área Protegida do Admin (O que PRECISA de login)
    |--------------------------------------------------------------------------
    | Usamos o middleware 'auth:admin' para "trancar" todas as rotas
    | abaixo. Só um admin logado pode acessá-las.
    */
    Route::middleware('auth:admin')->group(function () {

        // Logout
        Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        // Dashboard
        Route::get('/dashboard', function(){
            return view('admin.dashboard.index');
        })->name('admin.dashboard');

        // Vendas
        Route::get('/vendas', function(){
            return view('admin.vendas.index');
        })->name('admin.vendas');

        // Listagem de Clientes (Users)
        Route::get('/users', function() {
            return view('admin.users.index');
        })->name('admin.users.index');


        // --- CRUD de Produtos ---
        // (URLs: /admin/produtos/..., /admin/produtos/create, etc.)
        Route::prefix('produtos')->name('admin.produtos.')->group(function () {
            Route::get('/index', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/', [ProductController::class, 'store'])->name('store');
            Route::get('/{id}/show', [ProductController::class, 'show'])->name('show');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('edit');
            Route::put('/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/{id}', [ProductController::class, 'destroy'])->name('destroy');
            Route::delete('/media/{id}', [ProductController::class, 'destroyMedia'])->name('media.destroy');
        });

        // --- CRUD de Administradores ---
        // (URLs: /admin/administradores, /admin/administradores/create, etc.)
        Route::prefix('administradores')->name('admin.administradores.')->group(function () {
            Route::get('/', [AdminController::class , 'index' ])->name('index');
            Route::get('/create' , [AdminController::class, 'create'])->name('create');
            Route::post('/', [AdminController::class , 'store'])->name('store');
            Route::get('/{admin}/edit', [AdminController::class, 'edit'])->name('edit');
            Route::put('/{admin}', [AdminController::class, 'update'])->name('update');
            Route::delete('/{admin}', [AdminController::class, 'destroy'])->name('destroy');
            Route::patch('/{admin}/toggle-status', [AdminController::class, 'toggleStatus'])->name('toggleStatus');
        });

        // --- CRUD de Categorias ---
        // (URLs: /admin/categorias, /admin/categorias/create, etc.)
        Route::prefix('categorias')->name('admin.categorias.')->group(function () {
            // Usada para listar todos os itens da tabela 
            Route::get('/', [CategoryController::class , 'index' ])->name('index');
            Route::post('/', [CategoryController::class , 'store'])->name('store');
            // Rota usada para gerenciar e editar o produto que voce clicou
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
            // Nessa rota temos que utilizar o metodo put pois ele somente funciona assim por causa de estarmos usando Windows\
            Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
            //Rota criada somente para poder excluir uma categoria
            Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
            // Rota para atualizar status da categoria
            Route::post('/{id}/status', [CategoryController::class, 'updateStatus'])->name('status');
        });

    }); // Fim do middleware 'auth:admin'

}); // Fim do prefix 'admin'
