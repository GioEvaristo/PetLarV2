<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Interesse;

class controllerInteresse extends Controller
{
    // Exibe o formulário de interesse com base no ID do pet
    public function create($id)
    {
        $pet = Pet::findOrFail($id);
        return view('formInteresse', compact('pet'));
    }

    // Armazena o interesse no banco
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'telefone' => 'required|string|max:20',
            'endereco' => 'required|string|max:255',
            'motivacao' => 'required|string|max:500',
            'infoadicional' => 'nullable|string|max:500',
        ]);

        Interesse::create([
            'pet_id' => $request->pet_id,
            'telefone' => $request->telefone,
            'endereco' => $request->endereco,
            'motivacao' => $request->motivacao,
            'infoadicional' => $request->infoadicional,
        ]);

        return redirect()->route('index');
    }
}
