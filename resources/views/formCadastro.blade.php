@extends('layout')

@section('content')
<div class="container my-5">
    <section class="hero-form">
        <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato" class='banner'>
        <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente-form" alt="Selo Meio Ambiente">
    </section>

    <form class="form" action="{{ route('adotar') }}" method="POST" enctype="multipart/form-data">
        <h2 class="titulo-form">Formulário de Cadastro do Animal</h2>
        @csrf

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="especie" class="form-label">Espécie</label>
                <select name="especie" id="especie" class="form-select" required>
                    <option value="canina">Canina</option>
                    <option value="felina">Felina</option>
                    <option value="outro">Outro</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" id="raca" name="raca" class="form-control" placeholder="Ex: Labrador, SRD...">
            </div>

            <div class="mb-3 col-md-4">
                <label for="porte" class="form-label">Porte</label>
                <select name="porte" id="porte" class="form-select" required>
                    <option value="pequeno">Pequeno</option>
                    <option value="medio">Médio</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="pelagem" class="form-label">Pelagem</label>
                <select name="pelagem" id="pelagem" class="form-select" required>
                    <option value="curta">Curta</option>
                    <option value="media">Média</option>
                    <option value="longa">Longa</option>
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="idade" class="form-label">Idade</label>
                <div class="input-group">
                    <input type="number" id="idade" name="idade" class="form-control" min="0" placeholder="Ex: 6">
                    <select name="idade_unidade" id="idade_unidade" class="form-select" style="max-width: 120px;">
                        <option value="meses" selected>Meses</option>
                        <option value="anos">Anos</option>
                    </select>
                </div>
                <small class="form-text text-muted">Selecione se a idade é em meses ou anos</small>
            </div>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto do Animal</label>
            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status do Animal</label>
            <select name="status" id="status" class="form-select">
                <option value="disponivel" selected>Disponível</option>
                <option value="em_tratamento">Em Tratamento</option>
                <option value="adotado">Adotado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Conte um pouco sobre a personalidade e história do animal..."></textarea>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Cor</label>
            <select name="cor" id="cor" class="form-select" required>
                <option value="bicolor">Bicolor</option>
                <option value="branco">Branco</option>
                <option value="caramelo">Caramelo</option>
                <option value="cinza">Cinza</option>
                <option value="escaminha">Escaminha</option>
                <option value="frajola">Frajola</option>
                <option value="laranja">Laranja</option>
                <option value="marrom">Marrom</option>
                <option value="preto">Preto</option>
                <option value="tigrado">Tigrado</option>
                <option value="tricolor">Tricolor</option>
                <option value="outros">Outros</option>
            </select>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="macho">Macho</option>
                    <option value="femea">Fêmea</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="castrado" class="form-label">Castrado</label>
                <select name="castrado" id="castrado" class="form-select" required>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="vermifugado" class="form-label">Vermifugado nos últimos 3 meses?</label>
                <select name="vermifugado" id="vermifugado" class="form-select" required>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="vacinado" class="form-label">Vacinado</label>
                <select name="vacinado" id="vacinado" class="form-select" required>
                    <option value="sim">Sim</option>
                    <option value="nao">Não</option>
                </select>
            </div>

            <div class="mb-3 col-md-8">
                <label for="quaisVacinas" class="form-label">Quais vacinas?</label>
                <input type="text" id="quaisVacinas" name="quaisVacinas" class="form-control" placeholder="Ex: V10, Antirrábica, Giardia...">
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn">Enviar</button>
        </div>
    </form>
</div>
@endsection