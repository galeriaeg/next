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

$randCaptcha =  rand(1000, 9999);
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

  <div style="width:100%;">

    <form action="envia-contato" method="POST">
      <input type="text" required placeholder="Nome" class="campo-g" name="nome" />
      <input type="email" required placeholder="E-mail" class="campo-m" name="email" />
      <input type="text" required placeholder="Telefone" class="campo-m" maxlength="12" id="telefone" onkeypress="mascaraNum(this, '##-#########')" oninput="somenteNumeros(this)" name="telefone" />
      <input type="text" required placeholder="Cidade" class="campo-m" name="cidade" />
      <input type="text" required placeholder="Estado" class="campo-m" name="estado" list="lista-estados" id="estado" autocomplete="off" />
      <datalist id="lista-estados"></datalist>
      <textarea rows="12" required placeholder="Mensagem" name="mensagem" class="campo-g"></textarea>

      <div class="col12">
        <p class="text-page m-b col12">Código verificador: <strong> <?php echo $randCaptcha; ?></strong></p>
        <input type="text" required placeholder="Repita o Código." oninput="somenteNumeros(this)" class="campo-p" name="meuCaptcha" />
        <input type="hidden" value="<?php echo $randCaptcha; ?>" placeholder="Nome" name="randCaptcha" />
      </div>

      <div class="col12 m-t">
        <input type="submit" class="btn-principal m-r" value="Enviar" />
        <input type="reset" class="btn-secundario m-l" value="Limpar" />
      </div>
    </form>

  </div>
</section>


<script src="public/js/contato.js"></script>