<?php
    require_once "header.php";
?>
<div class="content">
<div class="container">

<br>
<h1>Dados Gerenciais</h1>
</br></br>
<table class="table table-striped">
    <tr>
        <th>Categoria</th>
        <th>Total de Despesas</th>
		<th>Média</th>
		<th>%</th>
    </tr>
    <?php
	$total_geral = 0;
	//para calcular o valor total de despesas
	foreach($retorno as $dado){
		$total_geral += $dado->total_despesas;
	}
	
	foreach($retorno as $dado){
			echo "<tr>";
			echo "<td>{$dado->descritivo}</td>";
			$perc = $dado->total_despesas * 100 / $total_geral;
			echo "<td>" . number_format($dado->total_despesas, 2, ",",".") . "</td>";
			echo "<td>" . number_format($dado->media_despesas, 2, ",",".") . "</td>";
			echo "<td>" . number_format($perc, 2, ",",".") . "</td>";
		}
	?>
</table>
</div>
</div>
</body>
</html>