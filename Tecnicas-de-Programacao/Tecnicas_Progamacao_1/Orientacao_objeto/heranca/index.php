<?php
    //na herança sempre fazer o require da classe (pai)Genérica 
    // antes das classe (filhas) específicas
    require_once "Conta.class.php";
    require_once "Corrente.class.php";
    require_once "Poupanca.class.php";

    $conta1 = new Conta(1,"123-2", "12345-67", 1000);
    /*echo "<pre>";
    var_dump($conta1);
    echo "</pre>";*/
    //não pode acessar atributos da classe conta porque são protegidos
    //echo $conta1->banco; //dá erro
    echo $conta1->getBanco() . "<br>";

    $corrente1 = new Corrente(500, 1, "345-1", "54321-87", 1500);
    /*echo "<pre>";
    var_dump($corrente1);
    echo "</pre>";*/

    echo $corrente1->getSaldo() . "<br>";
    $retorno = $corrente1->Depositar(2.50);
    
    if(is_string($retorno))
    {
        echo "{$retorno}<br>";
    }
    else
    {
        
        echo number_format($retorno , 2 , "," , ".") . "<br>";
    }
    
?>