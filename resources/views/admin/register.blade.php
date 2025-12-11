@extends('layout')

@section('content')
<div class="container my-5">
    <section class="hero-form">
        <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato">
        <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente-form" alt="Selo Meio Ambiente">
    </section>

    <form class="form-admin" action="{{ route('admin.register.submit') }}" method="POST">
        <h2 class="titulo-form">Cadastro de Administrador</h2>
        @csrf

        @if($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Nome Completo</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control" required>
            <small class="text-white">Mínimo de 8 caracteres</small>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="text-end">
            <a href="{{ route('admin.login') }}" class="btn-link-admin me-3">Já tem conta? Faça login</a>
            <button type="submit" class="btn">Cadastrar</button>
        </div>
    </form>
</div>
@endsection
