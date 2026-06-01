<?php
	session_start();

	//session_cache_expire(20);
	

	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		echo "<script>window.location.href='../index.php';</script>";
		exit();
	}
	else{
        //echo "<i style='background:#B8FF9C;'>SESSAO ATIVA</i>";
	}
	
?>