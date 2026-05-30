<?php
require_once "Telefone.php";
require_once "Pessoa.php";
require_once "Chef.php";
require_once "Avaliador.php";
require_once "Receita.php";
require_once "Avaliacao.php";

$avaliador = new Avaliador("João Silva", "123.456.789-00");
$avaliador->addTelefone(new Telefone(14, "99999-1111"));

$chef = new Chef("Carlos Chef", "Massas");
$chef->addTelefone(new Telefone(14, "98888-2222"));

$receita = new Receita("Lasanha", "Massa, queijo, molho");
$chef->addReceita($receita);

$avaliacao = new Avaliacao(9.5, $avaliador, $receita);

echo "=== AVALIAÇÃO ===\n";
echo "Nota: " . $avaliacao->getNota() . "\n";

echo "\n--- Avaliador ---\n";
echo "Nome: " . $avaliacao->getAvaliador()->getNome() . "\n";
echo "CPF: " . $avaliacao->getAvaliador()->getCpf() . "\n";

foreach ($avaliacao->getAvaliador()->getTelefones() as $tel) {
    echo "Telefone: (" . $tel->getDdd() . ") " . $tel->getNumero() . "\n";
}

echo "\n--- Receita ---\n";
echo "Nome: " . $avaliacao->getReceita()->getNome() . "\n";
echo "Ingredientes: " . $avaliacao->getReceita()->getIngredientes() . "\n";