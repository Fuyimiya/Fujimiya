<?php
    class Celular
    {
        public function __construct(
            private int $ddd = 0, 
            private string $numero = "",
            //o ponto de interrogação é para dizer que o tipo é nullable
            private ?Cliente $cliente = null
        ){}
        //métodos gets
        public function getDdd(){
            return $this->ddd;
        }
        public function getNumero(){
            return $this->numero;
        }
        public function getCliente(){
            return $this->cliente;
        }
        //métodos sets
        public function setDdd($ddd){
            $this->ddd = $ddd;
        }
        public function setNumero($numero){
            $this->numero = $numero;
        }
        public function setCliente($cliente){
            $this->cliente = $cliente;
        }
    }//fim da classe
?>