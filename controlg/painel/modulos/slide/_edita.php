<?php
	include "session.php";
	
	$id	= $_GET['idSlide'];
	
	if($id==""){
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
	
	
	//Conecta ao banco
	include "../conecta.php"; 
	
	
	$sql = "SELECT * FROM slider WHERE id='$id'";
	$cons = $conexao->query($sql)or die($conexao->error);
	$total = mysqli_num_rows($cons); 
	while($row = $cons->fetch_array()){
		$id = $row['id'];
		$data = $row['data'];
		$foto_dsk = $row['foto'];
		$foto_mob = $row['foto_mini'];
		$link = $row['link'];
		$destino = $row['destino'];
		$status	= $row['status'];
	}	
	
	//verifica se ha imagem cadastrada p/ noticia selecionada
	//O fleg sera 0 quando nao existir imagem, e 1 se exitir 
	if($url===""){
		$fleg_foto = "Não há imagem anexada 
		<form action='index.php?id=2.1.3' method='POST'>
		<input type='hidden' value='$id' name='id' />
		<input type='image' src='imgs/href_anexar.png' style='float:left; margin-top:6px;' />
		</form>";
		$print = "hidden;";
		
	}
	else{
		$fleg_foto = "(1) imagem anexada";
		$print = "visible;";
	}
	
	
	
	// Redefine Destino
	if($destino!="_top"){
		$lista_destino = "
		<option value='_blank' selected='selected'>Nova janela</option>
		<option value='_top'>Mesma janela</option>";
	}
	else{
		$lista_destino= "
		<option value='_blank'>Nova janela</option>
		<option value='_top' selected='selected'>Mesma janela</option>";
	}
	
	
	
	// Redefine status
	if($status!=0){
		$lista_status = "
		<option value='1' selected='selected'>Ativo</option>
		<option value='0'>Inativo</option>";
	}
	else{
		$lista_status = "
		<option value='1'>Ativo</option>
		<option value='0' selected='selected'>Inativo</option>";
	}
	
?>


<script language="Javascript" type="text/javascript">
	function showHide (ID) {
		if (document.getElementById(ID).style.display == "none") {
			document.getElementById(ID).style.display= "";
		}
		else {
			document.getElementById(ID).style.display = "none";
		}
	}
</script>


<legend><h3><?php echo $titulo; ?></h3></legend>
<table id="boxImagens" border="0" style="margin-bottom:5px;">
	<tr>
		<td>
			<span class="txt">Imagem Desktop: </span>
		</td>
		<td style="width:40px;"></td>
		<td>
			<span class="txt">Imagem Mobile: </span>
		</td>
	</tr>
	<tr>
		<td style="vertical-align:top;">
			<?php
				if (empty($foto_dsk)){
					echo "<a href='#' onclick=\"showHide('up_dsk');\" style='cursor: pointer;'>";
					echo "<img src='imgs/upload.png' alt='botao-up' border='0' style='margin:3px 0'";
					echo "</a>";
				}
				else{
					echo "
					<a href='index.php?id=5.3&nomed=$foto_dsk&iddsk=$id'>
					<img src='imgs/btexclui.png' alt='botao-excluir' title='Excluir imagem' style='position:absolute;z-index:10;' border='0' />
					</a>
					<img src='files/$foto_dsk' class='inputQuebra' border='0' height='80' style='margin:1px 0 0 1px;padding:0;position:relative;z-index:5;' />
					";
				}
			?>
			
		</td>
		<td style="width:40px;"></td>
		<td style="vertical-align:top;">
			<?php
				if (empty($foto_mob)){
					echo "<a href='#' onclick=\"showHide('up_mob');\" style='cursor: pointer;'>";
					echo "<img src='imgs/uploadaz.png' alt='botao-up' border='0' style='margin:3px 0'";
					echo "</a>";
				}
				else{
					echo"
					<a href='index.php?id=5.3&nomem=$foto_mob&idmob=$id'>
					<img src='imgs/btexclui.png' alt='botao-excluir' title='Excluir imagem' style='position:absolute;z-index:10;' border='0' />
					</a>
					<img src='files/$foto_mob' class='inputQuebra' border='0' height='80' style='margin:1px 0 0 1px;padding:0;position:relative;z-index:5;'/>
					";
				}
			?>
		</td>
	</tr>
</table>


<div id="up_dsk" style="display:none;">

		<form name="formEdtSlide" enctype="multipart/form-data" action="index.php?id=5.4" method="POST" onSubmit="return edtSlide(this);">
			<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
			<input name="arquivo" type="file" accept="image/*" class="campo_m" style="background:#d8f5d0;border:1px solid #bbd7b4;"  />
			<input name="id_dsk" type="hidden" value="<?php echo $id; ?>" />
			<input type="submit"  value="Enviar" class="btn-simples"/>
		</form>

</div>


<div id="up_mob" style="display:none;">

		<form name="formEdtSlide" enctype="multipart/form-data" action="index.php?id=5.4" method="POST" onSubmit="return edtSlide(this);">
			<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
			<input name="arquivo" type="file" accept="image/*" class="campo_m" style="background:#d1def9;border:1px solid #bbc3dc;"  />
			<input name="id_mob" type="hidden" value="<?php echo $id; ?>" />
			<input type="submit"  value="Enviar"  class="btn-simples" />
		</form>     

</div>	


<form enctype="multipart/form-data" action="index.php?id=5.2.1" method="POST" onSubmit="return cadslider(this)">	
	
	<label>Link: </label>
	<input name="link" type="text"  class="campo_m" value="<?php echo "$link";?>" />
	
	<label>Destino:</label>
    <select name="destino" class="campo_p" >
		<?php echo $lista_destino; ?>
	</select>
    
	<label>Status:</label>
    <select name="status" class="campo_p" >
		<?php echo $lista_status; ?>
	</select>
	
	
	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit"/>
		<input type="button" value="Voltar" onClick="location.href='index.php?id=5'"  class="btn-back"/>
		 <input type="hidden" value="<?php echo $id; ?>" name="id" />
	</div>
	
   
</form>
