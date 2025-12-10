<?php

use App\Http\Controllers\controllerPetlar;
use Illuminate\Support\Facades\Route;

Route::get('/', [controllerPetlar::class, 'index'])->name('index');
Route::get('/petlar/cadastro', [controllerPetlar::class, 'create'])->name('formCadastro');
Route::post('/petlar/adotar', [controllerPetlar::class, 'store'])->name('adotar');
Route::get('/petlar/mais/{id}', [controllerPetlar::class, 'show'])->name('verPets');
Route::get('/petlar/editarPet/{id}', [controllerPetlar::class, 'edit'])->name('editarPet');
Route::put('/petlar/editarPet/{id}', [controllerPetlar::class, 'update'])->name('updatePet');
Route::get('/petlar/removerPet/{id}', [controllerPetlar::class, 'destroy'])->name('removerPet');
Route::get('/petlar/pesquisar', [controllerPetlar::class, 'pesquisarPet'])->name('pesquisarPets');
Route::post('/petlar/procurar', [controllerPetlar::class, 'procurarPet'])->name('procurarPet');
Route::get('/petlar/canil', function(){return view('canil');})->name('canil');
Route::get('/petlar/filtro', [controllerPetlar::class, 'filtro'])->name('filtroPets');

use App\Http\Controllers\controllerInteresse;

Route::get('/petlar/interesse/{id}', [controllerInteresse::class, 'create'])->name('interesse.create');
Route::post('/petlar/interesse', [controllerInteresse::class, 'store'])->name('interesse.store');



