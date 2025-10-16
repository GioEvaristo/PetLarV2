<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Validator;

class controllerPetlar extends Controller
{
    public function index()
    {
        $pets = Pet::latest()->get();
        return view('index', compact('pets'));
    }

    public function create()
    {
        return view('formCadastro');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'raca' => 'nullable|string',
            'porte' => 'required|string',
            'pelagem' => 'required|string',
            'idade' => 'nullable|integer',
            'cor' => 'required|string',
            'sexo' => 'required|string',
            'castrado' => 'required|string',
            'vacinado' => 'required|string',
            'quaisvacinas' => 'nullable|string',
            'vermifugado' => 'required|string',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
        }

        Pet::create($data);

        return redirect()->route('index')->with('success', 'Pet cadastrado com sucesso!');
    }

    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pet.show', compact('pet'));
    }

    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pet.edit', compact('pet'));
    }

    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->all());
        return redirect()->route('index')->with('success', 'Pet atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('index')->with('success', 'Pet removido com sucesso!');
    }

    public function pesquisarPet()
    {
        return view('pesquisarPet');
    }

    public function procurarPet(Request $request)
    {
        $nome = $request->input('nome');
        $pets = Pet::where('nome', 'like', '%' . $nome . '%')->get();
        return view('verPets', compact('pets'));
    }
}
