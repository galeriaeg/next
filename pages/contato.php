<?php
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='4' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $tipo = $row['tipo'];
}
?>
<section>
  <div class="label-page">
    <h3><?php echo $pagina; ?></h3>
  </div>

  <h1 class="title-page">
    <?php echo $titulo; ?>
  </h1>

  <p class="text-page p">
    <?php echo $texto; ?>
  </p>

  <div style="width:50%;">

    <form action="envia-contato" method="POST">
      <input type="text" required placeholder="Nome" class="campo-m" name="nome" />
      <input type="email" required placeholder="E-mail" class="campo-m" name="email" />
      <input type="text" required placeholder="Telefone" class="campo-m" name="fone" />
      <input type="text" required placeholder="Cidade" class="campo-p" name="cidade" />
      <input type="text" required placeholder="Estado" class="campo-p" name="estado" list="lista-estados" id="estado" autocomplete="off" />
      <datalist id="lista-estados"></datalist>
      <textarea rows="12" required placeholder="Mensagem" class="campo-m"></textarea>
      <div style="width:100%;">
        <input type="submit" class="btn-principal" value="Enviar" />
        <input type="reset" class="btn-secundario" value="Limpar" />
      </div>
    </form>



  </div>
</section>


<script src="public/js/contato.js"></script>