<?php
require_once 'Pessoa.php';

// Classe Shopping herda de Pessoa
class Shopping extends Pessoa {
    private $cnpj;
    private $lojas = []; // composição: várias lojas

    public function __construct($nome, $cnpj) {
        parent::__construct($nome);
        $this->cnpj = $cnpj;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    // Adiciona loja ao shopping
    public function addLoja(Loja $loja) {
        $this->lojas[] = $loja;
    }

    public function getLojas() {
        return $this->lojas;
    }
}
?>