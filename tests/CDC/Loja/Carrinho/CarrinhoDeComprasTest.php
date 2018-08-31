<?php

namespace CDC\Loja\Carrinho;

use PHPUnit\Framework\TestCase,
CDC\Loja\Carrinho\CarrinhoDeCompras,
CDC\Loja\Produto\Produto;

class CarrinhoDeComprasTest extends TestCase {

    protected function setUp() {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio() {
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(0, $valor, '', 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento() {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(900.00, $valor, '', 0.0001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos() {
        $this->carrinho->adiciona(new Produto("Geladeira", 900.00, 1));
        $this->carrinho->adiciona(new Produto("Fogão", 1500.00, 1));
        $this->carrinho->adiciona(new Produto("Máquina de lavar", 750.00, 1));
        $valor = $this->carrinho->maiorValor();
        $this->assertEquals(1500.00, $valor, '', 0.0001);
    }

    public function testListaDeProdutos() {
        $lista = ($this->carrinho)
        ->adiciona(
            new Produto("Jogo de jantar", 200.00, 1))
        ->adiciona(
            new Produto("Jogo de pratos", 100.00, 1));
        $this->assertEquals(
            2, count($lista->getProdutos())
        );
        $this->assertEquals(
            200.0, $lista->getProdutos()[0]->getValorUnitario()
        );
        $this->assertEquals(
            100.0, $lista->getProdutos()[1]->getValorUnitario()
        );
        // asserts nos outros atributos, como quantidade,
        // etc, nos objetos dessa lista
    }

}
