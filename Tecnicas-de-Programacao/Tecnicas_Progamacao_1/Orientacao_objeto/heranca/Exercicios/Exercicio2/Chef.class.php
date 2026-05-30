<?php

require_once "Pessoa.php";
require_once "Receita.php";

class Chef extends Pessoa {
    private string $especialidade;
    private array $receitas = [];

    public function __construct(string $nome, string $especialidade) {
        parent::__construct($nome);
        $this->especialidade = $especialidade;
    }

    public function getEspecialidade(): string {
        return $this->especialidade;
    }

    public function setEspecialidade(string $especialidade): void {
        $this->especialidade = $especialidade;
    }

    public function addReceita(Receita $receita): void {
        $this->receitas[] = $receita;
    }

    public function getReceitas(): array {
        return $this->receitas;
    }
}