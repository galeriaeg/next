<?php
	require_once("session.php");
	
	echo $idUserAtual = $_GET['u'];
	
	
	// conecat ao banco
	include ("conecta.php"); 
	
	
	
	$sql = "SELECT * FROM usuarios WHERE id='$idUserAtual' AND tipo='2'";
	$cons = $conexao->query($sql)or die($conexao->error);
	while($row = $cons->fetch_array()){
		$idu = $row['id'];
		$dataCadastrou = $row['dataCadastro'];
		$nomeu = $row['nome'];
		$cpfu = $row['cpf'];
		$emailu = $row['email'];
		$telefoneu = $row['telefone'];
		$celularu = $row['celular'];
		$loginu = $row['login'];
		$senhau = $row['senha'];
		$tipou = $row['tipo'];
		$logradourou = $row['logradouro'];
		$numerou = $row['numero'];
		$bairrou = $row['bairro'];
		$cidadeu = $row['cidade'];
		$estadou = $row['estado'];
		$cepu = $row['cep'];
		$fotou = $row['foto'];
		$ipu = $row['IP'];
		$termosUsoAceito = $row['termosUsoAceito'];
		$statusu = $row['status'];
	}
	
	
	
	if(empty($fotou)){
		$fotou = "../adm/imgs/sem-img.jpg";
	}
	else{
		$fotou = "../site/files/usuarios/".$fotou;
		}
		
		
	
	if($termosUsoAceito=="S"){
		$termosLabel = "SIM";
	}
	else{
		$termosLabel = "NÃO";
	}
?>





<legend><h3><?php echo $titulo; ?></h3></legend>

<img src="<?php echo $fotou; ?>" width="150" height="150" />
<table width="100%" border="0">
	<tr>
		<th width='auto' colspan="2" align='left' class='txt'>
			ID: <?php echo $idUserAtual; ?><br />
			<span style="font-size:1.5em"><?php echo $nomeu; ?></span><br />
			Ingressou em: <?php echo $dataCadastrou; ?><br />
			Login: <?php echo $loginu; ?>
		</th>
	</tr>
	
	<tr>
		<th width='15%' align='left' class='txt'>CPF: </th>
		<th width='auto' align='left' class='txt'><?php echo $cpfu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Email: </th>
		<th width='auto' align='left' class='txt'><?php echo $emailu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Telefone: </th>
		<th width='auto' align='left' class='txt'><?php echo $telefoneu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Celular: </th>
		<th width='auto' align='left' class='txt'><?php echo $celularu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Tipo: </th>
		<th width='auto' align='left' class='txt'><?php echo $tipou; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Logradouro: </th>
		<th width='auto' align='left' class='txt'><?php echo $logradourou; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>N&ordm;: </th>
		<th width='auto' align='left' class='txt'><?php echo $numerou; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Bairro: </th>
		<th width='auto' align='left' class='txt'><?php echo $bairrou; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Cidade: </th>
		<th width='auto' align='left' class='txt'>
			
			<?php 
				$sql = "SELECT CT_NOME FROM cidade WHERE CT_ID = '$cidadeu'";
				$cons = $conexao->query($sql)or die($conexao->error);
				while($row = $cons->fetch_array()){
					echo $cidadeLabel = utf8_encode ($row['CT_NOME']);
				}			
			?>
			
		</th>
	</tr>
	<tr>
		<th width='20%' align='left' class='txt'>Estado: </th>
		<th width='auto' align='left' class='txt'>
			<?php 
				$sql = "SELECT UF_NOME FROM estado WHERE UF_ID = '$estadou'";
				$cons = $conexao->query($sql)or die($conexao->error);
				while($row = $cons->fetch_array()){
					echo $estadoLabel = utf8_encode($row['UF_NOME']);
				}
			?>
		</th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>CEP: </th>
		<th width='auto' align='left' class='txt'><?php echo $cepu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>IP: </th>
		<th width='auto' align='left' class='txt'><?php echo $ipu; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Termos de uso foi aceito? </th>
		<th width='auto' align='left' class='txt'><?php echo $termosLabel; ?></th>
	</tr>
	<tr>
		<th width='15%' align='left' class='txt'>Status: </th>
		<th width='auto' align='left' class='txt'>
			
			<form action="painel.php?id=1.2.3" method="post" name="form">
				<select class="input" name="status">
					<?php
						if($statusu==0){
							echo "<option selected value='0'>Inativo</option>";
							echo "<option value='1'>Ativo</option>";
							echo "<option value='2'>Deletado</option>";
						}
						elseif($statusu==1){
							echo "<option value='0'>Inativo</option>";
							echo "<option selected value='1'>Ativo</option>";
							echo "<option value='2'>Deletado</option>";
						}
						else{
							echo "<option value='0'>Inativo</option>";
							echo "<option value='1'>Ativo</option>";
							echo "<option selected value='2'>Deletado</option>";
						}
					?>
				</select>
				<input type="submit" value="Cadastrar" class="input"/>
				<input type="button" value="Voltar" onClick="location.href='painel.php?id=1'"  class="input"/>
				<input type="hidden" value="<?php echo $idUserAtual; ?>" name="u" />
				<input type="hidden" value="1" name="notificacao" />
				<input type="hidden" value="<?php echo $nomeu; ?>" name="nome" />
				<input type="hidden" value="<?php echo $emailu; ?>" name="email" />
			</form>
			
			
		</th>
	</tr>
</table>



