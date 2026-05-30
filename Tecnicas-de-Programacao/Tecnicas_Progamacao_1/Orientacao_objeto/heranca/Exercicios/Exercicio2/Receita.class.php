<?php

class Receita {
    private string $nome;
    private string $ingredientes;

    public function __construct(string $nome, string $ingredientes) {
        $this->nome = $nome;
        $this->ingredientes = $ingredientes;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getIngredientes(): string {
        return $this->ingredientes;
    }

    public function setIngredientes(string $ingredientes): void {
        $this->ingredientes = $ingredientes;
    }
}