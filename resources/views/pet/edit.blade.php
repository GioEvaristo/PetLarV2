@extends('layout')

@section('content')
<div class="container my-5">
    <h2 class="titulo-form">Editar Pet</h2>

    <form action="{{ route('editarPet', $pet->id) }}" method="POST" enctype="multipart/form-data" class="form p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{ $pet->nome }}" required>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="especie" class="form-label">Espécie</label>
                <select name="especie" id="especie" class="form-select" required>
                    <option value="canina" {{ $pet->especie == 'canina' ? 'selected' : '' }}>Canina</option>
                    <option value="felina" {{ $pet->especie == 'felina' ? 'selected' : '' }}>Felina</option>
                    <option value="outro" {{ $pet->especie == 'outro' ? 'selected' : '' }}>Outro</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="raca" class="form-label">Raça</label>
                <input type="text" id="raca" name="raca" class="form-control" value="{{ $pet->raca }}" placeholder="Ex: Labrador, SRD...">
            </div>

            <div class="mb-3 col-md-4">
                <label for="porte" class="form-label">Porte</label>
                <select name="porte" id="porte" class="form-select" required>
                    <option value="pequeno" {{ $pet->porte == 'pequeno' ? 'selected' : '' }}>Pequeno</option>
                    <option value="medio" {{ $pet->porte == 'medio' ? 'selected' : '' }}>Médio</option>
                    <option value="grande" {{ $pet->porte == 'grande' ? 'selected' : '' }}>Grande</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="pelagem" class="form-label">Pelagem</label>
                <select name="pelagem" id="pelagem" class="form-select" required>
                    <option value="curta" {{ $pet->pelagem == 'curta' ? 'selected' : '' }}>Curta</option>
                    <option value="media" {{ $pet->pelagem == 'media' ? 'selected' : '' }}>Média</option>
                    <option value="longa" {{ $pet->pelagem == 'longa' ? 'selected' : '' }}>Longa</option>
                </select>
            </div>

            <div class="mb-3 col-md-6">
                <label for="idade" class="form-label">Idade</label>
                <div class="input-group">
                    <input type="number" id="idade" name="idade" class="form-control" min="0" value="{{ $pet->idade }}" placeholder="Ex: 6">
                    <select name="idade_unidade" id="idade_unidade" class="form-select" style="max-width: 120px;">
                        <option value="meses" {{ ($pet->idade_unidade ?? 'meses') == 'meses' ? 'selected' : '' }}>Meses</option>
                        <option value="anos" {{ ($pet->idade_unidade ?? '') == 'anos' ? 'selected' : '' }}>Anos</option>
                    </select>
                </div>
                <small class="form-text text-muted">
                    @if($pet->idade)
                        Idade atual: <strong>{{ $pet->idade_formatada }}</strong>
                    @else
                        Selecione se a idade é em meses ou anos
                    @endif
                </small>
            </div>
        </div>

        <div class="mb-3">
            <label for="foto" class="form-label">Foto do Animal</label>
            @if($pet->foto)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $pet->foto) }}" alt="{{ $pet->nome }}" style="max-width: 200px; border-radius: 10px;">
                    <p class="text-muted small">Foto atual (deixe em branco para manter)</p>
                </div>
            @endif
            <input type="file" id="foto" name="foto" class="form-control" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-control" rows="3" placeholder="Conte um pouco sobre a personalidade e história do animal...">{{ $pet->descricao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="cor" class="form-label">Cor</label>
            <select name="cor" id="cor" class="form-select" required>
                <option value="bicolor" {{ $pet->cor == 'bicolor' ? 'selected' : '' }}>Bicolor</option>
                <option value="branco" {{ $pet->cor == 'branco' ? 'selected' : '' }}>Branco</option>
                <option value="caramelo" {{ $pet->cor == 'caramelo' ? 'selected' : '' }}>Caramelo</option>
                <option value="cinza" {{ $pet->cor == 'cinza' ? 'selected' : '' }}>Cinza</option>
                <option value="escaminha" {{ $pet->cor == 'escaminha' ? 'selected' : '' }}>Escaminha</option>
                <option value="frajola" {{ $pet->cor == 'frajola' ? 'selected' : '' }}>Frajola</option>
                <option value="laranja" {{ $pet->cor == 'laranja' ? 'selected' : '' }}>Laranja</option>
                <option value="marrom" {{ $pet->cor == 'marrom' ? 'selected' : '' }}>Marrom</option>
                <option value="preto" {{ $pet->cor == 'preto' ? 'selected' : '' }}>Preto</option>
                <option value="tigrado" {{ $pet->cor == 'tigrado' ? 'selected' : '' }}>Tigrado</option>
                <option value="tricolor" {{ $pet->cor == 'tricolor' ? 'selected' : '' }}>Tricolor</option>
                <option value="outros" {{ $pet->cor == 'outros' ? 'selected' : '' }}>Outros</option>
            </select>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="sexo" class="form-label">Sexo</label>
                <select name="sexo" id="sexo" class="form-select" required>
                    <option value="macho" {{ $pet->sexo == 'macho' ? 'selected' : '' }}>Macho</option>
                    <option value="femea" {{ $pet->sexo == 'femea' ? 'selected' : '' }}>Fêmea</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="castrado" class="form-label">Castrado</label>
                <select name="castrado" id="castrado" class="form-select" required>
                    <option value="sim" {{ $pet->castrado == 'sim' ? 'selected' : '' }}>Sim</option>
                    <option value="nao" {{ $pet->castrado == 'nao' ? 'selected' : '' }}>Não</option>
                </select>
            </div>

            <div class="mb-3 col-md-4">
                <label for="vermifugado" class="form-label">Vermifugado nos últimos 3 meses?</label>
                <select name="vermifugado" id="vermifugado" class="form-select" required>
                    <option value="sim" {{ $pet->vermifugado == 'sim' ? 'selected' : '' }}>Sim</option>
                    <option value="nao" {{ $pet->vermifugado == 'nao' ? 'selected' : '' }}>Não</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col-md-4">
                <label for="vacinado" class="form-label">Vacinado</label>
                <select name="vacinado" id="vacinado" class="form-select" required>
                    <option value="sim" {{ $pet->vacinado == 'sim' ? 'selected' : '' }}>Sim</option>
                    <option value="nao" {{ $pet->vacinado == 'nao' ? 'selected' : '' }}>Não</option>
                </select>
            </div>

            <div class="mb-3 col-md-8">
                <label for="quaisVacinas" class="form-label">Quais vacinas?</label>
                <input type="text" id="quaisVacinas" name="quaisVacinas" class="form-control" value="{{ $pet->quaisVacinas }}" placeholder="Ex: V10, Antirrábica, Giardia...">
            </div>
        </div>

        <div class="mb-4">
            <label for="status" class="form-label">Status do Animal</label>
            <select name="status" id="status" class="form-select" required>
                <option value="disponivel" {{ ($pet->status ?? 'disponivel') == 'disponivel' ? 'selected' : '' }}>Disponível</option>
                <option value="em_tratamento" {{ ($pet->status ?? '') == 'em_tratamento' ? 'selected' : '' }}>Em Tratamento</option>
                <option value="adotado" {{ ($pet->status ?? '') == 'adotado' ? 'selected' : '' }}>Adotado</option>
            </select>
        </div>
        <div class="text-end">
            <button type="submit" class="btn">Salvar Alterações</button>
        </div>
    </form>
</div>

<script>
// Script para mostrar/ocultar o campo de vacinas
document.addEventListener('DOMContentLoaded', function() {
    const vacinadoSelect = document.getElementById('vacinado');
    const quaisvacinasInput = document.getElementById('quaisvacinas');
    const quaisvacinasDiv = quaisvacinasInput.parentElement;
    
    function updateVacinasField() {
        if (vacinadoSelect.value === 'nao') {
            quaisvacinasInput.value = '';
            quaisvacinasInput.disabled = true;
            quaisvacinasDiv.style.opacity = '0.6';
        } else {
            quaisvacinasInput.disabled = false;
            quaisvacinasDiv.style.opacity = '1';
        }
    }
    
    // Atualiza ao carregar
    updateVacinasField();
    
    // Atualiza ao mudar
    vacinadoSelect.addEventListener('change', updateVacinasField);
});
</script>
@endsection