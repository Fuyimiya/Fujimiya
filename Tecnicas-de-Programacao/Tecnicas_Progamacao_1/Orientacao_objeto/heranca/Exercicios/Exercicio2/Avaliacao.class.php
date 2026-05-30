<?php

require_once "Avaliador.php";
require_once "Receita.php";

class Avaliacao {
    private float $nota;
    private Avaliador $avaliador;
    private Receita $receita;

    public function __construct(float $nota, Avaliador $avaliador, Receita $receita) {
        $this->nota = $nota;
        $this->avaliador = $avaliador;
        $this->receita = $receita;
    }

    public function getNota(): float {
        return $this->nota;
    }

    public function setNota(float $nota): void {
        $this->nota = $nota;
    }

    public function getAvaliador(): Avaliador {
        return $this->avaliador;
    }

    public function getReceita(): Receita {
        return $this->receita;
    }
}