<?php
    class Conexao{

        public function __construct(protected $db = null){
            $parametros = "mysql:host=localhost;dbname=despesas_pessoais;charset=utf8mb4";
            try{
                 //fazer  
                 $this->db = new PDO($parametros, "root", ""); 
            }
            catch(PDOException $e)
            {
                //erro no fazendo
                echo $e->getCode();
                echo $e->getMessage();
                die("Tente mais tarde!!!");
            }
        }
    }
?>