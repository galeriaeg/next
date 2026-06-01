<h3><?php  echo $titulo; ?></h3>

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

<a onclick="showHide('Artistic');" style="cursor: pointer;">
<img src="imgs/up.png" width="30" style="margin:0 5px 7px 0 " align="absmiddle" /><span class="txtk">Enviar arquivo</span>
</a>
<div id="Artistic" style="display:none;">

<div class="cx_file" style="width:97%; height:85px; padding:12px; margin-top:0px; margin-bottom:12px;  border:1px solid #AAA; float:left; display:block;">
		<form enctype="multipart/form-data" action="painel.php?id=9.1" method="POST">
    		<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
            <span class="txt">Arquivo: </span><input name="arquivo" type="file" accept="image/*" style="border:1px solid #ccc; padding:4px;"/><br />

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="txt">Link: </span>
            <input name="link" type="text" style="width:400px;padding:4px;" value="http://" />
            <span class="txt">&nbsp;&nbsp;Destino:</span>
            <select name="destino" style="padding:4px;">
                <option value="_top">Mesma janela</option>
        		<option value="_blank">Nova janela</option> 
            </select>
            
    		&nbsp;&nbsp;<input type="submit"  value="Enviar anexo" style="padding:4px 12px;"/>
            
		</form>
	</div>
</div>



<?php
//inicia sessao
include ("session.php");

// conecat ao banco
include ("conecta.php");

$pathab = "localhost/control_g/";
$path = "files/";



//botes editar e excluir	
	$btedita ="
	<form action='painel.php?id=2.2' method='post'>
		<input type='image' src='imgs/btedita_off.png' class='btedita' />
		<input type='hidden' value='$id' name='id'/>
	</form>	
	";
	
	$btexclui ="
	<form action='painel.php?id=2.3' method='post'>
		<input type='image' src='imgs/btexclui_off.png' class='btexclui' />
		<input type='hidden' value='$id' name='id'/>
	</form>	
	";	




//consulta o DB//Lista todos os resultados
$result = mysql_query("SELECT * FROM slider  order by id desc") or die(mysql_error());
echo "<div style='width:auto;height:280px;overflow:auto; border:1px solid #999999; font-size:12px; padding:10px;'>";

echo "
	<table width='100%' border='0'>
  	<tr class='tr'>
    <th width='20%' align='left' class='th'>IMAGEM</th>
    <th width='51%' align='left' class='th'>LINK</th>
    <th width='10%' align='left' class='th'>DESTINO</th>
 	<th width='10%' align='left' class='th'>STATUS</th>
    <th width='9%' align='left' class='th'>A&Ccedil;&Otilde;ES</th>
  	</tr>";


while($row = mysql_fetch_array( $result )) {
	$id				= 	$row['id'];
	$url_img		=	$row['url'];
	$url_img_dir	= 	$path.$url_img;
	//$url_abs		= 	$pathab.$url_img;	
	$link			=	$row['link'];
	$destino		=	$row['destino'];
	$status			=	$row['status'];


	
	echo "
	
  <tr class='txt'>
    <th width='20%' align='left' class='txt'><img src='$url_img_dir' width='270px'  align='middle' style='margin:5px;float:left;clear:left;'></th>
    <th width='51%' align='left' class='txt'>$link</th>
    <th width='10%' align='left' class='txt'>$destino</th>
	<th width='10%' align='left' class='txt'>$status</th>
    <th width='9%' align='left' class='txt'>$btedita $btexclui</th>
  </tr>";	
}

	echo "</table>";
	
	echo "</div>";
?>
