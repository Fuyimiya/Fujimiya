<?php
require_once "Pessoa.php";

/**
 * Classe Cliente
 * Herda de Pessoa e adiciona CPF
 */
class Cliente extends Pessoa {
    private $cpf;

    public function __construct($nome, $celular, $cpf) {
        parent::__construct($nome, $celular);
        $this->cpf = $cpf;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function __toString() {
        return parent::__toString() . " | CPF: {$this->cpf}";
    }
}