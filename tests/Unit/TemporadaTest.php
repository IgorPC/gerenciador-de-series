<?php

namespace Tests\Unit;

use App\Episodios;
use App\Temporadas;
use PHPUnit\Framework\TestCase;

class TemporadaTest extends TestCase
{
    public function testEpisodiosAssistidos()
    {
        $temporada = new Temporadas();
        $episodio1 = new Episodios();
        $episodio1->assistido = true;
        $episodio2 = new Episodios();
        $episodio2->assistido = false;
        $episodio3 = new Episodios();
        $episodio3->assistido = true;
        $temporada->episodios->add($episodio1);
        $temporada->episodios->add($episodio2);
        $temporada->episodios->add($episodio3);

        $episodiosAssistidos = $temporada->getEpisodiosAssistidos();
        $this->assertCount(2, $episodiosAssistidos);
        /*foreach ($episodiosAssistidos as $episodios){
            $this->assertTrue($episodios->assistido);
        }*/
    }
}
