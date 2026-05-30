<?php
    //Herança, contratado recebe de Pessoa (pai)
    class Contratado extends Pessoa{
        public function __construct(
            private string $cnpj = "",
            //relação bilateral com festa
            //cada contratado pode ter muitas festas, então cria um array (relação da imagem)
            private array $festa = array(),
            //Recebe por parâmetro tudo o que tem no contrutor do pai (Pessoa)
            string $nome = "",
            array $telefones = array(),
            int $ddd = 0,
            string $numero = ""
        )
        {
            //chamando o construtor de pessoa e passando por parâmetro todos os elementos do construtor
            parent:: __construct($nome, $telefone, $ddd, $numero);
        }
        //não precisa criar get e set das heranças porque herdam do pai
        //método get
        public function getCnpj()
        {
            return $this->cnpj;
        }
        public function getFesta()
        {
            return $this->festa;
        }
        //método set
        public function setCnpj($cnpj)
        {
            $this->cnpj = $cnpj;
        }
        public function setFesta($festa)
        {
            $this->festa = $festa;
        }
    }
?>
