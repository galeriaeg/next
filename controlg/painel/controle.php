<?php

//captura usuario da sessao;
$idUserSession =  $_SESSION['idu'];

if($idUserAtual != $idUserSession){
	//echo $idUserAtual." &#8800; ".$idUserSession."<br>" ;
	echo "<span class='box-erro'><strong class='icon-erro'>&#10006;	</strong> Erro! Você não pode editar este usuário &nbsp; &nbsp; &nbsp; <a class='txtk' href='index.php?id=2'>Voltar</a></span>";
	exit();
}
else{
	//echo "Ok! Você tem permissão";
}

?>