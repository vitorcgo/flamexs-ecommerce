<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserProfileController; 
use App\Http\Controllers\AddressController;


// -----------------------------------------------------------
// Suas Rotas de Administrador - Painel
// -----------------------------------------------------------

Route::get('/admin', function () {
   return view('admin.login.store');
});

//--- [ TODAS AS SUAS OUTRAS ROTAS DE ADMIN, PRODUTOS, CATEGORIAS, ETC., CONTINUAM EXATAMENTE IGUAIS AQUI ] ---//
// ... (vou omitir para não ficar gigante, mas elas entram aqui)
//---------------------------Produtos------------------------------------------//

// Listar todos os produtos
Route::get('/admin/produtos/index', [ProductController::class, 'index'])->name('admin.produtos.index');

// Criar novo produto
Route::get('/admin/produtos/create', [ProductController::class, 'create'])->name('admin.produtos.create');
Route::post('/admin/produtos', [ProductController::class, 'store'])->name('admin.produtos.store');

// Visualizar produto específico
Route::get('/admin/produtos/{id}/show', [ProductController::class, 'show'])->name('admin.produtos.show');

// Editar produto
Route::get('/admin/produtos/{id}/edit', [ProductController::class, 'edit'])->name('admin.produtos.edit');
Route::put('/admin/produtos/{id}', [ProductController::class, 'update'])->name('admin.produtos.update');

// Excluir produto
Route::delete('/admin/produtos/{id}', [ProductController::class, 'destroy'])->name('admin.produtos.destroy');

// Remover imagem do produto
Route::delete('/admin/produtos/media/{id}', [ProductController::class, 'destroyMedia'])->name('admin.produtos.media.destroy');

// Dashboard
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard.index');
});

// Vendas
Route::get('/admin/vendas', function(){
    return view('admin.vendas.index');
});

//---------------------------Administradores------------------------------------------//

Route::get('/admin/administradores', [AdminController::class , 'index' ]);
Route::get('/admin/administradores/create' , [AdminController::class, 'create']);
Route::post('/admin/administradores', [AdminController::class , 'store']);
Route::delete('/admin/administradores/{admin}', [AdminController::class, 'destroy']);
Route::get('/admin/administradores/{admin}/edit', [AdminController::class, 'edit']);
Route::put('/admin/administradores/{admin}', [AdminController::class, 'update']);
// Rota para ativar/desativar o status do administrador
Route::patch('/admin/administradores/{admin}/toggle-status', [AdminController::class, 'toggleStatus']);

//---------------------------Categorias------------------------------------------//

// Categorias
// Route::get('/admin/categorias', function(){
//     return view('admin.categorias.index');
// });

// Usada para listar todos os itens da tabela 
Route::get('/admin/categorias', [CategoryController::class , 'index' ]);

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

// Pagina Principal - Isso já resolve o erro do "welcome not found"
Route::get('/', [ClientProductController::class, 'home'])->name('client.home.index');

// Pagina de Produtos
Route::get('/produtos', [ClientProductController::class, 'index'])->name('client.produtos.index');
Route::get('/produto/{id}', [ClientProductController::class, 'show'])->name('client.produtos.show');


// Rotas de Usuario
Route::get('/user' , function () {
    return view('client.usuario.user.index');
})->middleware('auth'); // Adicionar middleware aqui também é uma boa ideia

Route::middleware(['auth'])->group(function () {

    Route::get('/user/info', function () {
        return view('client.usuario.user.edit');
    })->name('user.info.edit');

    Route::get('/user/info/password', function () {
        return view('client.usuario.password.edit');
    })->name('user.password.edit');

    Route::get('/user/address', function () {
        return view('client.usuario.address.edit');
    })->name('user.address.edit');

    // ADICIONE ESTA NOVA ROTA PARA O UPDATE
    Route::patch('/user/info', [UserProfileController::class, 'update'])->name('user.info.update');


});

//Listagem de usuarios no admin
Route::get('/admin/users', function() {
    return view('admin.users.index');
});


// Adicione esta rota para resolver o problema de redirecionamento do login
Route::get('/dashboard', function () {
    return redirect('/user');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    // ... (suas outras rotas de GET /user, /user/info, etc.)

    // GARANTA QUE ESTA ROTA ESTEJA AQUI:
    Route::patch('/user/address', [AddressController::class, 'update'])->name('user.address.update');
});

// =================================================================
require __DIR__.'/auth.php';
// =================================================================