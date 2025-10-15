<?php

    use App\Http\Controllers\controllerPetlar;
    use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('index');
});
    Route::post('/petlar/logar', function () {return view('logar'); })->name('logar');
    Route::get('/petlar/cadastro', function () {return view('formCadastro'); })->name('formCadastro');
    Route::get('/petlar/interesse', function () {return view('formInteresse'); })->name('formInteresse');
    Route::get('/petlar/mais', function () {return view('verPets'); })->name('verPets');
    Route::get('/petlar/perfilAnimal', function () {return view('perfilAnimal'); })->name('perfilAnimal');
    Route::get('/petlar/editarPet', function(){return view('editarPet');})->name('editarPet');
    Route::get('/petlar/canil', function(){return view('canil');})->name('canil');
    Route::get('/petlar/pesquisar', function(){return view('pesquisarPets');})->name('pesquisarPets');
    
    Route::get('/petlar/adotar', [controllerPetlar::class, 'create'])->name('adotar');
