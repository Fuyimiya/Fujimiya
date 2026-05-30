<?php
// Classe base Pessoa
class Pessoa {
    protected $nome;

    // Construtor
    public function __construct($nome) {
        $this->nome = $nome;
    }

    // Getter
    public function getNome() {
        return $this->nome;
    }

    // Setter
    public function setNome($nome) {
        $this->nome = $nome;
    }
}
?>