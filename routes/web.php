<?php

use App\Http\Controllers\controllerPetlar;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\controllerInteresse;
use Illuminate\Support\Facades\Route;

// Rotas de autenticação admin (DEVEM VIR ANTES DAS PROTEGIDAS)
Route::get('/petlar/cadastrarcomoadmin', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
Route::post('/petlar/cadastrarcomoadmin', [AdminAuthController::class, 'register'])->name('admin.register.submit');
Route::get('/petlar/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/petlar/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/petlar/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Rotas públicas
Route::get('/', [controllerPetlar::class, 'index'])->name('index');
Route::get('/petlar/mais/{id}', [controllerPetlar::class, 'show'])->name('verPets');
Route::get('/petlar/pesquisar', [controllerPetlar::class, 'pesquisarPet'])->name('pesquisarPets');
Route::post('/petlar/procurar', [controllerPetlar::class, 'procurarPet'])->name('procurarPet');
Route::get('/petlar/canil', function(){return view('canil');})->name('canil');
Route::get('/petlar/filtro', [controllerPetlar::class, 'filtro'])->name('filtroPets');

// Rotas de interesse (públicas)
Route::get('/petlar/interesse/{id}', [controllerInteresse::class, 'create'])->name('interesse.create');
Route::post('/petlar/interesse', [controllerInteresse::class, 'store'])->name('interesse.store');

// Rotas protegidas (apenas admin)
Route::middleware(['admin'])->group(function () {
    Route::get('/petlar/cadastro', [controllerPetlar::class, 'create'])->name('formCadastro');
    Route::post('/petlar/adotar', [controllerPetlar::class, 'store'])->name('adotar');
    Route::get('/petlar/editarPet/{id}', [controllerPetlar::class, 'edit'])->name('editarPet');
    Route::put('/petlar/editarPet/{id}', [controllerPetlar::class, 'update'])->name('updatePet');
    Route::get('/petlar/removerPet/{id}', [controllerPetlar::class, 'destroy'])->name('removerPet');
});

// Rotas administrativas (protegidas)
Route::middleware('auth:admin')->group(function () {
    Route::get('/interesses', [controllerInteresse::class, 'index'])->name('interesse.index');
    Route::get('/interesse/{id}', [controllerInteresse::class, 'show'])->name('interesse.show');
    Route::patch('/interesse/{id}/status', [controllerInteresse::class, 'updateStatus'])->name('interesse.updateStatus');
    Route::delete('/interesse/{id}', [controllerInteresse::class, 'destroy'])->name('interesse.destroy');
});