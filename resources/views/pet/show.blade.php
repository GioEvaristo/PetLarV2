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

    <div style="background:#77ab59;color:#fff;border-radius:30px;padding:28px;display:flex;flex-wrap:wrap;gap:24px;align-items:stretch;font-size:1.3rem;">
      <div style="flex:1 1 260px;min-width:220px;">
        <p><strong>Nome:</strong> {{ $pet->nome }}</p>
        <p><strong>Espécie:</strong> {{ ucfirst($pet->especie ?? 'Canina') }}</p>
        <p><strong>Porte:</strong> {{ ucfirst($pet->porte ?? 'Médio') }}</p>
      </div>

      <div style="flex:1 1 260px;min-width:220px;">
        <p><strong>Idade:</strong> {{ $pet->idade ? $pet->idade . ' meses' : ($pet->idade_texto ?? 'Sênior') }}</p>
        <p><strong>Vacinado:</strong> {{ ucfirst($pet->vacinado ?? 'Sim') }}</p>
        <p><strong>Vacinas:</strong> {{ $pet->quaisvacinas ?? 'Sem Vacinas' }}</p>
      </div>

      <div style="flex:1 1 260px;min-width:220px;">
        <p><strong>Cor:</strong> {{ ucfirst($pet->cor ?? 'Caramelo') }}</p>
        <p><strong>Pelagem:</strong> {{ ucfirst($pet->pelagem ?? $pet->pelo ?? 'Curta') }}</p>
        <p><strong>Sexo:</strong> {{ ucfirst($pet->sexo ?? 'Macho') }}</p>
      </div>

      <div style="flex:1 1 260px;min-width:220px;">
        <p><strong>Castrado:</strong> {{ ucfirst($pet->castrado ?? 'Sim') }}</p>
        <p><strong>Raça:</strong> {{ $pet->raca ?? 'SRD' }}</p>
        <p><strong>Vermifugado:</strong> {{ ucfirst($pet->vermifugado ?? 'Sim') }} <span style="opacity:0.9;font-size:1rem;"></span></p>
      </div>

      <div style="width:100%;font-size:1rem;margin-top:8px;color:rgba(255,255,255,0.9);">
      </div>
    </div>

    <div style="display:flex;gap:16px;justify-content:flex-end;align-items:center;">
      <a href="{{ route('index') }}" class="btn-voltar" style="background:#1e5f27;color:#fff;padding:14px;border-radius:10px;text-decoration:none;font-weight:800;font-size:1.2rem;">VOLTAR</a>

      <a href="{{ route('interesse.create', $pet->id) }}" class="btn-adotar" style="background:#b968ff;color:#fff;padding:15px;border-radius:10px;text-decoration:none;font-weight:900;font-size:1.2rem;">QUERO ADOTAR!</a>
    </div>

  </div>
</div>
@endsection
