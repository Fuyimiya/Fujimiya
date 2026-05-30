<?php
    class Poupanca extends Conta
    {
        public function __construct(
           
            private int $aniversario = 0, 
            //os elementos abaixo são parâmetros e não atributos, 
            // por isso não tem o modificador private
            int $banco,  
            string $agencia,
            string $conta,
            float $saldo
            )
        {
            parent:: __construct(
            $banco,  
            $agencia,
            $conta,
            $saldo);
        }//fim construtor
        public function getAniversario(){
            return $this->aniversario;
        }
        public function setAniversario($aniversario){
            $this->aniversario = $aniversario;
        }
    }//fim da classe
?>