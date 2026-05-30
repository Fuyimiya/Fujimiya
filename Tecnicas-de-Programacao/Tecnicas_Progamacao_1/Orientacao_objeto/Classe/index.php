<?php
require_once "Produto.class.php";
require_once "Produto2.class.php";
require_once "Produto3.class.php";
//usa o construtor padrão da linguagem PHP

$produto1 = new Produto();
//atribuindo valores para os atributos da classe produto
$produto1->nome = "Lápis";
$produto1->preco = 0.50;
//usando o construtor definido na classe
//passando parâmetros por valor(Seguir a ordem de definição do método construtor)
$produto2 = new Produto2("Caderno", 25.40);
//passando parâmetros por referência (Não precisa usar a sequência definida no construtor)
$produto3 = new Produto2(preco:12.50, nome:"Borracha");
//mostrar dados estão no objeto
echo "Objeto - Produto1 - {$produto1->nome}<br>";
echo "Objeto - Produto2 - {$produto2->nome}<br>";

$produto3->Exibir();
$produto2->Exibir();
//classe Produto 3
//criamos um objeto da classe Produto3, que os atributos são privados e métodos públicos
$produto4 = new Produto3("Agenda", 50);
//acessou o valor do atributo nome por meio de um método get,
//  porque o atributo é privado
//  e não pode ser acessado fora da classe
echo $produto4->getNome() . "<br>";
//solicitou a alteração do valor do atributo nome 
// por meio de um método set,
//  porque o atributo é privado
//  e não pode ser acessado fora da classe
$produto4->setNome("Agenda 2026");
$produto4->setPreco(100);
//concatenação
echo $produto4->getNome(). "<br>";
//interpolação
echo "Nome do Produto:{$produto4->getNome()} - Preço:{$produto4->getPreco()}<br>";



/*echo "<pre>";
    var_dump($produto2);
echo "</pre>";

echo "<pre>";
    var_dump($produto3);
echo "</pre>";*/
/*
echo "<pre>";
    var_dump($produto1);
echo "</pre>";*/
?>