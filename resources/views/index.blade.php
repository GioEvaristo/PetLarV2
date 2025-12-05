<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetLar</title>
    @vite(['resources/js/app.js'])
</head>

<body>

    @extends('layout')
    @section('content')
        <section class="hero">
            <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato"
                class='banner'>
            <div class="slogan">
                <p class="slogan-text">
                    Adotar é um ato de amor.
                </p>
            </div>
            <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente" alt="Selo Meio Ambiente">
        </section>

        <section class="localizacao">
            <div class="loc-text">
                <h2>Canil Municipal de Varginha</h2>
                <p>Avenida dos Imigrantes, nº 3758, bairro da Vargem, Varginha, Minas Gerais</p>
            </div>
        </section>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card-grid">
            @forelse($pets as $pet)
                <div class="animal-card">
                    <div class="card-header">
                        <h3 class="nome">{{ $pet->nome }}</h3>
                        <span class="status {{ strtolower($pet->status ?? 'disponível') }}">
                            {{ strtoupper($pet->status ?? 'DISPONÍVEL') }}
                        </span>
                    </div>
                    <div class="imgDesc">
                        <div class="img-animal">
                            @if($pet->foto)
                                <img src="{{ asset('storage/' . $pet->foto) }}" alt="{{ $pet->nome }}">
                            @else
                                <img src="{{ asset('storage/images/placeholder.png') }}" alt="Animal sem foto">
                            @endif
                        </div>
                        <div class="descricao">
                            <p>Raça: {{ $pet->raca ?? 'SRD' }}</p>
                            <p>Idade: {{ $pet->idade ? $pet->idade . ' meses' : 'Não informada' }}</p>
                            <p>Porte: {{ ucfirst($pet->porte) }}</p>
                            <p>Sexo: {{ ucfirst($pet->sexo) }}</p>
                            <a href="{{ route('verPets', $pet->id) }}" class="btn-vermais">VER MAIS</a>
                        </div>
                    </div>
                </div>
            @empty
                <p>Nenhum pet cadastrado ainda.</p>
            @endforelse
        </div>

    @endsection

</body>

</html>