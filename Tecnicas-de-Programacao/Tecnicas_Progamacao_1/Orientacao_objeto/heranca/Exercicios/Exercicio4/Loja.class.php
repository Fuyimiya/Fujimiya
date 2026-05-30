<?php
// Classe Loja
class Loja {
    private $lotes;
    private $numero;

    public function __construct($lotes, $numero) {
        $this->lotes = $lotes;
        $this->numero = $numero;
    }

    public function getLotes() {
        return $this->lotes;
    }

    public function setLotes($lotes) {
        $this->lotes = $lotes;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($numero) {
        $this->numero = $numero;
    }
}
?>