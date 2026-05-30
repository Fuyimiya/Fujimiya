<?php
    require_once "Filme.class.php";
    require_once "Ator.class.php";
    require_once "Atuacao.class.php";
    //instanciar um objeto atuacao
    $ator = new Ator("Leonardo DiCaprio", "Americano");
    $filme = new Filme("Titanic", 1997);
    $atuacao = new Atuacao("Jack",$ator,  $filme);
    //mostrar os dados do objeto atuacao
    echo "Ator:{$atuacao->getAtor()->getNome()}<br>";
    echo "Nacionalidade:{$atuacao->getAtor()->getNacionalidade()}<br>";
    echo "Filme:{$atuacao->getFilme()->getTitulo()}<br>";
    echo "Ano:{$atuacao->getFilme()->getAno()}<br>";
    echo "Papel:{$atuacao->getPapel()}<br>";
?>