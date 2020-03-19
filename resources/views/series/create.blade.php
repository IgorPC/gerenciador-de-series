@extends('layout')

@section('cabecalho')
Adicionar Serie
@endsection

@section('conteudo')
    @include('erros', ['errors'=> $errors])
<form method="post">
    @csrf
    <div class="form-group">
        <div class="row">
            <div class="col col-8">
                <label for="serie">Nome da Serie: </label>
                <input class="form-control" type="text" name="serie">
            </div>
            <div class="col col-2">
                <label for="temporadas">Nº de temporadas: </label>
                <input class="form-control" type="number" name="qntTemporadas">
            </div>
            <div class="col">
                <label for="episodios">Nº de episodios: </label>
                <input class="form-control" type="number" name="qntEpisodios">
            </div>
        </div>
    </div>
    <button class="btn btn-primary mt-3">Adicionar</button>
</form>
@endsection
