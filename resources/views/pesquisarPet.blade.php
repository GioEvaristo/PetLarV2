@extends('layout')
@section('content')
<div class="card border">
    <div class="card-body">
        <form action="{{ route('procurarPet') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Pet:</label>
                <input type="text" class="form-control" name="nome"
                    placeholder="Informe o nome do pet para pesquisar">
            </div>
            <button type="submit" class="btn btn-outline-primary btn-sm">Pesquisar</button>
            <button onclick="window.location.href='{{ route('index') }}';" type="button"
                class="btn btn-outline-danger btn-sm">Cancelar</button>
        </form>
    </div>
</div>
@endsection