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

  <form action="" method="POST">
    <input type="text" name="nome" />
    <input type="email" name="email" />
    <input type="text" name="fone" />
    <textarea></textarea>
    <input type="submit" value="Enviar" />
    <input type="submit" value="Limpar" />
  </form>
</section>