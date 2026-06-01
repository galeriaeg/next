<?php
session_start();
session_unset();
session_destroy();

unset($_SESSION['login']);
unset($_SESSION['senha']);

echo"<script>window.location.href='../index.php'</script>";
//header('location:index.php');


include_once ("conecta.php");

mysqli_close($conexao); 

?>