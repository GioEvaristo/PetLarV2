@extends('layout')

@section('content')
<div class="container-fluid py-5 px-4" style="max-width:1400px;margin:0 auto;">
  <div class="animal-card-full" style="display:flex;flex-direction:column;gap:2rem;">

    <div style="background:#8843c7;border-radius:30px;padding:32px;display:flex;gap:32px;align-items:flex-start;">
        
      <div style="flex:0 0 360px;">
                <h1 class="nome" style="font-family:'DynaPuff',sans-serif;font-size:3rem;margin-bottom:1rem;">{{ $pet->nome }}</h1>

        @if($pet->foto)
          <img src="{{ asset('storage/' . $pet->foto) }}" alt="{{ $pet->nome }}" style="width:100%;height:auto;object-fit:cover;border-radius:20px;">
        @else
          <img src="{{ asset('storage/images/placeholder.png') }}" alt="Sem foto" style="width:100%;height:auto;object-fit:cover;border-radius:20px;">
        @endif
      </div>

      <div style="flex:1;color:#fff;">
        <div style="font-size:1.4rem;line-height:1.8;">
          <p style="margin-bottom:1rem;">
            {{ $pet->descricao ?? 'Sem descrição disponível.' }}
          </p>
        </div>
      </div>
    </div>

    <!-- Seção de Informações Detalhadas -->
    <div style="background:linear-gradient(135deg, #77ab59 0%, #8bc56a 100%);color:#fff;border-radius:30px;padding:40px;box-shadow:0 10px 30px rgba(119,171,89,0.3);">
      
      <h2 style="font-size:2rem;font-weight:700;margin-bottom:2rem;text-align:center;text-shadow:1px 1px 4px rgba(0,0,0,0.2);">
        Informações Completas
      </h2>

      <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(280px, 1fr));gap:32px;font-size:1.2rem;">
        
        <!-- Card 1 -->
        <div style="background:rgba(255,255,255,0.15);padding:24px;border-radius:20px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.2);">
          <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:16px;border-bottom:2px solid rgba(255,255,255,0.3);padding-bottom:8px;">
            Identificação
          </h3>
          <p style="margin:8px 0;"><strong>Nome:</strong> {{ $pet->nome }}</p>
          <p style="margin:8px 0;"><strong>Espécie:</strong> {{ ucfirst($pet->especie) }}</p>
          <p style="margin:8px 0;"><strong>Raça:</strong> {{ $pet->raca ?: 'SRD (Sem Raça Definida)' }}</p>
        </div>

        <!-- Card 2 -->
        <div style="background:rgba(255,255,255,0.15);padding:24px;border-radius:20px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.2);">
          <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:16px;border-bottom:2px solid rgba(255,255,255,0.3);padding-bottom:8px;">
            Características
          </h3>
          <p style="margin:8px 0;"><strong>Porte:</strong> {{ ucfirst($pet->porte) }}</p>
          <p style="margin:8px 0;"><strong>Pelagem:</strong> {{ ucfirst($pet->pelagem) }}</p>
          <p style="margin:8px 0;"><strong>Cor:</strong> {{ ucfirst($pet->cor) }}</p>
        </div>

        <!-- Card 3 -->
        <div style="background:rgba(255,255,255,0.15);padding:24px;border-radius:20px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.2);">
          <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:16px;border-bottom:2px solid rgba(255,255,255,0.3);padding-bottom:8px;">
            Idade e Sexo
          </h3>
          <p style="margin:8px 0;"><strong>Idade:</strong> {{ $pet->idade ? $pet->idade . ' meses' : 'Não informada' }}</p>
          <p style="margin:8px 0;"><strong>Sexo:</strong> {{ ucfirst($pet->sexo) }}</p>
        </div>

        <!-- Card 4 -->
        <div style="background:rgba(255,255,255,0.15);padding:24px;border-radius:20px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.2);">
          <h3 style="font-size:1.4rem;font-weight:700;margin-bottom:16px;border-bottom:2px solid rgba(255,255,255,0.3);padding-bottom:8px;">
            Saúde
          </h3>
          <p style="margin:8px 0;">
            <strong>Castrado:</strong> 
            <span style="display:inline-block;background:{{ $pet->castrado == 'sim' ? 'rgba(76,175,80,0.5)' : 'rgba(244,67,54,0.5)' }};padding:2px 12px;border-radius:12px;margin-left:8px;">
              {{ ucfirst($pet->castrado) }}
            </span>
          </p>
          <p style="margin:8px 0;">
            <strong>Vacinado:</strong> 
            <span style="display:inline-block;background:{{ $pet->vacinado == 'sim' ? 'rgba(76,175,80,0.5)' : 'rgba(244,67,54,0.5)' }};padding:2px 12px;border-radius:12px;margin-left:8px;">
              {{ ucfirst($pet->vacinado) }}
            </span>
          </p>
          <p style="margin:8px 0;">
            <strong>Vermifugado:</strong> 
            <span style="display:inline-block;background:{{ $pet->vermifugado == 'sim' ? 'rgba(76,175,80,0.5)' : 'rgba(244,67,54,0.5)' }};padding:2px 12px;border-radius:12px;margin-left:8px;">
              {{ ucfirst($pet->vermifugado) }}
            </span>
          </p>
        </div>

      </div>

      <!-- Seção de Vacinas em Destaque -->
      @if($pet->vacinado == 'sim' && $pet->quaisvacinas)
      <div style="margin-top:32px;background:rgba(255,255,255,0.2);padding:24px;border-radius:20px;backdrop-filter:blur(10px);border:2px solid rgba(255,255,255,0.3);">
        <h3 style="font-size:1.5rem;font-weight:700;margin-bottom:12px;display:flex;align-items:center;gap:10px;">
          <span style="font-size:1.8rem;">💉</span> Vacinas Aplicadas
        </h3>
        <p style="font-size:1.3rem;margin:0;line-height:1.6;">
          {{ $pet->quaisvacinas }}
        </p>
      </div>
      @endif

    </div>

    <div style="display:flex;gap:16px;justify-content:flex-end;align-items:center;">
      <a href="{{ route('removerPet', $pet->id) }}" class="btn" style="background:#ff2c2c;color:#fff;padding:14px;border-radius:10px;text-decoration:none;font-weight:800;font-size:1.2rem;">DELETAR</a>

      <a href="{{ route('editarPet', $pet->id) }}" class="btn" style="background:#5353ec;color:#fff;padding:14px;border-radius:10px;text-decoration:none;font-weight:800;font-size:1.2rem;">EDITAR</a>
      <a href="{{ route('index') }}" class="btn-voltar" style="background:#1e5f27;color:#fff;padding:14px;border-radius:10px;text-decoration:none;font-weight:800;font-size:1.2rem;">VOLTAR</a>
      <a href="{{ route('interesse.create', $pet->id) }}" class="btn-adotar" style="background:#b968ff;color:#fff;padding:15px;border-radius:10px;text-decoration:none;font-weight:900;font-size:1.2rem;">QUERO ADOTAR!</a>
    </div>

  </div>
</div>
@endsection
