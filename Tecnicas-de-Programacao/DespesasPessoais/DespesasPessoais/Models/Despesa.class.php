<?php
    class Despesa{
        public function __construct(
            private int   $id_despesa = 0,
            private float $valor = 0, 
            private string $data_despesa = "", 
            private ?Categoria $categoria = null){}

        public function getId_despesa(){
            return $this->id_despesa;
        }
        public function getValor(){
            return $this->valor;
        }
        public function getData_despesa(){
            return $this->data_despesa;
        }
        public function getCategoria(){
            return $this->categoria;
        }
        public function setId_despesa($id_despesa){
            $this->id_despesa = $id_despesa;
        }
        public function setValor($valor){
            $this->valor = $valor;
        }
        public function setData_despesa($data_despesa){
            $this->data_despesa = $data_despesa;
        }
        public function setCategoria($categoria){
            $this->categoria = $categoria;
        }

    }
?>