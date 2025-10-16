@extends('layout')

@section('content')
<div class="container my-5">
    <h2 class="titulo-form">Editar Pet</h2>

    <form action="{{ route('updatePet', $pet->id) }}" method="POST" enctype="multipart/form-data" class="form p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $pet->nome) }}" class="form-control">
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="especie" class="form-label">Espécie</label>
                <input type="text" id="especie" name="especie" value="{{ old('especie', $pet->especie) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" id="raca" name="raca" value="{{ old('raca', $pet->raca) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="porte" class="form-label">Porte</label>
                <input type="text" id="porte" name="porte" value="{{ old('porte', $pet->porte) }}" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="pelagem" class="form-label">Pelagem</label>
                <input type="text" id="pelagem" name="pelagem" value="{{ old('pelagem', $pet->pelagem) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="idade" class="form-label">Idade</label>
                <input type="number" id="idade" name="idade" value="{{ old('idade', $pet->idade) }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" id="foto" name="foto" class="form-control">
            @if($pet->foto)
                <small>Foto atual: <img src="{{ asset('storage/' . $pet->foto) }}" width="100"></small>
            @endif
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3">{{ old('descricao', $pet->descricao) }}</textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="cor" class="form-label">Cor</label>
                <input type="text" id="cor" name="cor" value="{{ old('cor', $pet->cor) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="sexo" class="form-label">Sexo</label>
                <input type="text" id="sexo" name="sexo" value="{{ old('sexo', $pet->sexo) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-4">
                <label for="castrado" class="form-label">Castrado</label>
                <input type="text" id="castrado" name="castrado" value="{{ old('castrado', $pet->castrado) }}" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="vacinado" class="form-label">Vacinado</label>
                <input type="text" id="vacinado" name="vacinado" value="{{ old('vacinado', $pet->vacinado) }}" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label for="vermifugado" class="form-label">Vermifugado</label>
                <input type="text" id="vermifugado" name="vermifugado" value="{{ old('vermifugado', $pet->vermifugado) }}" class="form-control">
            </div>
        </div>

        <div class="mb-3">
            <label for="quaisvacinas" class="form-label">Quais vacinas?</label>
            <input type="text" id="quaisvacinas" name="quaisvacinas" value="{{ old('quaisvacinas', $pet->quaisvacinas) }}" class="form-control">
        </div>

        <div class="text-end">
            <button type="submit" class="btn">Salvar</button>
        </div>
    </form>
</div>
@endsection
