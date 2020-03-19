@extends('layout')

@section('cabecalho')
    Lista de episodios
@endsection

@section('conteudo')
    @include('mensagem', ['mensagem'=> $mensagem])
    <form action="/temporadas/{{$temporadaID}}/episodios/assistir" method="POST">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episodio nº {{ $episodio->numero }}
                    @auth()
                    <input type="checkbox" name="episodios[]" value="{{$episodio->id}}" {{$episodio->assistido ? 'checked' : ''}}>
                    @endauth
                </li>
            @endforeach
        </ul>
        @auth()
        <button class="btn btn-primary mt-4 mb-4"> Salvar</button>
        @endauth
    </form>
@endsection
