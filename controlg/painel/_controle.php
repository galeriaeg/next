<?php

//captura usuario da sessao;
$idUserSession =  $_SESSION['idu'];

if ($idUserAtual != $idUserSession) {
	echo header("Location: index.php?id=0");
	exit();
} else {
	//echo "Ok! Você tem permissão";
}
