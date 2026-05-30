<?php
    require_once "Produto.class.php";
    require_once "Fornecedor.class.php";

    //um lado da relação
    //um fornecedor quais são os produtos que ele fornece
    $produto1 = new Produto("Produto1", 10.50);
    $produto2 = new Produto("Produto2", 55.40);

    $fornecedor = new Fornecedor("Empresa 1", 
                                "1111111111",
                                 array($produto1, $produto2)
                                 );
    /*echo "<pre>";
    var_dump($fornecedor);
    echo "</pre>";*/

    echo "Razão Social: {$fornecedor->getRazaoSocial()}<br>";
    echo "CNPJ: {$fornecedor->getCnpj()}<br>";
    echo "Produtos Fornecidos<br>";
    foreach($fornecedor->getProdutos() as $produto)
    {
        echo "Nome: {$produto->getNome()}<br>";
        echo "Preço: " . number_format($produto->getPreco(), 2, ",", ".") . "<br>";
    }

?>