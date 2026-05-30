<?php
    class Festa{
        public function __construct(
            private string $data_contrato = "",
            private string $data_festa = "",
            private float $valor = 0,
            //relação unilateral com cliente, não precisa colocar festa em cliente
            //o interrogação diz que o parâmetro pode ser nulo
            //tipo Cliente, atributo cliente
            private ?Cliente $cliente = null,
            //relação bilateral com contratado, precisa colocar festa em contratado
            private ?Contratado $contratado = null,
            //relaçao de agregação unilateral com decoração
            //apenas festa recebe as informaçõs de decoração, decoração não recebe de festa
            private ?Decoracao $decoracao = null

        ){}
        //método get
        public function getData_contrato()
        {
            return $this->data_contrato;
        }
        public function getData_festa()
        {
            return $this->data_festa;
        }
        public function getValor()
        {
            return $this->valor;
        }
        public function getCliente()
        {
            return $this->cliente;
        }
        public function getContratado()
        {
            return $this->contratado;
        }
        public function getDecoracao()
        {
            return $this->decoracao;
        }
        //método set
        public function setData_contrato($data_contrato)
        {
            $this->data_contrato = $data_contrato;
        }
        public function setData_festa($data_festa)
        {
            $this->data_festa = $data_festa;
        }
        public function setValor($valor)
        {
            $this->valor = $valor;
        }
        public function setCliente($cliente)
        {
            $this->cliente = $cliente;
        }
        public function setContratado($contratado)
        {
            $this->contratado = $contratado;
        }
        public function setDecoracao($decoracao)
        {
            $this->decoracao = $decoracao;
        }
    }
?>