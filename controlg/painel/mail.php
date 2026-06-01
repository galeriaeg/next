<?php

$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['fone'];
$estado = $_POST['uf'];
$cidade = $_POST['cidade'];
$mensagem = $_POST['mensagem'];
$newsletter = $_POST['newsletter'];


if(empty($nome)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();	
}
if(empty($email)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();	
}
if(empty($telefone)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();		
}
if(empty($estado)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();		
}
if(empty($cidade)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();	
}
if(empty($mensagem)){
    echo "<script>alert('Preencha todos os campos.');</script>";
	echo "<script>window.history.back();</script>";
	exit();		
}

$captchaAdd = $_POST['captchaAdd'];
$captchaRan = $_POST['captchaRan'];

if($captchaAdd <> $captchaRan){
	echo "<script>
	alert('Erro! Código incorreto.');
	window.history.back();
	</script>";
	exit();
}


date_default_timezone_set("America/New_York");
$data  = date("d/m/Y");


include("controlg/conecta.php"); 
   
//grava email na base   
if($newsletter=="on"){

	$sql = "SELECT email FROM newsletter WHERE email ='$email' ";
	$res = mysqli_query($conexao, $sql);
    $total = mysqli_num_rows($res);
    
    if($total<1){
        $sql="INSERT INTO newsletter(nome,email,telefone,dataCadastro)
		VALUES ('$nome','$email','$telefone','$data')";
		$conf = $conexao->query($sql)or die ($conexao->error);	    
    }
 
 }
 
 //pegado usuario  para envio
$sql = "SELECT email FROM contatos WHERE tipo ='default' ";
$res = mysqli_query($conexao, $sql);
while ($row = mysqli_fetch_array($res)){
    $emailFrom = $row['email'];
}
 

$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $emailFrom\r\n"; // remetente
$headers .= "Return-Path: $emailFrom\r\n"; // return-path
$mss = "
  <img src='https://bsimagem.com/img/logobs-mail.png' alt='logomarca' style='margin:15px 0;' />
  <hr />
  <div style='line-height:25px;font:normal;font-size:15px;'>
  <b>Nome:</b> $nome<br />
  <b>Email:</b> $email<br />
  <b>Telefone:</b> $telefone<br />
  <b>Estado:</b> $estado<br />
  <b>Cidade:</b> $cidade<br />
  <b>Mensagem:</b><br />$mensagem
  <br /><br />
    <hr />
    <div style='font-size:13px;margin:20px 0;float:left'>BS Imagem - Av Industrial Gil Martins, 3037, Cidade Nova - Teresina-PI, 64017-650</div>
</div>
";

$envio = mail("$emailFrom", "Contato via site", $mss, $headers);

	if($envio){
		echo "<script>window.location.href='contato?send=true';</script>";
		exit();
	}
	else{
		echo "<script>window.location.href='contato?send=false';</script>";
		exit();
	}


?>
