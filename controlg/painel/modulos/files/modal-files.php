<?php
include "session.php";
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');
?>

<section id="modal-files" class="modal-files" style="display:none;">
  <div class="col12"><span class="alink" onclick="abreFechaModalFiles(0)">Fechar</span></div>
  <div class="iframe-files">
    <?php
    $sql = "SELECT * FROM tb_files ORDER BY id DESC";
    $cons = $conexao->query($sql) or die($conexao->error);
    while ($row = $cons->fetch_array()) {
      $idFile =   $row['id'];
      $imagemFile  =  $row['imagem'];
      $nomeFile  =  $row['nome'];

      $idFile = "file" . $idFile;

      echo "<div class='card-file'>
			<div style='background-image: url(\"files/$imagemFile\");' title='$nomeFile'></div>
				<i>
					<button onclick='anexarFile(\"$idFile\",\"$imagemFile\",\"$nomeFile\");'>Selecionar</button>
				</i>
		</div>";
    }
    ?>
  </div>
</section>