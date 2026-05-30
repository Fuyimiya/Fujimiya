<?php
	// Forma 1: echo "O nome é " . $_GET["nome"] . "<br>";
	echo "O nome é {$_GET["nome"]}<br><br>";
	// Forma 2:
	echo "O e-mail é {$_GET["email"]}<br><br>";
	
	echo "A profissão é {$_GET["profissao"]}<br><br>";
	
	if(isset($_GET["sexo"]))
	{
		echo "Genero: {$_GET["sexo"]}<br><br>";
	}
	else
	{
		echo "Gênero não foi informado<br>";
	}
	// Verificando lazer
	$marcou = false;
	echo "Lazer(es):<br><br>";
	if(isset($_GET["lazer1"]))
	{
		echo "{$_GET["lazer1"]}<br><br>";
		$marcou = true;
	}
	if(isset($_GET["lazer2"]))
	{
		echo "{$_GET["lazer2"]}<br><br>";
		$marcou = true;
	}
	if(isset($_GET["lazer3"]))
	{
		echo "{$_GET["lazer3"]}<br><br>";
		$marcou = true;
	}
	
	// Duas formas:
	// if($marcou == false)
	if(!$marcou)
	{
		echo "Não possui Lazer(es)<br><br>";
	}
	
	if(empty($_GET["observacao"]))
	{
		echo "Não há observações";
	}
	else
	{
		echo "Observação: {$_GET["observacao"]}<br>";
	}
?>