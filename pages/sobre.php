<?php
include($_SERVER['DOCUMENT_ROOT'] . '/next/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='1' ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $mapa = $row['add'];
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

  <p class="text-page">
    <?php echo $texto; ?>
  </p>

  <h3 style="margin-bottom: 20px;">
    <i class="fa fa-map-marker" aria-hidden="true"></i>
    &nbsp;Onde estamos
  </h3>

  <iframe class="imapa" src="<?php echo $mapa; ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>