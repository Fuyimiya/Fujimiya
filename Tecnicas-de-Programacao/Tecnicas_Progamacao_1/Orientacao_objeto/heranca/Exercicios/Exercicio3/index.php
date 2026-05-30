<?php
require_once "classes/Agenda.php";
require_once "classes/Prestador.php";
require_once "classes/Servico.php";

// Criando objetos
$cliente = new Cliente("Josué", "14999999999", "123.456.789-00");

$prestador = new Prestador("Carlos", "14988888888", "Barbeiro");

$servico1 = new Servico("Corte de cabelo", 30);
$servico2 = new Servico("Barba", 20);

// Itens
$item1 = new Itens("10:00", "Ativo", $servico1, $prestador);
$item2 = new Itens("11:00", "Ativo", $servico2, $prestador);

// Agenda
$agenda = new Agenda("01/05/2026", $cliente);
$agenda->addItem($item1);
$agenda->addItem($item2);

// Exibição (sem var_dump)
echo "<pre>";
echo $agenda;
echo "</pre>";