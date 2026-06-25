<?php
    require_once "header.php";
?>
<div class="content">
<div class="container">

<br>
<a href="index.php?controle=DespesaController&metodo=inserir" 
        class="btn btn-primary">Nova Despesa</a>
</br></br>
<table class="table table-striped">
    <tr>
        <th>Categoria</th>
        <th>Valor</th>
		<th>Data da Despesa</th>
    </tr>
    <?php
		foreach($retorno as $dado){
			echo "<tr>";
			echo "<td>{$dado->descritivo}</td>";
			echo "<td>" . number_format($dado->valor,2,",",".") . "</td>";
			$data = new DateTime($dado->data_despesa);
    		echo "<td>{$data->format('d/m/Y')}</td>";
			echo "</tr>";
		}
	?>
</table>
</div>
</div>
</body>
</html>