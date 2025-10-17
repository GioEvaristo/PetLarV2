@extends('layout')

@section('content')
<section class="container py-5">
    
    <div class="row justify-content-center align-items-center bg-purple rounded-4 p-4 shadow-lg">
        <h2 class="titulo-form">Formulário de Registro de Interesse</h2>
        <div class="col-md-5 text-center">
            <h2 class="fw-bold text-white" style="font-family: 'DynaPuff'; font-size: 2.5rem;">{{ $pet->nome }}</h2>
            @if($pet->foto)
                <img src="{{ asset('storage/' . $pet->foto) }}" alt="{{ $pet->nome }}" class="img-fluid rounded-4 mb-3">
            @endif
            
        </div>
        <div class="col-md-7">

            <form action="{{ route('interesse.store') }}" method="POST">
                @csrf
                <input type="hidden" name="pet_id" value="{{ $pet->id }}">

                <div class="mb-3">
                    <label for="telefone" class="form-label text-white">Telefone de Contato (Whatsapp)*</label>
                    <input type="text" id="telefone" name="telefone" class="form-control input-petlar" required>
                </div>

                <div class="mb-3">
                    <label for="endereco" class="form-label text-white">Endereço*</label>
                    <input type="text" id="endereco" name="endereco" class="form-control input-petlar" required>
                </div>

                <div class="mb-3">
                    <label for="motivacao" class="form-label text-white">Por que deseja adotar esse animal?*</label>
                    <textarea id="motivacao" name="motivacao" class="form-control input-petlar" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="infoadicional" class="form-label text-white">Informações adicionais</label>
                    <textarea id="infoadicional" name="infoadicional" class="form-control input-petlar" rows="2"></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn px-5 py-2 fw-bold" style="font-size: 1.2rem; background-color: #234d20">ENVIAR</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
