<?php
// ================================
// IMPORTAÇÃO DAS CLASSES
// ================================
require_once 'Pessoa.php';
require_once 'Proprietario.php';
require_once 'Shopping.php';
require_once 'Loja.php';
require_once 'Condominio.php';

// ================================
// INSTÂNCIAS (OBJETOS)
// ================================

// Criando um proprietário
$proprietario = new Proprietario("Carlos Silva", "123.456.789-00");

// Criando um shopping
$shopping = new Shopping("Jaú Shopping", "12.345.678/0001-99");

// Criando lojas
$loja1 = new Loja(3, "A01");
$loja2 = new Loja(5, "B12");

// Adicionando lojas ao shopping (composição)
$shopping->addLoja($loja1);
$shopping->addLoja($loja2);

// Criando um condomínio associado a uma loja
$condominio = new Condominio("05/05/2026", 1200.50, "10/05/2026", $loja1);

// ================================
// SAÍDA DE DADOS (SEM VAR_DUMP)
// ================================

echo "<h2>=== DADOS DO CONDOMÍNIO ===</h2>";
$condominio->exibirDados();

echo "<hr>";

echo "<h2>=== DADOS DO SHOPPING ===</h2>";
echo "Nome: " . $shopping->getNome() . "<br>";
echo "CNPJ: " . $shopping->getCnpj() . "<br>";

echo "<h3>Lojas:</h3>";
foreach ($shopping->getLojas() as $loja) {
    echo "Número: " . $loja->getNumero() . " | Lotes: " . $loja->getLotes() . "<br>";
}

echo "<hr>";

echo "<h2>=== PROPRIETÁRIO ===</h2>";
echo "Nome: " . $proprietario->getNome() . "<br>";
echo "CPF: " . $proprietario->getCpf() . "<br>";
?>