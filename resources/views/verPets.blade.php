<!DOCTYPE html>
<html lang="pt-br">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Perfil Animal Petlar</title>
   @vite(['resources/js/app.js'])
</head>

<body>
   @extends('layout')
   @section('content')
   
       <section class="animais">
           @php
               $animais = [
                   ['nome' => 'Nildo', 'cor' => 'Caramelo', 'pelo' => 'Curto', 'castrado' => 'Sim', 'vermifugado' => 'Sim', 'vacinas' => 'olivalente (V8 ou V10), antirrábica ', 'descricao' => 'Faxinildo, um dos cachorros mais amados de Varginha, carinhosamente apelidado como “Nildo” (ou ainda, “Nirdo”), é um dos três caezinhos do Campus Varginha do CEFET-MG. Ele gosta muito de denguinho e é bem calmo (a não ser que se assuste ou sua missão de guardião do CEFET o chame). 
  Seu hobbie preferido é caminhar pelo CEFET acompanhando seus amigos Preta e Amarelo por diversas aventuras, como caça a ratos e exploração de cantinhos novos do Campus; mas, por vezes, gosta de aproveitar um tempo sozinho, relaxando enquanto pega seu bronzeado diário, não achou mesmo que essa cor caramelo perfeita se mantém sozinha, né? 
Ele também gosta muito dos funcionários, em especial seu papai humano, um funcionário que sempre o dá muito amor e carinho!', 'especie' => 'Canina', 'img' => 'nirdo.jpg', 'raca' => 'SRD', 'idade' => '6 anos', 'porte' => 'Médio', 'sexo' => 'Macho', ]
               ];
           @endphp
           
           <div class="card-grid">
            
               @foreach ($animais as $animal)
                   <div class="row animal-perf">
                       <div class="col-md-6">
                           <img src="{{ asset('storage/images/' . $animal['img']) }}" alt="{{ $animal['nome'] }}">
                           <p class="nome">{{ $animal['nome'] }}</p>
                       </div>
                       <div class="col-md-6">
                            <p>{{ $animal['descricao'] }}</p>
                             <a href="/petlar/interesse" class="btn-vermais">REGISTRAR INTERESSE</a>
                       </div>        
                   </div>
               @endforeach
           </div>
       </section>
       <div class="card-grid">
           @foreach ($animais as $animal)
               <div class="row animal-perf-desc">
                    <div class="col-md-3">
                        <p><b>Nome: </b>{{ $animal['nome'] }}</p>
                        <p><b>Espécie: </b>{{ $animal['especie'] }}</p>
                        <p><b>Porte: </b>{{ $animal['porte'] }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Idade: </b>{{ $animal['idade'] }}</p>
                        <p><b>Cor: </b>{{ $animal['cor'] }}</p>
                        <p><b>Pelagem: </b>{{ $animal['pelo'] }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Sexo: </b>{{ $animal['sexo'] }}</p>
                        <p><b>Castrado: </b>{{ $animal['castrado'] }}</p>
                        <p><b>Raca: </b>{{ $animal['raca'] }}</p>
                    </div>
                    <div class="col-md-3">
                        <p><b>Vermifugado: </b> {{ $animal['vermifugado'] }}</p>
                        <p><b>Vacinas: </b>{{ $animal['vacinas'] }}</p>
                    </div>
                   
               </div>
           @endforeach
       </div>
   @endsection


</body>


</html>
