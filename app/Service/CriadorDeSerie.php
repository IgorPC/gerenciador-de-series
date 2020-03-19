<?php

namespace App\Service;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie($nomeSerie, $qntTemporadas, $qntEpisodios)
    {
        DB::beginTransaction();
        $serie = Serie::create([
            'nome' => $nomeSerie
        ]);

        for($i = 1; $i <= $qntTemporadas; $i++){
            $temporada = $serie->Temporadas()->create(['numero' => $i]);

            for($j = 1; $j <= $qntEpisodios ; $j++){
                $temporada->Episodios()->create(['numero'=> $j]);
            }
        }
        DB::commit();
        return $serie;
    }
}
