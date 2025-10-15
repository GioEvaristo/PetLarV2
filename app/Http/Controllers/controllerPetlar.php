<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class controllerPetlar extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dados = Pet::all();
        return view('verPets', compact('dados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formCadastro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request->all(), [
            'foto' => [
                'required', 'file', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        if ($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }
        $path = $request->file('foto')->store('images', 'public');
        $dados = new PetLar();
        $dados->nome = $request->input('nome');
        $dados->especie = $request->input('especie');
        $dados->raca = $request->input('raca');
        $dados->porte = $request->input('porte');
        $dados->pelagem = $request->input('pelagem');
        $dados->idade = $request->input('idade');
        $dados->descricao = $request->input('descricao');
        $dados->cor = $request->input('cor');
        $dados->sexo = $request->input('sexo');
        $dados->castradp = $request->input('castrado');
        $dados->vacinado = $request->input('vacinado');
        $dados->vermifugado = $request->input('vermifugado');
        $dados->quaisvacinas = $request->input('quaisvacinas');
        $dados->foto = $path;
        $dados->save();
        return redirect('/')->with('success', 'Novo animal cadastrado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        //
    }

    public function pesquisarPet(){
        return view('pesquisarPet');
    }

    public function procurarPet(Request $request){
        $nome = $request->input('nome');
        $dados = DB::table('PetLar')->select('id', 'nomeObra', 'artistaObra', 'tipoObra', 'estiloObra', 'imagemObra', 'dataObra')
                 ->where(DB::raw('lower(nome)'), 'like', '%' . strtolower($nome) . '%')->get();
        return view('verPets', compact('dados'));
    }
}