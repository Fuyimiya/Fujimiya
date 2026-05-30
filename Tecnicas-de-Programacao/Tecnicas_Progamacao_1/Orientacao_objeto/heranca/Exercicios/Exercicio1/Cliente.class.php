<?php
    //Herança, cliente recebe de Pessoa (pai)
    class Cliente extends Pessoa{
        public function __construct(
            private string $cpf = "",
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
        public function getCpf()
        {
            return $this->cpf;
        }
        //método set
        public function setCpf($cpf)
        {
            $this->cpf = $cpf;
        }
    }
?>
