<script src="js/files.js"></script>
<link rel="stylesheet" href="css/files.css" />

<label>Anexo:</label>
<div class="col12">
  <a id="btn-anexar" class="btn-anexar" onclick="abreFechaModalFiles(1)"><i class="fa fa-paperclip" aria-hidden="true"></i>&nbsp; Anexar Imagem</a>
  <div class="box-file" id="box-file" style="display:none;">
    <i class="fa fa-check" aria-hidden="true"></i>
    Imagem anexada (<i id="legenda"></i>)
    <div class="btn-remove" onclick='removerAnexo();'>&#10006;</div>
  </div>
  <input type="hidden" name="id_arquivo" id="id_arquivo" />
</div>


<!--importa modulo Files -->
<?php include_once "modal.php"; ?>

<!--importa modulo Files -->