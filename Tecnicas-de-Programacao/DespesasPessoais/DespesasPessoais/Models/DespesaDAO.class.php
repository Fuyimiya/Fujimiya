<?php
    class DespesaDAO extends Conexao{
        public function __construct(){
            parent:: __construct();
        }

        public function buscarTodasDespesas(){
            $sql = "SELECT d.*, c.descritivo FROM despesa as d 
                    INNER JOIN categoria as c
                    ON d.id_categoria = c.id_categoria 
                    ORDER BY c.descritivo";
            try{
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ); 
            }
            catch(PDOException $e){
                $this->db = null;
                return "Problema ao buscar todas as despesas";
            }
        }
        public function cadastrar($despesa){
            $sql = "INSERT INTO despesa (valor, data_despesa, id_categoria) VALUES(?,?,?)";
            try{
                $stm = $this->db->prepare($sql);
                $stm->bindValue(1, $despesa->getValor());
                $stm->bindValue(2, $despesa->getData_despesa());
                $stm->bindValue(3, $despesa->getCategoria()->getId_categoria());
                $stm->execute();
                $this->db = null;
                return "Despesa cadastrada com sucesso";
            }
            catch(PDOException $e){
                $this->db = null;
                return "Problema ao inserir despesa";
            }
        } 
        public function buscar_dados_gerenciais(){
            $sql = "SELECT c.descritivo, 
                    SUM(d.valor) AS total_despesas,
                    ROUND(AVG(d.valor), 2) AS media_despesas
                    FROM despesa AS d
                    INNER JOIN categoria AS c 
                    ON d.id_categoria = c.id_categoria
                    GROUP BY c.id_categoria, c.descritivo
                    ORDER BY total_despesas DESC";
            try{
                $stm = $this->db->prepare($sql);
                $stm->execute();
                $this->db = null;
                return $stm->fetchAll(PDO::FETCH_OBJ); 
            }
            catch(PDOException $e){
                $this->db = null;
                return "Problema ao buscar dados gerenciais";
            }
        }  
    }//fim da classe
?>