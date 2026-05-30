<?php
/**
 * Classe Servico
 * Representa um serviço oferecido
 */
class Servico {
    private $descritivo;
    private $preco;

    public function __construct($descritivo, $preco) {
        $this->descritivo = $descritivo;
        $this->preco = $preco;
    }

    public function getDescritivo() {
        return $this->descritivo;
    }

    public function setDescritivo($descritivo) {
        $this->descritivo = $descritivo;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function __toString() {
        return "Serviço: {$this->descritivo} | Preço: R$ {$this->preco}";
    }
}