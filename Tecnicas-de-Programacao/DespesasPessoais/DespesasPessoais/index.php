<?php
   if($_GET)
   {
        $controle = $_GET["controle"];
        $metodo = $_GET["metodo"];
        require_once "Controllers/{$controle}.class.php";
        $obj = new $controle();
        $obj->$metodo();
   }
   else
   {
      //incluindo a classe inicioController que está na pasta Controllers
    require_once "Controllers/inicioController.class.php";
    //criando um objeto usando o modelo (classe) inicioController na memória
    $obj = new inicioController();
    $obj->inicio();
   }
    
?>