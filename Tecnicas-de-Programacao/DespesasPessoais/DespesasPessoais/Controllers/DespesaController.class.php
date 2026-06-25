<?php
    require_once "Models/Conexao.class.php";
    require_once "Models/Categoria.class.php";
    require_once "Models/CategoriaDAO.class.php";
    require_once "Models/Despesa.class.php";
    require_once "Models/DespesaDAO.class.php";

    class DespesaController{
        public function listar(){
            $despesasDAO = new DespesaDAO();
            $retorno = $despesasDAO->buscarTodasDespesas();
            require_once "Views/listar_despesas.php";
        }//fim do listar
        public function inserir(){
            $msg = array("","","");
            $erro = false;
            if($_POST)
            {
                if($_POST["categoria"] == "0"){
                    $msg[0] = "Escolha a categoria da despesa";
                    $erro = true;
                }
                if(empty($_POST["valor"]) || $_POST["valor"] <= 0){
                    $msg[1] = "Valor inválido";
                    $erro = true;
                }
                if(empty($_POST["data_despesa"])){
                    $msg[2] = "Preencha a data da despesa";
                    $erro = true;
                }
                if(!$erro)
                {
                    $categoria = new Categoria($_POST["categoria"]);
                    $despesa = new Despesa(0, $_POST["valor"], $_POST["data_despesa"], $categoria);
                    $despesaDAO = new DespesaDAO();
                    $retorno = $despesaDAO->cadastrar($despesa);
                    header("location:index.php?controle=DespesaController&metodo=listar");
                    die();
                }

            }
            $categoriaDAO  = new CategoriaDAO();
            $categorias = $categoriaDAO->buscarTodasCategorias();
            require_once "Views/form_despesa.php";
        }
        public function dados_gerenciais(){
            $despesasDAO = new DespesaDAO();
            $retorno = $despesasDAO->buscar_dados_gerenciais();
            require_once "Views/dados_gerenciais_despesas.php";
        }
    }//fim da classe
?>