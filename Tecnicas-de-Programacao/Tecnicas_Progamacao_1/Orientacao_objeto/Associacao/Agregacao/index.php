<?php
    require_once "Produto.class.php";
    require_once "Categoria.class.php";

    $categoria1 = new Categoria("Material Escolar");
    $categoria2 = new Categoria("Material de Escritório");
    $produto1  = new Produto(
        "Caneta", 2.50, array($categoria1, $categoria2));
    $categoria3 = new Categoria("Material de Desenho");
    $produto1->setCategoria($categoria3);

    $produto2 = new Produto("Caderno", 20.00, array($categoria1));

    //mostrar tudo de produto 1
    echo "PRODUTO 1<br>";
    echo "Nome: {$produto1->getNome()}<br>";
    echo "Preço:" . 
    number_format($produto1->getPreco(), 2, ",", ".") . "<br>";
    echo "CATEGORIAS DO PRODUTO<br>";
    foreach($produto1->getCategorias() as $categoria)
    {
        echo "{$categoria->getDescritivo()}<br>";
    }
    echo "<br>PRODUTO 2<br>";
    echo "Nome: {$produto2->getNome()}<br>";
    echo "Preço:" . 
    number_format($produto2->getPreco(), 2, ",", ".") . "<br>";
    echo "CATEGORIAS DO PRODUTO<br>";
    foreach($produto2->getCategorias() as $categoria)
    {
        echo "{$categoria->getDescritivo()}<br>";
    }
?>
