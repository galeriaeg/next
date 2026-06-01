<?php
	require_once("session.php");
	
	$idUserAtual = $_POST['u'];	
	$status = $_POST['status'];
	$nomeUser = $_POST['nome'];
	$emailUser = $_POST['email'];
	
	if($status==0){
		$statusLabel = "<b>Desativada</b>";
		}
	elseif($status==1){
		$statusLabel = "<b>Ativada</b>";
		}
	else{
		$statusLabel = "<b>Deletada</b>";
		}
	
	
	echo"<h3>". $titulo ."</h3>";
	
	include ("conecta.php"); 
	$sql = "UPDATE usuarios SET status='$status' WHERE id = '$idUserAtual' ";
	$update = mysqli_query($conexao, $sql);
	
	
	if($update>0){
		// ENVIA EMAIL AO USUARIO
		include("send-notificacao.php");
	}

	
	mysqli_close($conexao);
	
?>


