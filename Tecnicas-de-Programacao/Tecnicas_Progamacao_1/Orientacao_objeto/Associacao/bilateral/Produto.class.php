<?php
    class Produto{
        public function __construct(
            private string $nome = "",
            private float $preco = 0.00,
            //atributo da relação com fornecedor
            private array $fornecedores = array()
            ){}

        //métodos gets
        public function getNome(){
            return $this->nome;
        }
        public function getPreco(){
            return $this->preco;
        }
        public function getFornecedores(){
            return $this->fornecedores;
        }
    }
?>