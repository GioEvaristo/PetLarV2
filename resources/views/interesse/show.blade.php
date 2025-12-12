@extends('layout')

@section('content')
<div class="container-fluid py-5 px-4" style="max-width:1200px;margin:0 auto;">
    
    <div style="background:linear-gradient(135deg, #8843c7 0%, #a05ce0 100%);border-radius:30px;padding:40px;margin-bottom:2rem;box-shadow:0 10px 30px rgba(136,67,199,0.3);position:relative;overflow:hidden;">
            
        <div style="position:relative;z-index:1;">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:20px;">
                <h1 style="color:#fff;font-family:'DynaPuff',sans-serif;font-size:2.5rem;margin:0;">
                    Detalhes do Interesse
                </h1>
                <span style="background:{{ $interesse->status_cor }};color:#fff;padding:12px 24px;border-radius:20px;font-size:1.1rem;font-weight:700;box-shadow:0 4px 12px rgba(0,0,0,0.2);">
                    {{ $interesse->status_formatado }}
                </span>
            </div>
            <p style="color:rgba(255,255,255,0.9);font-size:1.1rem;margin:0;">
                Registrado em {{ $interesse->created_at->format('d/m/Y \à\s H:i') }}
            </p>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;margin-bottom:2rem;">
        
        <!-- Informações do Pet -->
        <div style="background:#8843c7;border-radius:20px;padding:32px;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
            <h2 style="font-family:'DynaPuff';font-size:1.8rem;margin-bottom:24px;color:#fff;border-bottom:3px solid #8843c7;padding-bottom:12px;">
                {{ $interesse->pet->nome }}
            </h2>
            
            @if($interesse->pet->foto)
            <div style="margin-bottom:24px;">
                <img src="{{ asset('storage/' . $interesse->pet->foto) }}" alt="{{ $interesse->pet->nome }}" style="width:100%;height:300px;object-fit:cover;border-radius:15px;box-shadow:0 4px 15px rgba(0,0,0,0.2);">
            </div>
            @endif

            <div style="background:#f9f9f9;padding:20px;border-radius:12px;">
                <p style="margin:0 0 12px 0;font-size:1.1rem;">
                    <strong>Espécie:</strong> {{ ucfirst($interesse->pet->especie) }}
                </p>
                <p style="margin:0 0 12px 0;font-size:1.1rem;">
                    <strong>Raça:</strong> {{ $interesse->pet->raca ?: 'SRD' }}
                </p>
                <p style="margin:0 0 12px 0;font-size:1.1rem;">
                    <strong>Idade:</strong> {{ $interesse->pet->idade_formatada }}
                </p>
                <p style="margin:0 0 12px 0;font-size:1.1rem;">
                    <strong>Sexo:</strong> {{ ucfirst($interesse->pet->sexo) }}
                </p>
                <p style="margin:0;font-size:1.1rem;">
                    <strong>Status:</strong> 
                    <span style="background:{{ $interesse->pet->status == 'disponivel' ? '#4CAF50' : '#FF9800' }};color:#fff;padding:4px 12px;border-radius:8px;font-size:0.9rem;">
                        {{ ucfirst($interesse->pet->status ?? 'disponível') }}
                    </span>
                </p>
            </div>

            <a href="{{ route('verPets', $interesse->pet->id) }}" style="display:block;margin-top:20px;background:#2196F3;color:#fff;padding:14px;border-radius:12px;text-decoration:none;text-align:center;font-weight:700;font-size:1.1rem;">
                Ver Perfil Completo do Pet
            </a>
        </div>

        <!-- Informações do Interessado -->
        <div style="background:#8843c7;border-radius:20px;padding:32px;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
            <h2 style="font-family:'DynaPuff';font-size:1.8rem;margin-bottom:24px;color:#fff;padding-bottom:12px;">
                Dados do Interessado
            </h2>

            <div style="margin-bottom:24px;">
                <label style="font-weight:700;color:#fff;font-size:0.9rem;display:block;margin-bottom:8px;">
                    TELEFONE (WHATSAPP)
                </label>
                <div style="background:#f9f9f9;padding:16px;border-radius:12px;font-size:1.2rem;color:#333;">
                    <a href="https://wa.me/55{{ preg_replace('/[^0-9]/', '', $interesse->telefone) }}" target="_blank" style="color:#25D366;text-decoration:none;font-weight:700;">
                        {{ $interesse->telefone }}
                    </a>
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="font-weight:700;color:#fff;font-size:0.9rem;display:block;margin-bottom:8px;">
                    ENDEREÇO
                </label>
                <div style="background:#f9f9f9;padding:16px;border-radius:12px;font-size:1.1rem;color:#333;">
                    {{ $interesse->endereco }}
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="font-weight:700;color:#fff;font-size:0.9rem;display:block;margin-bottom:8px;">
                    MOTIVAÇÃO PARA ADOÇÃO
                </label>
                <div style="background:#f9f9f9;padding:16px;border-radius:12px;font-size:1rem;color:#333;line-height:1.6;">
                    {{ $interesse->motivacao }}
                </div>
            </div>

            @if($interesse->infoadicional)
            <div style="margin-bottom:24px;">
                <label style="font-weight:700;color:#fff;font-size:0.9rem;display:block;margin-bottom:8px;">
                    INFORMAÇÕES ADICIONAIS
                </label>
                <div style="background:#f9f9f9;padding:16px;border-radius:12px;font-size:1rem;color:#333;line-height:1.6;">
                    {{ $interesse->infoadicional }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <!-- Ações -->
    <div style="background:#8843c7;border-radius:20px;padding:32px;box-shadow:0 4px 15px rgba(0,0,0,0.1);">
        <h3 style="font-family:'DynaPuff';font-size:1.5rem;margin-bottom:20px;color:#fff;">
            Ações
        </h3>

        <div style="display:flex;gap:16px;flex-wrap:wrap;">
            <a href="{{ route('interesse.index') }}" style="background:#1e5f27;color:#fff;padding:16px 32px;border-radius:12px;text-decoration:none;font-weight:700;font-size:1.1rem;">
                Voltar para Lista
            </a>

            @if($interesse->status == 'pendente')
            <form action="{{ route('interesse.updateStatus', $interesse->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="aprovado">
                <button type="submit" style="background:#4CAF50;color:#fff;border:none;padding:16px 32px;border-radius:12px;font-weight:700;cursor:pointer;font-size:1.1rem;">
                    Aprovar Interesse
                </button>
            </form>

            <form action="{{ route('interesse.updateStatus', $interesse->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="rejeitado">
                <button type="submit" style="background:#F44336;color:#fff;border:none;padding:16px 32px;border-radius:12px;font-weight:700;cursor:pointer;font-size:1.1rem;">
                    Rejeitar Interesse
                </button>
            </form>
            @endif

            @if($interesse->status != 'pendente')
            <form action="{{ route('interesse.updateStatus', $interesse->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="pendente">
                <button type="submit" style="background:#FFA500;color:#fff;border:none;padding:16px 32px;border-radius:12px;font-weight:700;cursor:pointer;font-size:1.1rem;">
                    Voltar para Pendente
                </button>
            </form>
            @endif

            <form action="{{ route('interesse.destroy', $interesse->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Tem certeza que deseja remover este interesse?');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:#9E9E9E;color:#fff;border:none;padding:16px 32px;border-radius:12px;font-weight:700;cursor:pointer;font-size:1.1rem;">
                    Deletar
                </button>
            </form>
        </div>
    </div>

</div>

<style>
@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
@endsection