<?php
@$id_produto = $_GET['p'];

$path_files = "controlg/painel/files/";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "
SELECT 
    p.*, 
    m.nome AS nomemarca, 
    m.logomarca AS logomarca, 
    l.titulo AS nomelinha
FROM tb_produto p
INNER JOIN tb_marca m ON p.idmarca = m.id
INNER JOIN tb_linha l ON p.idlinha = l.id
WHERE p.id = $id_produto LIMIT 1;
";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $titulo = $row['titulo'];
  $descricao = $row['descricao'];
  $foto = $row['foto'];
  $idmarca = $row['idmarca'];
  $idlinha = $row['idlinha'];
  $status = $row['status'];
  $nomemarca = $row['nomemarca'];
  $nomelinha = $row['nomelinha'];
  $logomarca = $row['logomarca'];
}
// Se não existir produto manda usuário pra Home
if ($qtd < 1) {
  echo "<script>window.location.href='home'</script>";
  exit();
}
?>

<!-- filtro -->
<section>
  <div class="label-page">
    <h3>Produto/Detalhamento</h3>
  </div>

  <div class="box-conteudo">
    <article class="col3" id="article" style="transition:0.3s;">
      <img src="<?php echo $path_files . $foto; ?>" alt="foto do produto" class="img-produto" />
      <span id="btnMais" onclick="ampliarImagem();"><img src="public/imgs/btn-mais-off.png" class="btn-zoom-mais" alt="Ampliar foto" /></span>
      <span id="btnMenos" style="display: none;" onclick="reduzirImagem();"><img src="public/imgs/btn-menos-off.png" class="btn-zoom-menos" alt="Reduzir foto" /></span>
    </article>
    <div class="col9 info-produto" id="main" style="transition:0.3s;">
      <div class="col12" style="margin-bottom:40px;display:inline-flex">
        <img src="<?php echo $path_files . $logomarca; ?>" alt="marca" class="img-logo-produto" />
      </div>
      <h1 class="title-page"><?php echo $titulo; ?></h1>
      <h3 class="marca-linha-produto"><?php echo $nomemarca; ?>/<?php echo $nomelinha; ?></h3>
      <p class="text-page col12 p">
        <?php echo $descricao; ?>
      </p>
      <button class="btn-whatsapp">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
        Solicitar orçamento
      </button>
      <p class="p">
        <a href="#" onclick="voltar(event)" class="a-voltar">
          <i class="fa fa-long-arrow-left btn-back" aria-hidden="true"></i>
          Voltar
        </a>
      </p>
    </div>

  </div>

</section>

<script src="public/js/produtos.js"></script>
<script src="public/js/global.js"></script>