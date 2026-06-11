<?php
include "session.php";

$idmarca = $_GET['m'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>
<!-- Cropper.js CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>

<form action="index.php?id=6.1.1" enctype="multipart/form-data" method="POST" name="formFonte" onSubmit="return fonte(this)">

	<legend>
		<h3><?php echo $titulo; ?></h3>
	</legend>

	<label>Marca:</label>
	<select class="campo_p" required name="marca" onChange="MM_jumpMenu('parent',this,1)">
		<option value="" selected disabled>Selecione uma marca...</option>
		<?php
		$sql = "SELECT * FROM tb_marca ";
		$res = mysqli_query($conexao, $sql);
		while ($row = mysqli_fetch_array($res)) {
			$id_marca = $row['id'];
			$nome_marca = $row['nome'];
			$logomarca_marca = $row['logomarca'];
			if ($idmarca == $id_marca)
				echo "<option selected value='$id_marca'>$nome_marca</option>";
			else
				echo "<option value='$id_marca'>$nome_marca</option>";
		}
		?>
	</select>

	<label>Linha:</label>
	<select class="campo_p" required name="linha">
		<?php
		$q = "SELECT * FROM tb_linha WHERE idmarca='$idmarca' ";
		$r = mysqli_query($conexao, $q);
		while ($row = mysqli_fetch_array($r)) {
			$id_linha = $row['id'];
			$titulo_linha = $row['titulo'];
			$idmarca_linha = $row['idmarca'];
			echo "<option value='$id_linha'>$titulo_linha</option>";
		}
		?>
	</select>

	<label>Título:</label>
	<input name="titulo" required type="text" class="campo_m" />

	<label>Descrição:</label>
	<textarea name="descricao" required class="campo_m" rows="15"></textarea>

	<label>Anexo:</label>
	<!--Ratio para produto 16:10-->
	<input type="file" name="arquivo" id="anexo" class="campo_m" accept="image/*" onchange="abreAnexo(this,16/10)" />
	<input type="hidden" name="imagem_cropada" id="imagem_cropada" />

	<!-- Preview da imagem -->
	<span id="box-anexo" class="box-anexo" style="display:none;">
		<img src="imgs/btn-excluir-axeno.png" alt="anexo" onclick="fechaAnexo();" style="position:absolute;cursor:pointer;" />
		<img id="view" class="anexo-noticia" />
	</span>

	<label>Status:</label>
	<select required name="status" class="campo_p">
		<option value="1">Ativo</option>
		<option value="0">Inativo</option>
	</select>

	<div class="box-botons">
		<input type="submit" value="Cadastrar" class="btn-submit" />
		<input type="button" value="Voltar" onClick="location.href='index.php?id=6'" class="btn-back" />
	</div>

</form>


<!-- Modal de crop -->
<div id="modal-crop" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%;
     background:rgba(0,0,0,0.8); z-index:9999; justify-content:center; align-items:center;">
	<div style="background:#fff; padding:20px; border-radius:8px; max-width:700px; width:90%;">
		<h3 style="margin-bottom:10px;">Ajustar imagem</h3>
		<div style="max-height:450px; overflow:hidden;">
			<img id="imagem-crop" style="max-width:100%;" />
		</div>
		<div style="margin-top:15px; text-align:right; gap:10px; display:flex; justify-content:flex-end;">
			<button type="button" onclick="cancelarCrop()"
				style="padding:8px 16px; cursor:pointer;">Cancelar</button>
			<button type="button" onclick="confirmarCrop()"
				style="padding:8px 16px; background:#2e7d32; color:#fff; border:none; 
                       border-radius:4px; cursor:pointer;">Confirmar corte</button>
		</div>
	</div>
</div>

<script src="js/cropper.js"></script>
<script language="JavaScript">
	function MM_jumpMenu(targ, selObj, restore) {
		// Pega o valor da opção selecionada (ex: "1", "2", etc.)
		const valorSelecionado = selObj.options[selObj.selectedIndex].value;
		// Se o usuário clicar na opção vazia/padrão, não faz nada
		if (!valorSelecionado) return;
		// Monta a URL dinâmica com o ID fixo e a marca selecionada
		const novaUrl = "index.php?id=6.1&m=" + valorSelecionado;
		// Faz o redirecionamento de forma limpa e segura
		if (targ === 'parent') {
			window.parent.location.href = novaUrl;
		} else {
			window.location.href = novaUrl;
		}
		// Reseta o select para a posição inicial se o restore for verdadeiro
		if (restore) selObj.selectedIndex = 0;
	}
</script>