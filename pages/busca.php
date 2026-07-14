<?php
include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

$sql = "SELECT * FROM tb_conteudo WHERE tipo ='5' LIMIT 1 ";
$res = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($res);
while ($row = mysqli_fetch_array($res)) {
  $id = $row['id'];
  $pagina = $row['pagina'];
  $titulo = $row['titulo'];
  $texto = $row['texto'];
  $tipo = $row['tipo'];
}
if ($qtd < 1) {
  echo "<br /><br /><br />";
  echo "<div class='alerta alert-erro'>Erro! Página não localizada.</div>";
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

  <div class="text-page p">
    <?php echo $texto; ?> <strong id="qtd-res">000</strong>
  </div>
</section>

<?php
$busca = "%" . ($_GET['key'] ?? '') . "%";

// Mapeamento dos códigos numéricos para as páginas correspondentes
$paginas_conteudo = [
  1 => 'sobre',
  2 => 'produtos',
  3 => 'area-atuacao',
  4 => 'contato',
  6 => 'novidades'
];

$sql = "SELECT id, titulo, texto AS descricao, 'conteudo' AS tipo, tipo AS id_tipo_pag FROM tb_conteudo WHERE titulo LIKE ? OR texto LIKE ?
        UNION ALL
        SELECT id, titulo, descricao, 'noticia' AS tipo, 0 AS id_tipo_pag FROM tb_noticias WHERE (titulo LIKE ? OR descricao LIKE ?) AND status = 1
        UNION ALL
        SELECT id, titulo, descricao, 'produto' AS tipo, 0 AS id_tipo_pag FROM tb_produto WHERE titulo LIKE ? OR descricao LIKE ?";


$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "ssssss", $busca, $busca, $busca, $busca, $busca, $busca);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$total = mysqli_num_rows($res);

while ($row = mysqli_fetch_assoc($res)) {
  $descricao_curta = mb_strimwidth($row['descricao'], 0, 150, "...");

  // Lógica de roteamento dos links
  switch ($row['tipo']) {
    case 'noticia':
      $link = "novidade?n=" . $row['id'];
      break;

    case 'produto':
      $link = "produto?p=" . $row['id'];
      break;

    case 'conteudo':
      // Recupera o nome da página usando o número vindo do banco
      $id_tipo = (int)$row['id_tipo_pag'];

      // Se o número existir no nosso mapeamento, usa ele. Caso contrário, envia para a home.
      $link = $paginas_conteudo[$id_tipo] ?? 'index.php';
      break;

    default:
      $link = "#";
  }

  // Exibição do HTML
  echo "<div class='text-page col12'>";
  echo "<strong class='verde'>[" . ucfirst($row['tipo']) . "] {$row['titulo']}</strong><br />";
  echo "<a href='{$link}' class='br'>{$descricao_curta}</a>";
  echo "<div class='fio'></div>";
  echo "</div>";
}

?>

<script>
  document.getElementById('qtd-res').textContent = "<?php echo $total; ?>";
</script>