@extends('layout')

@section('content')
<div class="container my-5">
    <div class="animal-perf">
        <h2 class="nome">{{ $pet->nome }}</h2>

        {{-- Foto --}}
        @if($pet->foto)
            <img src="{{ asset('storage/' . $pet->foto) }}" alt="{{ $pet->nome }}">
        @else
            <img src="{{ asset('storage/images/placeholder.png') }}" alt="Sem foto">
        @endif

        {{-- Informações principais --}}
        <p><strong>Espécie:</strong> {{ ucfirst($pet->especie) }}</p>
        <p><strong>Raça:</strong> {{ $pet->raca ?? 'SRD' }}</p>
        <p><strong>Idade:</strong> {{ $pet->idade ? $pet->idade . ' anos' : 'Não informada' }}</p>
        <p><strong>Porte:</strong> {{ ucfirst($pet->porte) }}</p>
        <p><strong>Sexo:</strong> {{ ucfirst($pet->sexo) }}</p>
        <p><strong>Cor:</strong> {{ ucfirst($pet->cor) }}</p>
        <p><strong>Castrado:</strong> {{ ucfirst($pet->castrado) }}</p>
        <p><strong>Vacinado:</strong> {{ ucfirst($pet->vacinado) }}</p>
        <p><strong>Vermifugado:</strong> {{ ucfirst($pet->vermifugado) }}</p>
        @if($pet->quaisvacinas)
            <p><strong>Vacinas:</strong> {{ $pet->quaisvacinas }}</p>
        @endif
    </div>

    {{-- Descrição --}}
    <div class="animal-perf-desc">
        <h3>Descrição</h3>
        <p>{{ $pet->descricao ?? 'Sem descrição disponível.' }}</p>
    </div>

    <a href="{{ route('index') }}" class="btn-vermais">Voltar</a>
</div>
@endsection
