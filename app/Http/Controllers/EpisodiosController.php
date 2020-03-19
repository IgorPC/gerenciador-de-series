<?php

namespace App\Http\Controllers;

use App\Episodios;
use App\Temporadas;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporadas $temporada, Request $request)
    {
        $episodios = $temporada->episodios;
        $temporadaID = $temporada->id;
        $mensagem = $request->session()->get('aviso');

        return view('episodios.index', compact('episodios', 'temporadaID', 'mensagem'));
    }

    public function assistir(Temporadas $temporada, Request $request)
    {
        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function (Episodios $episodio) use ($episodiosAssistidos){
            $episodio->assistido = in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();
        $request->session()->flash('aviso', "A lista de episodios foi atualizada com sucesso");
        return redirect()->back();
    }

}
