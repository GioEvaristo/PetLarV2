@extends('layout')

@section('content')
<div class="container my-5">
    <section class="hero-form">
        <img class="fundo" src="{{ asset('storage/images/banner.png') }}" alt="Banner com cachorro e gato">
        <img src="{{ asset('storage/images/logo-semea.png') }}" class="selo-meio-ambiente-form" alt="Selo Meio Ambiente">
    </section>

    <form class="form-admin" action="{{ route('admin.login.submit') }}" method="POST">
        <h2 class="titulo-form">Login de Administrador</h2>
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

        @if(session('error'))
            <div class="alert alert-danger mb-3">
                {{ session('error') }}
            </div>
        @endif

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label text-white" for="remember">
                Lembrar de mim
            </label>
        </div>

        <div class="text-end">
            <button type="submit" class="btn">Entrar</button>
        </div>
    </form>
</div>
@endsection
