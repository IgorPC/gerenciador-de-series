@extends('layout')

@section('cabecalho')
    Entrar
@endsection

@section('conteudo')
    @include('erros', ['errors'=> $errors])
    <a href="{{route('listar-series')}}" class="btn btn-dark mb-4"><i class="fas fa-list-alt"></i> Listar Series</a>
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="InputEmail">Email: </label>
            <input type="email" name="email" class="form-control" id="InputEmail">
        </div>
        <div class="form-group">
            <label for="InputSenha">Senha: </label>
            <input type="password" name="password" class="form-control" id="InputSenha">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Lembrar dados</label>
        </div>
        <button type="submit" class="btn btn-primary" style="width: 100%">Entrar</button>
    </form>
    <a href="{{route('registrar')}}" class="btn btn-secondary mt-4" style="width: 100%">Registrar</a>
@endsection
