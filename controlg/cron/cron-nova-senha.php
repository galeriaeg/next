<?php
$emailLimpo = $_GET['email'];


//echo $pass = base64_decode('pass');

//$email_base64 = $_GET['tkn']; //RECEBE HASH BASE64
//REVERTE BASE64 PARA OBETR EMAIL
//$email = base64_decode($email_base64);

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');


//===== BUSCA DATA E HORA NO BANCO ======//
$sql = "SELECT dt_senha_gerada,hr_senha_gerada 
  FROM tb_cron 
  WHERE email='$emailLimpo' 
  AND tipo_senha='GERADA' 
  AND senha_expirada = 'FALSE' ";
$cons = $conexao->query($sql) or die($conexao->error);
while ($row = $cons->fetch_array()) {
  $dt_senha_gerada  =  $row['dt_senha_gerada'];
  $hr_senha_gerada  =  $row['hr_senha_gerada'];
}
if ($cons->num_rows > 0) {
  date_default_timezone_set('America/Sao_Paulo');
  $formato = 'd/m/Y H:i';
  //===== DEFINE DATA E HORA INICIAIS ======//
  $data_hora_inicial = DateTime::createFromFormat($formato, "$dt_senha_gerada $hr_senha_gerada");

  //===== ADD 2min NA HORA INICIAL PARA TER O LIMITE ======//
  $data_hora_limite = clone $data_hora_inicial;
  $data_hora_limite->modify('+3 minutes');

  //===== PEGA DATA E HORA ATUAL DA CLASSE DateTime() ======//
  $data_hora_atual = new DateTime();

  //===== COMPARA  DATA E HORA ATUAIS COM LIMITE ======//
  if ($data_hora_atual >= $data_hora_limite) {
    echo "tempo expirado";
    //EDITA tb_cron: A SENHA EXPIROU
    $sql = "UPDATE tb_cron SET tipo_senha='EXPIRADA',senha_expirada='TRUE' 
    WHERE email = '$emailLimpo' AND senha_expirada = 'FALSE' AND tipo_senha='GERADA'";
    $update = mysqli_query($conexao, $sql);

    //EDITA tb_usuario: INVALIDA SENHA GERADA
    // Gera uma senha aleatória de 8 caracteres alfanuméricos seguros
    $senha_rand = substr(bin2hex(random_bytes(4)), 0, 8);
    $sql = "UPDATE tb_usuarios SET senha='$senha_rand' 
    WHERE email = '$emailLimpo'";
    $update = mysqli_query($conexao, $sql);
    exit();
  } else {
    echo "<p>Contando...[3min]</p>";
    echo "<p>Você ainda está dentro do prazo.</p>";
    echo "
        <script>
            function conta(){
              setTimeout(() => {
                location.reload();
              }, 5000);
            }
            conta();
        </script>
        ";
  }
} else {
  echo "Email não localizado, senha provisória já expirada ou ja foi alterada com sucesso.";
  echo "<script>console.log('Email não localizado, senha provisória já expirada ou ja foi alterada com sucesso.');</script>";
}
