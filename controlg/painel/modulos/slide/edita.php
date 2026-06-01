<?php
	include "session.php";
	
	$id	= $_GET['idSlide'];
	
	if(empty($id)){
		echo "<script>window.location = 'logout.php'</script>";
		exit();
	}
	
	
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
					echo "<img src='imgs/no-slide-desk.jpg' height='50px' style='float:left;clear:left;'>";
                    echo "<img src='imgs/botao-upload.png' onclick=\"javascript: altera_display('div01');setarTipo(1);\"  style='margin-left:4px;cursor:pointer'>";
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
					echo "<img src='imgs/no-slide-mob.jpg' height='50px' align='middle' style='float:left;clear:left;'>";
					echo "<img src='imgs/botao-upload.png' onclick=\"javascript: altera_display('div01');setarTipo(2);\"  style='margin-left:4px;cursor:pointer'>";
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


<section id='div01' style="display:none;z-index:100" class="box-center">
	<img src="imgs/bt_x.jpg" onclick="javascript: altera_display('div01');" class="btn-fecha-pop" />
	<span class="txt">UPLOAD: <i id="tipoup"></i></span><br>
	<form name="formEdtSlide" enctype="multipart/form-data" action="index.php?id=5.4" method="POST" onSubmit="return edtSlide(this);">
		<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
		<input name="arquivo" type="file" accept="image/*" style="width:100%;padding:4px;background:aliceblue;margin-bottom:10px;" />
		<input name="" type="hidden" id="tipoUpload" value="<?php echo $id; ?>" />
		<input type="submit"  value="Enviar" />
	</form>
</section>


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


<script>
    function setarTipo(v){
		//alert(v);
		if(v==1){
			document.getElementById('tipoup').innerHTML = 'Desk';
			document.getElementById('tipoUpload').name = 'id_dsk';	
		}
		else{
			document.getElementById('tipoup').innerHTML = 'Mob';
			document.getElementById('tipoUpload').name = 'id_mob';	
		}
	}
</script>
