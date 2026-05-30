<?php
    require_once "Cliente.class.php";
    require_once "Celular.class.php";

    //instanciar um objeto cliente(todo)
    $cliente = new Cliente("Maria da Silva", 
                            "111111111", 
                            array(), 
                            14, 
                            "9999999");
    $cliente->setCelular(17, "9888888");   
    
    echo "CLIENTE<br>";
    echo "Nome: {$cliente->getNome()}<br>";
    echo "CPF: {$cliente->getCpf()}<br>";
    echo "CELULARES<br>";
    foreach($cliente->getCelulares() as $celular){
        echo "({$celular->getDdd()}) {$celular->getNumero()}<br>";
    }

    //instanciar um objeto Celular (Parte).
    $cliente2  = new Cliente("João da Silva", "22222222");
    $celular = new Celular(14, "98777777", $cliente2 );

    echo "<br>CELULAR<br>";
    echo "({$celular->getDdd()}) {$celular->getNumero()}<br>";
    echo "CLIENTE<br>";
    echo "Nome:{$celular->getCliente()->getNome()}<br>";
    echo "CPF:{$celular->getCliente()->getCpf()}<br>";
?>