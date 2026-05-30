<?php
    class Conta
    {
        public function __construct(
            protected int $banco = 0,
            protected string $agencia = "",
            protected string $conta = "",
            protected float $saldo = 0.00 ){}
        //getters

        public function getBanco(){
            return $this->banco;
        }
        public function getAgencia(){
            return $this->agencia;
        }
        public function getConta(){
            return $this->conta;
        }
        public function getSaldo(){
            return $this->saldo;
        }
        //métodos setters

        public function setBanco($banco){
            $this->banco = $banco;
        }
        public function setAgencia($agencia){
            $this->agencia = $agencia;
        }
        public function setConta($conta){
           $this->conta = $conta;
        }
        public function setSaldo($saldo){
            $this->saldo = $saldo;
        }
        public function Depositar(float $valor)
        {
            if($valor <= 0)
            {
                return "Valor Inválido para depósito";
                
            }
            $this->saldo += $valor;
            return $this->getSaldo();
            

        }//fim depositar
        public function sacar($valor){
            $this->saldo -= $valor;
        }
    }//fim da classe
?>