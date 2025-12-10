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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
        }

        Pet::create($data);

        return redirect()->route('index');
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

    

    public function filtro(Request $request)
{
    $query = Pet::query();

    if ($request->filled('especie')) {
        $query->where('especie', $request->especie);
    }

    if ($request->filled('porte')) {
        $query->where('porte', $request->porte);
    }

    if ($request->filled('pelagem')) {
        $query->where('pelagem', $request->pelagem);
    }

    if ($request->filled('sexo')) {
        $query->where('sexo', $request->sexo);
    }

    if ($request->filled('castrado')) {
        $query->where('castrado', $request->castrado);
    }

    if ($request->filled('vacinado')) {
        $query->where('vacinado', $request->vacinado);
    }

    if ($request->filled('vermifugado')) {
        $query->where('vermifugado', $request->vermifugado);
    }

    if ($request->filled('cor')) {
        $query->whereIn('cor', $request->cor);
    }

    if ($request->filled('idade_min') && $request->filled('idade_max')) {
        $query->whereBetween('idade', [$request->idade_min, $request->idade_max]);
    }

    $pets = $query->get();

    return view('filtro', compact('pets'));
}

}
