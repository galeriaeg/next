<?php
$id_noticia = $_GET['n'];

$path_files = "controlg/painel/files/";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_noticias WHERE id ='$id_noticia' AND status = '1' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $titulo = $row['titulo'];
  $foto = $row['foto'];
  $texto = $row['descricao'];
  $data = $row['data'];

  $date = new DateTime($data);
  $data_cadastro =  $date->format('d/m/Y');
}
// Se não existir conteúdo manda usuário pra Home
if ($qtd < 1) {
  echo "<script>window.location.href='home'</script>";
  exit();
}
?>

<section>
  <div class="label-page">
    <h3>Novidades</h3>
  </div>

  <h4 class="tag-data">
    <?php echo $data_cadastro; ?>
  </h4>


  <h1 class="title-page">
    <?php echo $titulo; ?>
  </h1>

  <div class="conteudo">
    <?php
    if (empty($foto)) {
      echo "";
    } else {
      $urlFoto = $path_files . $foto;
      echo "<img src='$urlFoto' class='foto-novidade' alt='foto' />";
    }
    echo $texto;
    ?>
  </div>
</section>

<p class="p">
  <a href="#" onclick="voltar(event)" class="a-voltar">
    <i class="fa fa-long-arrow-left btn-back" aria-hidden="true"></i>
    Voltar
  </a>
</p>

<script src="public/js/global.js"></script>