<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Temporadas extends Model
{
    protected $fillable = ['numero'];
    public $timestamps = false;

    public function episodios(){
        return $this->hasMany(Episodios::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getEpisodiosAssistidos() :Collection
    {
        return $this->episodios->filter(function (Episodios $episodio){
            return $episodio->assistido;
        });
    }
}
