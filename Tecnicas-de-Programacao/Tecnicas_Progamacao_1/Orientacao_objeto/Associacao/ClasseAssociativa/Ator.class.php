<?php
    class Ator
    {
        public function __construct(
            private string $nome = "",
            private string $nacionalidade = "",
            //atributo do relacionamento com filme
            private array $filmes = array()
        ){}
        //métodos gets
        public function getNome(){
            return $this->nome;
        }
        public function getNacionalidade(){
            return $this->nacionalidade;
        }
        public function getFilmes(){
            return $this->filmes;
        }
        //métodos sets
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function setNacionalidade($nacionalidade)
        {
            $this->nacionalidade = $nacionalidade;
        }
         public function setFilmes($filme)
        {
            $this->filmes[] = $filme;
        }
    }//fim da classe
?>