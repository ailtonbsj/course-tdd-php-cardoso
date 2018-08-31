<?php

namespace CDC\Loja\RH;

class Cargo {
    private $cargos = array(
        TabelaCargos::DESENVOLVEDOR => "CDC\Loja\RH\DezOuVintePorCento",
        TabelaCargos::DBA => "CDC\Loja\RH\QuinzeOuVinteECincoPorCento",
        TabelaCargos::TESTADOR => "CDC\Loja\RH\QuinzeOuVinteECincoPorCento"
    );
    private $regra;
    
    public function __construct($regra) {
        if( array_key_exists($regra, $this->cargos) ) {
            $this->regra = $this->cargos[$regra];
        } else {
            throw new \RuntimeException("Cargo inválido");
        }
    }

    public function getRegra() {
        return new $this->regra();
    }
}