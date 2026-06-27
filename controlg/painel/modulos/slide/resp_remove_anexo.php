<?php include "session.php"; ?>

<legend>
  <h3><?php echo isset($titulo) ? $titulo : ''; ?></h3>
</legend>

<?php
$idSlide = $_GET['idSlide'];
$nomeFileDsk = $_GET['filedsk'];
$nomeFileMob = $_GET['filemob'];
$conf = $_GET['conf'] ?? 0;

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

if ($conf < 1) {
  echo "<span class='txt'>Deseja realmente excluir o anexo ?</span><br />";
  echo "<p>";
  echo "<a href='index.php?id=5.5&conf=1&idSlide=" . $idSlide . "&filedsk=" . $nomeFileDsk . "&filemob=" . $nomeFileMob . "'><img class='botao-nao-sim' alt='sim' src='imgs/botao-sim.png' border='0'></a>";
  echo "<a href='index.php?id=5'><img src='imgs/botao-nao.png' class='botao-nao-sim' border='0'></a>";
  echo "</p>";
} else {

  if (!empty($nomeFileDsk)) {
    // Apagou anexo desktop
    $sql = "UPDATE tb_slider SET img_desk='' WHERE id = '$idSlide'";
    $update = mysqli_query($conexao, $sql);
    if ($update > 0) {
      if (unlink("files/" . $nomeFileDsk)) {
        echo "<script>alert('Arquivo removido com sucesso.');</script>";
        echo "<script>window.location = 'index.php?id=5'</script>";
      }
    }
  }

  if (!empty($nomeFileMob)) {
    // Apagou anexo mobile
    $sql = "UPDATE tb_slider SET img_mob='' WHERE id = '$idSlide'";
    $update = mysqli_query($conexao, $sql);
    if ($update > 0) {
      if (unlink("files/" . $nomeFileMob)) {
        echo "<script>alert('Arquivo removido com sucesso.');</script>";
        echo "<script>window.location = 'index.php?id=5'</script>";
      }
    }
  }
}
mysqli_close($conexao);
