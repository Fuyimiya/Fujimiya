<?php
	require_once "header.php";
?>
<div class="content">
<div class="container">
	<br><br><h1>Despesa</h1><br>
	<form action="#" method="post">
		<label for="categoria">Categoria:</label>
		<select name="categoria">
			<option value="0">Escolha a categoria da despesa</option>
			<?php
			foreach($categorias as $dado)
			{				
				echo "<option value='{$dado->id_categoria}'>{$dado->descritivo}</option>";
			
			}
			?>
		</select>
		
		<br><br>
		
		<label for="valor">Valor da Despesa:</label>
		<input type="text" name="valor" id="valor">
		
		<br><br>
		<label for="data_despesa">Data da Despesa:</label>
		<input type="date" name="data_despesa" id="data_despesa">
		
		<br><br>
		
		
		<br><br>
		<input type="submit" class="btn btn-primary">
	</form>
</div>
</div>

</body>
</html>