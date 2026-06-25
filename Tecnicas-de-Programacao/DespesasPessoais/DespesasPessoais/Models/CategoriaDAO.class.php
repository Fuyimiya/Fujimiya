<?php
    class CategoriaDAO extends Conexao{
        public function __construct(){
            parent:: __construct();
        }

        public function buscarTodasCategorias(){
            $sql = "SELECT * FROM categoria";
            try{
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ); 
            }
            catch(PDOException $e){
                $this->db = null;
                return "Problema ao buscar todas as categorias";
            }
        }
    }//fim da classe
?>