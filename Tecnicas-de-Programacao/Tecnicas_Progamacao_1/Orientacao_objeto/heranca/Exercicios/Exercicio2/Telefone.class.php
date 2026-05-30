<?php
    class Telefone{
        public function __construct(
            private int $ddd = 0,
            private string $numero = "",
            //relação com Pessoa (composição)
            //o interrogação diz que o parâmetro pode ser nulo
            //tipo Pessoa, atributo pessoa
            private ?Pessoa $pessoa = null
        ){}
        //método get
        public function getDdd()
        {
            return $this->ddd;
        }
        public function getNumero()
        {
            return $this->numero;
        }
        public function getPessoa()
        {
            return $this->pessoa;
        }
        //método set
        public function setDdd($ddd)
        {
            $this->ddd = $ddd;
        }
        public function setNumero($numero)
        {
            $this->numero = $numero;
        }
        // recebe objeto pronto, não recebe nome para criar objeto dentro do set igual acontece em telefone dentro de pessoa
        public function setPessoa($pessoa)
        {
            $this->pessoa = $pessoa;
        }
    }
?>
