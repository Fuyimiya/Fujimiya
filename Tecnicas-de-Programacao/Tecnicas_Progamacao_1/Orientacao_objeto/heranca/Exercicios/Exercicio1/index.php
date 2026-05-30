
<?php
    require_once "Pessoa.class.php";
    require_once "Cliente.class.php";
    require_once "Contratado.class.php";
    require_once "Festa.class.php";
    require_once "Decoracao.class.php";
    require_once "Telefone.class.php";

    //instanciando um objeto cliente para poder instanciar festa
    //o array em branco é referente a associação dentro de cliente (telefone)
    //como não importa agora, colocamos o array em branco
    $cliente = new Cliente("11111111111", "Maria da Silva", array(), 14, "9999999999");

    //instanciando um objeto contratado para poder instanciar festa
    //o array em branco é referente a associação dentro de contratado (festa e telefone)
    $contratado = new Contratado("22222222222", array(), "Festas Alegria", array(), 14, "9888888888");

    //instanciando um objeto decoracao para poder instanciar festa
    $decoracao = new Decoracao("Rei Leão");


    //instanciando um objeto de Festa
    $festa = new Festa("10/04/2026", "15/06/2026", "5000", $cliente, $contratado, $decoracao);

    //mostrar dados do objeto festa
    echo "FESTA<br>";
    echo "Data do Contrato: {$festa->getData_contrato()}<br>";
    echo "Data da Festa: {$festa->getData_festa()}<br>";
    echo "Valor: R$ . number_format($festa->getValor(), 2, ",", ".") . <br>";

    echo "CLIENTE<br>";
    echo "Nome: {$festa->getCliente()->getNome()}<br>";
    echo "CPF: {$festa->getCliente()->getCpf()}<br>";
    //telefone pode ser um array, então faremos foreach para pegar todos
    foreach($festa->getTelefones() as $telefone){
        echo "({$telefone->getDdd()}) {$telefone->getNumero()}";
    }

    echo "CONTRATADO<br>";
    echo "Nome: {$festa->getContratado()->getNome()}<br>";
    echo "CNPJ: {$festa->getContratado()->getCnpj()}<br>";
    //telefone pode ser um array, então faremos foreach para pegar todos
    foreach($festa->getTelefones() as $telefone){
        echo "({$telefone->getDdd()}) {$telefone->getNumero()}";
    }

    echo "DECORAÇÃO<br>";
    echo "{$festa->getDecoracao()->getDescritivo()}<br>";
?>