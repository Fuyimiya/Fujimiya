<?php
    class Cliente
    {
        public function __construct(
            private string $nome = "",
            private string $cpf = "",
            private array $celulares = array(),
            int $ddd = 0,
            string $numero = ""
        )
        {
            $this->celulares[] = new Celular($ddd, $numero);
        }//fim do construtor
        //métodos gets
        public function getNome(){
            return $this->nome;
        }
        public function getCpf(){
            return $this->cpf;
        }
        public function getCelulares(){
            return $this->celulares;
        }
        //métodos sets
        public function setNome($nome){
          $this->nome = $nome;
        }
        public function setCpf($cpf){
          $this->cpf = $cpf;
        }
        public function setCelular($ddd, $numero){
          $this->celulares[] = new Celular($ddd, $numero);
        }
    }//fim da classe
?>