@extends('layout')

@section('cabecalho')
Series
@endsection

@section('conteudo')
    @include('mensagem', ['mensagem'=> $mensagem])
    @auth()
    <a href="{{route('nova-serie')}}" class="btn btn-dark mb-4">Adicionar Serie <i class="fas fa-plus-circle"></i></a>
    @endauth
    @guest()
    <a href="{{route('entrar')}}" class="btn btn-primary mb-4">Entrar</a>
    @endguest
    <ul class="list-group">
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>
            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>
             <span class="d-flex">
                 @auth()
                 <button href="#" class="btn btn-warning btn-sm mr-2" onclick="mostrarEdicao({{$serie->id}})"><i class="fas fa-edit"></i></button>
                 @endauth
                 <a class="btn btn-info btn-sm mr-2" href="{{$serie->id}}/temporadas" class="href"> <i class="fas fa-align-justify"></i> </a>
                 @auth()
                 <form method="POST" action="/remover/{{$serie->id}}" onsubmit="return confirm('Tem certeza que deseja excluir a serie {{$serie->nome}}?')">@csrf<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></form>
                 @endauth
             </span>
        </li>
        @endforeach
    </ul>
    <script>
        function mostrarEdicao(serieId) {
            const nomeSerieEl = document.getElementById(`input-nome-serie-${serieId}`);
            const inputSerieEl = document.getElementById(`nome-serie-${serieId}`);
            if(nomeSerieEl.hasAttribute('hidden')){
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            }else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }
        }

        function editarSerie(serieId) {
            let formData = new FormData();
            const nome = document.querySelector(`#input-nome-serie-${serieId}  > input`).value;
            formData.append('nome', nome);
            const token = document.querySelector(`input[name="_token"]`).value;
            formData.append('_token', token);
            const url = `/editar/${serieId}`;
            fetch(url,{
                body: formData,
                method: 'POST'
            }).then(() => {
                mostrarEdicao(serieId);
                document.getElementById(`nome-serie-${serieId}`).textContent = nome;
                }
            );
        }
    </script>
@endsection
