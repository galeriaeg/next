<?php include "session.php"; ?>

<script type="text/javascript" src="js/global.js"></script>

<form action="index.php?id=10.1.1" enctype="multipart/form-data" method="POST" name="formArea" onSubmit="return area(this)"> 
	
	<legend><h3><?php echo $titulo; ?></h3></legend>
	
	<label>Marca:</label>
	<select  class="campo_p" name="marca">
		<option disabled selected>Marcas</option>
		<?php
			include "../conecta.php"; 
			$sql = "SELECT * FROM marca WHERE status=1";
			$res = mysqli_query($conexao, $sql);
			while ($row = mysqli_fetch_array($res)) { 
				$id_marca = $row['id'];
				$nome_marca = $row['nome'];
				
				if($idmarca==$id_marca)
				echo "<option selected value='$id_marca'>$nome_marca</option>";
				else
				echo "<option value='$id_marca'>$nome_marca</option>";
			}
		?>
	</select>	
	
	<label>Legenda:</label>
	<input name="legenda" type="text" class="campo_p"  />
	
	<label>Obs:</label>
	<textarea name="obs" rows="5" class="campo_p" ></textarea>	
	
	<label>Anexo:</label>
	<input name="arquivo" type="file" class="campo_p"  />
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=10'"  class="btn-back"/>
	</div>
	
</form>
