@extends('layout')

@section('cabecalho')
    Temporadas de {{$serie}}
@endsection

@section('conteudo')

    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{$temporada->id}}/episodios"> {{$temporada->numero}}ª Temporada </a>
                <span class="d-flex">
                    @if($temporada->getEpisodiosAssistidos()->count() == $temporada->episodios->count())
                        <span class="badge badge-success mr-2">{{$temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}</span>
                    @else
                    <span class="badge badge-secondary mr-2">{{$temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}</span>
                    @endif
                </span>
            </li>
        @endforeach
    </ul>
@endsection
