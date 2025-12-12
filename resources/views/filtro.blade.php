@extends('layout')

@section('content')
        
    <div class="container">
        <section class="hero-form">
        <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato" class='banner'>
        <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente-form" alt="Selo Meio Ambiente">
    </section>
        <div class="filtro-container">
            <h2>Filtrar Pets para Adoção</h2>
            <form action="{{ route('filtroPets') }}" method="GET" class="row g-3">
                <div class="col-md-3">
                    <label>Espécie</label>
                    <select name="especie" class="form-select">
                        <option value="">Todas</option>
                        <option value="Canina">Canina</option>
                        <option value="Felina">Felina</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Porte</label>
                    <select name="porte" class="form-select">
                        <option value="">Todos</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Médio">Médio</option>
                        <option value="Grande">Grande</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Pelagem</label>
                    <select name="pelagem" class="form-select">
                        <option value="">Todas</option>
                        <option value="Curta">Curta</option>
                        <option value="Média">Média</option>
                        <option value="Longa">Longa</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Sexo</label>
                    <select name="sexo" class="form-select">
                        <option value="">Todos</option>
                        <option value="Macho">Macho</option>
                        <option value="Fêmea">Fêmea</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Castrado</label>
                    <select name="castrado" class="form-select">
                        <option value="">Todos</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Vacinado</label>
                    <select name="vacinado" class="form-select">
                        <option value="">Todos</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label>Vermifugado</label>
                    <select name="vermifugado" class="form-select">
                        <option value="">Todos</option>
                        <option value="Sim">Sim</option>
                        <option value="Não">Não</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Cor</label><br>
                    @foreach(['Preto', 'Branco', 'Caramelo', 'Bicolor', 'Cinza', 'Escaminha', 'Frajola', 'Laranja', 'Marrom', 'Tigrado', 'Tricolor', 'Outra'] as $cor)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="cor[]" value="{{ $cor }}">
                            <label class="form-check-label">{{ $cor }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="col-md-6">
                    <label>Idade</label>
                    <div class="d-flex">
                        <input type="number" name="idade_min" class="form-control me-2" placeholder="Mín">
                        <input type="number" name="idade_max" class="form-control" placeholder="Máx">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-aplicar">APLICAR</button>
                    </div>
                </div>


            </form>
        </div>

        <div class="card-grid py-5">
            <div class="container">
                <div class="row">
                    @forelse($pets as $pet)
                    <div class="col-md-3">
                        <div class="animal-card mb-4">
                            <div class="card-header">
                                <h3 class="nome">{{ $pet->nome }}</h3>
                                <span class="status {{ strtolower($pet['status']) }}">{{ strtoupper($pet['status']) }}</span>
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
                    </div>
                    @empty
                        <p>Infelizmente não há pets com as características pesquisadas.</p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
@endsection