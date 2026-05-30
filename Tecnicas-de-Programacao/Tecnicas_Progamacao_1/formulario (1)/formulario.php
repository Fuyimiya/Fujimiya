<?php   
    
    if($_GET)
    {
    //if($GET['nome'] == "")
    if(empty($GET['nome']))
    {
        echo "Você não preencheu seu nome";
    }
    else
    {
        echo "<h1 style='color:blue;'>Nome: {$GET['nome']}<br></h1>";
    }
    
    echo "<h1>CPF: " . $_GET['cpf'] . "</h1>";
    if(!isset($_GET["genero"]))
    {
        echo "Escolha um gênero";
    }
    else
    {
        echo $_GET["genero"];
    }
    }
    else
    {
        header("location:index.html");
    
    }
?>
