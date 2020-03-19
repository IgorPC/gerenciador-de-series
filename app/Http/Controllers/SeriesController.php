<?php

namespace App\Http\Controllers;

use App\Episodios;
use App\Http\Requests\SeriesRequest;
use App\Serie;
use App\Service\CriadorDeSerie;
use App\Service\RemovedorDeSerie;
use App\Temporadas;
use Illuminate\Http\Request;
use function foo\func;

class SeriesController extends Controller {

    public function index(Request $request){
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('aviso');
        return view("series.index", compact("mensagem", "series"));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesRequest $request, CriadorDeSerie $criadorSerie)
    {
        $serie = $criadorSerie->criarSerie($request->serie, $request->qntTemporadas, $request->qntEpisodios);

        $request->session()->flash('aviso', "A serie $serie->nome e suas temporadas foram adicionadas com sucesso");

        return redirect()->route('listar-series');
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie){
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);

        $request->session()->flash('aviso', "A serie $nomeSerie foi removida com sucesso");

        return redirect()->route('listar-series');
    }

    public function editarNome(Request $request)
    {
        $nome = $request->nome;
        $serie = Serie::find($request->id);
        $serie->nome = $nome;
        $serie->save();
    }
}
