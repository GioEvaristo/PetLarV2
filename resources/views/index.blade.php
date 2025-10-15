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
           <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato" class='banner'>
           <div class="slogan">
               <p class="slogan-text">
                   Adotar é um ato de amor.
               </p>   
           </div>
           <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente"
               alt="Selo Meio Ambiente">
       </section>

        <section class="localizacao">
            <div class="loc-text">
                <h2>Canil Municipal de Varginha</h2>
                <p>Avenida dos Imigrantes, nº 3758, bairro da Vargem, Varginha, Minas Gerais</p>
            </div>
        </section>

        <section class="animais">
            @php
                $animais = [
                    ['nome' => 'Nildo', 'status' => 'tratamento', 'raca' => 'SRD', 'idade' => '6 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'nirdo.jpg'],
                    ['nome' => 'Preta', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '8 anos', 'porte' => 'Grande', 'sexo' => 'Fêmea', 'img' => 'preta.png'],
                    ['nome' => 'Amarelo', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '3 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'amarelo.jpg'],
                    ['nome' => 'Luna', 'status' => 'adotado', 'raca' => 'SRD', 'idade' => '10 meses', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'luna.png'],
                    ['nome' => 'Juia', 'status' => 'disponível', 'raca' => 'Chiuaua', 'idade' => '17 anos', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'chiuaua.png'],
                    ['nome' => 'Nildo', 'status' => 'tratamento', 'raca' => 'SRD', 'idade' => '6 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'nirdo.jpg'],
                    ['nome' => 'Preta', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '8 anos', 'porte' => 'Grande', 'sexo' => 'Fêmea', 'img' => 'preta.png'],
                    ['nome' => 'Amarelo', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '3 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'amarelo.jpg'],
                    ['nome' => 'Luna', 'status' => 'adotado', 'raca' => 'SRD', 'idade' => '10 meses', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'luna.png'],
                    ['nome' => 'Juia', 'status' => 'disponível', 'raca' => 'Chiuaua', 'idade' => '17 anos', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'chiuaua.png'],
                    ['nome' => 'Nildo', 'status' => 'tratamento', 'raca' => 'SRD', 'idade' => '6 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'nirdo.jpg'],
                    ['nome' => 'Preta', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '8 anos', 'porte' => 'Grande', 'sexo' => 'Fêmea', 'img' => 'preta.png'],
                    ['nome' => 'Amarelo', 'status' => 'disponível', 'raca' => 'SRD', 'idade' => '3 anos', 'porte' => 'Médio', 'sexo' => 'Macho', 'img' => 'amarelo.jpg'],
                    ['nome' => 'Luna', 'status' => 'adotado', 'raca' => 'SRD', 'idade' => '10 meses', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'luna.png'],
                    ['nome' => 'Juia', 'status' => 'disponível', 'raca' => 'Chiuaua', 'idade' => '17 anos', 'porte' => 'Pequeno', 'sexo' => 'Fêmea', 'img' => 'chiuaua.png'],
                ];
            @endphp

            <div class="card-grid col-md-10" style="margin-left: 10rem;">
                @foreach ($animais as $animal)
                    <div class="animal-card">
                        <div class="card-header">
                            <h3 class="nome">{{ $animal['nome'] }}</h3>
                            <span class="status {{ strtolower($animal['status']) }}">{{ strtoupper($animal['status']) }}</span>
                        </div>
                        <img src="{{ asset('storage/images/' . $animal['img']) }}" alt="{{ $animal['nome'] }}">
                        <p>Raça: {{ $animal['raca'] }}</p>
                        <p>Idade: {{ $animal['idade'] }}</p>
                        <p>Porte: {{ $animal['porte'] }}</p>
                        <p>Sexo: {{ $animal['sexo'] }}</p>
                        <a href="/petlar/mais" class="btn-vermais">VER MAIS</a>
                    </div>
                @endforeach
            </div>
        </section>
    @endsection

</body>

</html>