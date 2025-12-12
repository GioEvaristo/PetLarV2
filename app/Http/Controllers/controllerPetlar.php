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
            'idade' => 'nullable|integer|min:0',
            'idade_unidade' => 'nullable|string|in:meses,anos',
            'cor' => 'required|string',
            'sexo' => 'required|string',
            'castrado' => 'required|string',
            'vacinado' => 'required|string',
            'quaisVacinas' => 'nullable|string',
            'vermifugado' => 'required|string',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|string|in:disponivel,adotado,em_tratamento',
        ]);

        // Define valor padrão para idade_unidade se idade foi informada
        if ($request->filled('idade') && !$request->filled('idade_unidade')) {
            $data['idade_unidade'] = 'meses';
        }

        // Limpa quaisvacinas se estiver vazio
        if (empty($data['quaisVacinas'])) {
            $data['quaisVacinas'] = null;
        }

        // Upload da foto
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
        
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'especie' => 'required|string',
            'raca' => 'nullable|string',
            'porte' => 'required|string',
            'pelagem' => 'required|string',
            'idade' => 'nullable|integer|min:0',
            'idade_unidade' => 'nullable|string|in:meses,anos',
            'cor' => 'required|string',
            'sexo' => 'required|string',
            'castrado' => 'required|string',
            'vacinado' => 'required|string',
            'quaisVacinas' => 'nullable|string',
            'vermifugado' => 'required|string',
            'descricao' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable|string|in:disponivel,adotado,em_tratamento',
        ]);

        // Define valor padrão para idade_unidade se idade foi informada
        if ($request->filled('idade') && !$request->filled('idade_unidade')) {
            $data['idade_unidade'] = 'meses';
        }

        // Limpa quaisvacinas se estiver vazio
        if (empty($data['quaisVacinas'])) {
            $data['quaisVacinas'] = null;
        }

        // Upload da foto (mantém a antiga se não houver nova)
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pets', 'public');
        }

        $pet->update($data);
        return redirect()->route('index', $pet->id)->with('success', 'Pet atualizado com sucesso!');
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
        return view('pet.show', compact('pets'));
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

        // Filtro de idade melhorado (converte tudo para meses)
        if ($request->filled('idade_min') && $request->filled('idade_max')) {
            $query->where(function($q) use ($request) {
                $idadeMin = $request->idade_min;
                $idadeMax = $request->idade_max;
                
                // Converte para meses e faz a busca
                $q->where(function($sq) use ($idadeMin, $idadeMax) {
                    $sq->where('idade_unidade', 'meses')
                       ->whereBetween('idade', [$idadeMin, $idadeMax]);
                })->orWhere(function($sq) use ($idadeMin, $idadeMax) {
                    $sq->where('idade_unidade', 'anos')
                       ->whereBetween('idade', [ceil($idadeMin / 12), floor($idadeMax / 12)]);
                });
            });
        }

        $pets = $query->get();

        return view('filtro', compact('pets'));
    }
}