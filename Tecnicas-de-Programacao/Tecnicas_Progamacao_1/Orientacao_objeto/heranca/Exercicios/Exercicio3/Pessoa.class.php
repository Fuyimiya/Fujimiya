<?php
/**
 * Classe Pessoa
 * Classe base (superclasse) que representa uma pessoa genérica
 */
class Pessoa {
    protected $nome;
    protected $celular;

    // Construtor
    public function __construct($nome, $celular) {
        $this->nome = $nome;
        $this->celular = $celular;
    }

    // Getters e Setters
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function setCelular($celular) {
        $this->celular = $celular;
    }

    // Método para exibir dados
    public function __toString() {
        return "Nome: {$this->nome} | Celular: {$this->celular}";
    }
}