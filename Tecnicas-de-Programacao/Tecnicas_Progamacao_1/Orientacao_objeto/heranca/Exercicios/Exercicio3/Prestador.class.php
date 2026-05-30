<?php
require_once "Pessoa.php";

/**
 * Classe Prestador
 * Representa o profissional (barbeiro, cabeleireiro, etc.)
 */
class Prestador extends Pessoa {
    private $especialidade;

    public function __construct($nome, $celular, $especialidade) {
        parent::__construct($nome, $celular);
        $this->especialidade = $especialidade;
    }

    public function getEspecialidade() {
        return $this->especialidade;
    }

    public function setEspecialidade($especialidade) {
        $this->especialidade = $especialidade;
    }

    public function __toString() {
        return parent::__toString() . " | Especialidade: {$this->especialidade}";
    }
}