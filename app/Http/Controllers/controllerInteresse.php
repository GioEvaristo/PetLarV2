<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interesse;
use App\Models\Pet;

class controllerInteresse extends Controller
{
    // Mostrar formulário de interesse
    public function create($petId)
    {
        $pet = Pet::findOrFail($petId);
        return view('interesse.create', compact('pet'));
    }

    // Salvar interesse
    public function store(Request $request)
    {
        $data = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:500',
            'motivacao' => 'required|string',
            'infoadicional' => 'nullable|string',
        ]);

        Interesse::create($data);

        return redirect()
            ->route('verPets', $request->pet_id)
            ->with('success', 'Interesse registrado com sucesso! Entraremos em contato em breve.');
    }

    // Listar todos os interesses (para admin)
    public function index()
    {
        $interesses = Interesse::with('pet')
            ->latest()
            ->get();
        
        return view('interesse.index', compact('interesses'));
    }

    // Ver detalhes de um interesse específico
    public function show($id)
    {
        $interesse = Interesse::with('pet')->findOrFail($id);
        return view('interesse.show', compact('interesse'));
    }

    // Atualizar status do interesse
    public function updateStatus(Request $request, $id)
    {
        $interesse = Interesse::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pendente,aprovado,rejeitado',
        ]);

        $interesse->update(['status' => $request->status]);

        return redirect()
            ->route('interesse.index')
            ->with('success', 'Status atualizado com sucesso!');
    }

    // Deletar interesse
    public function destroy($id)
    {
        $interesse = Interesse::findOrFail($id);
        $interesse->delete();

        return redirect()
            ->route('interesse.index')
            ->with('success', 'Interesse removido com sucesso!');
    }
}