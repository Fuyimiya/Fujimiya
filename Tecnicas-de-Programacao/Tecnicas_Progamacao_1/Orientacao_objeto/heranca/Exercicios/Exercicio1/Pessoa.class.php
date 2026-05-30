<?php
    class Pessoa{
        public function __construct(
            protected string $nome = "",
            //relação de composição
            protected array $telefones = array(),
            //parâmetros
            int $ddd = 0,
            string $numero = ""
        )
        {
            $this->telefones[] = new Telefone($ddd, $numero);
        }
        //método get
        public function getNome()
        {
            return $this->nome;
        }
        public function getTelefones()
        {
            return $this->telefones;
        }
        //método set
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        //método set para composição
        public function setTelefones($ddd, $numero)
        {
            $this->telefones[] = new Telefone($ddd, $numero);
        }
    }
?>
