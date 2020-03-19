<?php


namespace App\Http\Controllers;


use App\Serie;

class TemporadaController extends Controller
{
    public function index(int $seriesId)
    {
        $temporadas = Serie::find($seriesId)->temporadas;
        $serie = Serie::find($seriesId)->nome;

        return view('temporadas.index', compact('temporadas', 'serie'));
    }
}
