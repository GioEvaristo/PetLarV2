@extends('layout')

@section('content')
<div class="container-fluid py-5 px-4" style="max-width:1600px;margin:0 auto;">
    
    <div style="background:linear-gradient(135deg, #8843c7 0%, #a05ce0 100%);border-radius:30px;padding:40px;margin-bottom:2rem;box-shadow:0 10px 30px rgba(136,67,199,0.3);">
        <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:20px;">
            <div>
                <h1 style="color:#fff;font-family:'DynaPuff',sans-serif;font-size:2.5rem;margin:0 0 10px 0;">Interesses de Adoção</h1>
                <p style="color:rgba(255,255,255,0.9);font-size:1.2rem;margin:0;">
                    Total de interesses: <strong>{{ $interesses->count() }}</strong>
                </p>
            </div>
            <a href="{{ route('index') }}" class="btn-voltar" style="background:#1e5f27;color:#fff;padding:14px;border-radius:10px;text-decoration:none;font-weight:800;font-size:1.2rem;">VOLTAR</a>
        </div>
    </div>

    @if(session('success'))
    <div style="background:#4CAF50;color:#fff;padding:20px;border-radius:15px;margin-bottom:2rem;font-size:1.1rem;box-shadow:0 4px 12px rgba(76,175,80,0.3);">
        ✅ {{ session('success') }}
    </div>
    @endif

    <!-- Filtros de Status -->
    <div style="display:flex;gap:15px;margin-bottom:2rem;flex-wrap:wrap;">
        <button onclick="filtrarStatus('todos')" class="filtro-btn active" data-status="todos" style="background:#8843c7;color:#fff;border:none;padding:12px 24px;border-radius:12px;font-weight:700;cursor:pointer;transition:all 0.3s;">
            Todos ({{ $interesses->count() }})
        </button>
        <button onclick="filtrarStatus('pendente')" class="filtro-btn" data-status="pendente" style="background:#FFA500;color:#fff;border:none;padding:12px 24px;border-radius:12px;font-weight:700;cursor:pointer;transition:all 0.3s;">
            Pendentes ({{ $interesses->where('status', 'pendente')->count() }})
        </button>
        <button onclick="filtrarStatus('aprovado')" class="filtro-btn" data-status="aprovado" style="background:#4CAF50;color:#fff;border:none;padding:12px 24px;border-radius:12px;font-weight:700;cursor:pointer;transition:all 0.3s;">
            Aprovados ({{ $interesses->where('status', 'aprovado')->count() }})
        </button>
        <button onclick="filtrarStatus('rejeitado')" class="filtro-btn" data-status="rejeitado" style="background:#F44336;color:#fff;border:none;padding:12px 24px;border-radius:12px;font-weight:700;cursor:pointer;transition:all 0.3s;">
            Rejeitados ({{ $interesses->where('status', 'rejeitado')->count() }})
        </button>
    </div>

    @if($interesses->isEmpty())
    <div style="background:#f5f5f5;border-radius:20px;padding:60px;text-align:center;">
        <p style="font-size:1.5rem;color:#666;margin:0;">Nenhum interesse de adoção registrado ainda.</p>
    </div>
    @else
    <div style="display:grid;grid-template-columns:repeat(auto-fill, minmax(400px, 1fr));gap:24px;">
        @foreach($interesses as $interesse)
        <div class="interesse-card" data-status="{{ $interesse->status }}" style="background:#fff;border-radius:10px;padding:24px;box-shadow:0 4px 15px rgba(0,0,0,0.1);transition:all 0.3s;border-left:6px solid {{ $interesse->status_cor }};">
            <!-- Header do Card -->
            <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:16px;">
                <div style="flex:1;">
                    <h3 style="margin:0 0 8px 0;font-size:1.4rem;color:#333;">{{ $interesse->pet->nome }}</h3>
                    <p style="margin:0;color:#666;font-size:0.9rem;">{{ $interesse->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <span style="background:{{ $interesse->status_cor }};color:#fff;padding:6px 14px;border-radius:10px;font-size:0.85rem;font-weight:700;">{{ $interesse->status_formatado }}</span>
            </div>

            @if($interesse->pet->foto)
            <div style="margin-bottom:16px;">
                <img src="{{ asset('storage/' . $interesse->pet->foto) }}" alt="{{ $interesse->pet->nome }}" style="width:100%;height:180px;object-fit:cover;border-radius:10px;">
            </div>
            @endif

            <div style="background:#f9f9f9;padding:16px;border-radius:12px;margin-bottom:16px;">
                <p style="margin:0 0 8px 0;font-size:1rem;">
                    <strong>Telefone:</strong> {{ $interesse->telefone }}
                </p>
                <p style="margin:0 0 8px 0;font-size:1rem;">
                    <strong>Endereço:</strong> {{ Str::limit($interesse->endereco, 50) }}
                </p>
                <p style="margin:0;font-size:0.95rem;">
                    <strong>Motivação:</strong> {{ Str::limit($interesse->motivacao, 80) }}
                </p>
            </div>

            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                <a href="{{ route('interesse.show', $interesse->id) }}" style="flex:1;background:#2196F3;color:#fff;padding:10px;border-radius:10px;text-decoration:none;text-align:center;font-weight:700;font-size:0.9rem;">Ver Detalhes</a>
                
                @if($interesse->status == 'pendente')
                <form action="{{ route('interesse.updateStatus', $interesse->id) }}" method="POST" style="flex:1;">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="aprovado">
                    <button type="submit" style="width:100%;background:#4CAF50;color:#fff;border:none;padding:10px;border-radius:10px;font-weight:700;cursor:pointer;font-size:0.9rem;">Aprovar</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>

<style>

@media (max-width: 768px) {
    div[style*="grid-template-columns"] {
        grid-template-columns: 1fr !important;
    }
}
</style>

<script>
function filtrarStatus(status) {
    const cards = document.querySelectorAll('.interesse-card');
    const buttons = document.querySelectorAll('.filtro-btn');
    
    // Remove active de todos os botões
    buttons.forEach(btn => btn.classList.remove('active'));
    
    // Adiciona active no botão clicado
    document.querySelector(`[data-status="${status}"]`).classList.add('active');
    
    // Filtra os cards
    cards.forEach(card => {
        if (status === 'todos' || card.dataset.status === status) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>
@endsection