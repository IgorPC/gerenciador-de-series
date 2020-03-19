@extends('layout')
@section('cabecalho')
    Registrar
@endsection
@section('conteudo')
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="InputName">Nome: </label>
            <input type="text" name="name" class="form-control" id="InputName">
        </div>
        <div class="form-group">
            <label for="InputEmail">Email: </label>
            <input type="email" name="email" class="form-control" id="InputEmail">
        </div>
        <div class="form-group">
            <label for="InputSenha">Senha: </label>
            <input type="password" name="password" class="form-control" id="InputSenha">
        </div>
        <button type="submit" class="btn btn-warning" style="width: 100%">Registrar</button>
    </form>
@endsection
