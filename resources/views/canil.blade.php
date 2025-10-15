<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Conheça o Canil Petlar</title>
   @vite(['resources/js/app.js'])
</head>

<body>
   @extends('layout')
   @section('content')
       <section class="hero">
           <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato" class='banner'>
           <div class="slogan">
               <p class=" slogan-text">
                   Adotar é um ato de amor.
               </p>   
           </div>
           <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente"
               alt="Selo Meio Ambiente">
       </section>

    <div class="container">
        <h2 class="section-title mt-4 justify-content-center">Seja Bem-Vindo ao Canil.</h2>
        <div class="info-box">Cuidar dos animais é um ato de amor! Aqui no Canil Municipal de Varginha, oferecemos abrigo, cuidados e muito carinho para cães e gatos resgatados, em situação de abandono ou maus-tratos. Nossa missão é promover o bem-estar animal e encontrar lares responsáveis para nossos companheiros de quatro patas.</div>

    <div class="row">
        <div class="col-md-6">
            <h3 class="section-title justify-content-center">Quem Somos?</h3>
                <div class="info-box">O Canil Municipal de Varginha, criado pela Prefeitura e SEMEA, atua na proteção e reabilitação de animais, promovendo a adoção consciente e a educação ambiental. Uma equipe dedicada garante cuidados diários com alimentação, higiene e saúde dos animais.</div>
        </div>
        <div class="col-md-6">
            <h3 class="section-title justify-content-center">Adoção Consciente</h3>
                <div class="info-box"><p>Adotar é um gesto de amor que transforma vidas – a do animal e a sua!</p><p>Todos os nossos cães e gatos disponíveis para adoção estão vacinados, vermifugados e, quando possível, castrados.</p><p>Quer adotar? Clique no menu acima ou venha nos visitar!</p></div>
        </div>
    </div>
    <h2 class="section-title mt-4 justify-content-center">Conheça nossa equipe</h2>
    <div class="row">
        <div class="col-md-3"><img class=equipe src="{{ asset('storage/images/elvis.jpg') }}"></div>
        <div class="col-md-3"><img class=equipe src="{{ asset('storage/images/elvis.jpg') }}"></div>
        <div class="col-md-3"><img class=equipe src="{{ asset('storage/images/elvis.jpg') }}"></div>
        <div class="col-md-3"><img class=equipe src="{{ asset('storage/images/elvis.jpg') }}"></div>
    </div>
   @endsection

</body>
</html>
