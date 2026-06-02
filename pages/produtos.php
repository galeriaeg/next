<?php
@$idMarca_selecionada = $_GET['m'];
@$idLinha_selecionada = $_GET['l'];

$path_files = "controlg/painel/files/";

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='2' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $tipo = $row['tipo'];
}
// Se não existir conteúdo manda usuário pra Home
if ($qtd < 1) {
  echo "<script>window.location.href='home'</script>";
  exit();
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

  <!-- filtro -->
  <div class="box-filtro col12">
    <h3>
      <i class="fa fa-filter" aria-hidden="true"></i>
      &nbsp;Filtro:
    </h3>
    <!-- Select Marca -->
    <select id="marca" onchange="setarMarca();" class="select">
      <option selected disabled>Marca</option>
      <?php
      $sql = "SELECT * FROM tb_marca where status= 1";
      $res = mysqli_query($conexao, $sql);
      $qtd = mysqli_num_rows($res);
      while ($row = mysqli_fetch_array($res)) {
        $id_marca = $row['id'];
        $nome_marca = $row['nome'];
        $logomarca_marca = $row['logomarca'];
        echo "<option " . ($idMarca_selecionada == $id_marca ? "selected" : "") . " value='$id_marca'>$nome_marca</option>";
      }
      ?>
    </select>

    <!-- Select Linha -->
    <select disabled onchange="setarLinha(this)" id="linha" class="select">
      <option selected disabled>Linha</option>
      <?php
      if (!empty($idMarca_selecionada)) {
        $sql = "SELECT id,titulo FROM tb_linha where idmarca = $idMarca_selecionada";
        $res = mysqli_query($conexao, $sql);
        $qtd = mysqli_num_rows($res);
        while ($row = mysqli_fetch_array($res)) {
          $id_linha = $row['id'];
          $titulo_linha = $row['titulo'];
          $marca_linha = $idMarca_selecionada . "-" . $id_linha;
          echo "<option " . ($idLinha_selecionada == $id_linha ? "selected" : "") . " value='$marca_linha'>$titulo_linha</option>";
        }
      }
      ?>
    </select>

  </div>


  <!-- Logo Marca parceira -->
  <div class="col12">
    <?php
    $idMarca_selecionada = isset($idMarca_selecionada) ? (int)$idMarca_selecionada : 0;
    $sql = "SELECT nome,logomarca 
    FROM tb_marca 
    WHERE id=$idMarca_selecionada
    LIMIT 1 ";
    $res = mysqli_query($conexao, $sql);
    $qtd = mysqli_num_rows($res);
    while ($row = mysqli_fetch_array($res)) {
      $nome_marca = $row['nome'];
      $logo_marca = $row['logomarca'];
    }
    if ($qtd > 0) {
      // Mostra Marca do produto
      echo "<img src='$path_files$logo_marca' class='logo-produto' alt='logomarca'>";
      echo "<script>document.getElementById('linha').disabled = false;</script>";
    } else {
      echo "<h4 class='alert-info'><i class='fa fa-exclamation-circle' aria-hidden='true'></i>&nbsp;&nbsp;Selecione uma Marca</h4>";
    }
    ?>
  </div>


  <!-- Lista de registros/produtos  -->
  <div class="col12 card-grupo">
    <?php
    if ((!empty($idMarca_selecionada)) && (empty($idLinha_selecionada))) {
      //echo "busca pela marca";
      $i = 1;
      $sql = "
      SELECT tp.id,tp.foto,tp.titulo,tm.nome AS nomeMarca, tl.titulo AS nomeLinha
      FROM tb_produto tp, tb_marca tm, tb_linha tl
      WHERE tp.idmarca = $idMarca_selecionada
      AND tp.idmarca = tm.id
      AND tp.idlinha = tl.id
      AND tp.status = 1;";
      $re = mysqli_query($conexao, $sql);
      $qtd = mysqli_num_rows($re);
      while ($row = mysqli_fetch_array($re)) {
        $idProduto = $row['id'];
        $tituloProduto = $row['titulo'];
        $fotoProduto = $row['foto'];
        $nomeMarca = $row['nomeMarca'];
        $nomeLinha = $row['nomeLinha'];

        if ($i % 4 == 0) {
          echo "<div class='card-produto card-last'>
        <a href='/next/produto?p=$idProduto'>
          <div class='box-imagem'>
            <img src='$path_files$fotoProduto' alt='prod' />
          </div>
         </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i>$tituloProduto</h2>
        <h4>$nomeMarca</h4>
        </div>";
        } else {
          echo "<div class='card-produto card-first'>
        <a href='/next/produto?p=$idProduto'>
          <div class='box-imagem'>
            <img src='$path_files$fotoProduto' alt='prod' />
          </div>
        </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i> $tituloProduto</h2>
        <h4>$nomeMarca - $nomeLinha</h4>
        </div>";
        }
        $i++;
      }
    } else if ((!empty($idMarca_selecionada)) && (!empty($idLinha_selecionada))) {
      //echo "busca por marca e linha";
      $j = 1;
      $sql = "
      SELECT tp.id,tp.foto,tp.titulo,tm.nome AS nomeMarca, tl.titulo AS nomeLinha
      FROM tb_produto tp, tb_marca tm, tb_linha tl
      WHERE tp.idmarca = $idMarca_selecionada
      AND tp.idlinha = $idLinha_selecionada
      AND tp.idmarca = tm.id
      AND tp.idlinha = tl.id
      AND tp.status = 1;";
      $re = mysqli_query($conexao, $sql);
      $qtd = mysqli_num_rows($re);
      while ($row = mysqli_fetch_array($re)) {
        $idProduto = $row['id'];
        $tituloProduto = $row['titulo'];
        $fotoProduto = $row['foto'];
        $nomeMarca = $row['nomeMarca'];
        $nomeLinha = $row['nomeLinha'];

        if ($j % 4 == 0) {
          echo "<div class='card-produto card-last'>
        <a href='/next/produto?p=$idProduto'>
          <div class='box-imagem'>
            <img src='$path_files$fotoProduto' alt='prod' />
          </div>
         </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i>$tituloProduto</h2>
        <h4>$nomeMarca</h4>
        </div>";
        } else {
          echo "<div class='card-produto card-first'>
        <a href='/next/produto?p=$idProduto'>
          <div class='box-imagem'>
            <img src='$path_files$fotoProduto' alt='prod' />
          </div>
        </a>
        <h2><i class='fa fa-arrow-circle-o-right' aria-hidden='true'></i> $tituloProduto</h2>
        <h4>$nomeMarca - $nomeLinha</h4>
        </div>";
        }
        $j++;
      }
    }
    ?>
  </div>
</section>

<script src="public/js/produtos.js"></script>