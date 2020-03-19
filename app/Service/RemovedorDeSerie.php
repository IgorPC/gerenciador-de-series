<?php


namespace App\Service;


use App\Episodios;
use App\Serie;
use App\Temporadas;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie($serieID){
        DB::beginTransaction();
        $serie = Serie::find($serieID);
        $nome = $serie->nome;
        $serie->Temporadas->each(function (Temporadas $temporada) {
            $temporada->Episodios->each(function (Episodios $episodios) {
                $episodios->delete();
            });
            $temporada->delete();
        });
        $serie->delete();
        DB::commit();
        return $nome;
    }
}
