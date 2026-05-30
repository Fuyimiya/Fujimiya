<?php
    class Filme
    {
        public function __construct(
            private string $titulo = "",
            private int $ano = 0,
            //atributo do relacionamento com ator
            private array $atores = array()
        ){}
        //métodos gets
        public function getTitulo(){
            return $this->titulo;
        }
        public function getAno(){
            return $this->ano;
        }
        public function getAtores(){
            return $this->atores;
        }
        //métodos sets
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;
        }
        public function setAno($ano)
        {
            $this->ano = $ano;
        }
        public function setAtores($ator)
        {
            $this->atores[] = $ator;
        }
    }//fim da classe
?>