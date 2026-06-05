<?php
// Cabeçalhos anti-cache (mesma abordagem do logout.php)
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

session_start();

if (!isset($_SESSION['loginUsuarioLogado']) || !isset($_SESSION['tipoUsuarioLogado'])) {
	session_unset();
	session_destroy();
	header("Location: ../index.php?err=sim");
	exit();
}
