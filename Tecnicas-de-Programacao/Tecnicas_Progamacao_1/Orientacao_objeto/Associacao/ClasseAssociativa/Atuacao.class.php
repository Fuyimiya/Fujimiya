<?php
    class Atuacao
    {
        public function __construct(
            private string $papel = "",
            //dois atributos da relação(filme e ator)
            private ?Ator $ator = null,
            private ?Filme $filme = null
        ){}
        //métodos gets
        public function getPapel(){
            return $this->papel;
        }
        public function getAtor(){
            return $this->ator;
        }
        public function getFilme(){
            return $this->filme;
        }
        
        //métodos sets
        public function setPapel($papel)
        {
            $this->papel = $papel;
        }
        public function setAtor($ator)
        {
            $this->ator = $ator;
        }
        public function setFilme($filme)
        {
            $this->filme = $filme;
        }
        
    }//fim da classe
?>