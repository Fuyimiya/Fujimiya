<?php
    class Fornecedor{
        public function __construct(
            private string $razaoSocial = "",
            private string $cnpj = "",
            //relação com produto
            private array $produtos = array()
            ){}

        //métodos gets
        public function getRazaoSocial(){
            return $this->razaoSocial;
        }
        public function getCnpj(){
            return $this->cnpj;
        }
        public function getProdutos(){
            return $this->produtos;
        }
    }
?>