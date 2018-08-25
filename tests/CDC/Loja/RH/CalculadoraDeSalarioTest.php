<?php

namespace CDC\Loja\RH;

require "./vendor/autoload.php";

use PHPUnit\Framework\TestCase as PHPUnit;
use CDC\Loja\RH\CalculadoraDeSalario,
CDC\Loja\RH\Funcionario,
CDC\Loja\RH\TabelaCargos;

class CalculadoraDeSalarioTest extends PHPUnit {

    public function 
    testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite() {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
        "Andre", 1500.0, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(1500.0 * 0.9, $salario, '', 0.00001);
    }

    public function
    testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite() {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
        "Andre", 4000.0, TabelaCargos::DESENVOLVEDOR);
        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(4000.0 * 0.8, $salario, '', 0.00001);
    }

    public function
    testDeveCalcularSalarioParaDBAsComSalarioAbaixoDoLimite() {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario("Andre", 500.0, TabelaCargos::DBA);
        $salario = $calculadora->calculaSalario($dba);
        $this->assertEquals(500.0 * 0.85, $salario, '', 0.00001);
    }
}