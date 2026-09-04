<?php
require_once "../session.php";
$idUsuarioLogado = $_SESSION['idUsuarioLogado'];

include($_SERVER['DOCUMENT_ROOT'] . '/next/controlg/config/conecta.php');

//PEGA EMAIL DO USUARIO LOGADO
$sql = "SELECT email FROM tb_usuarios WHERE id='$idUsuarioLogado' ";
$cons = $conexao->query($sql) or die($conexao->error);
$total = mysqli_num_rows($cons);
while ($row = $cons->fetch_array()) {
  $email_usuario  =  $row['email'];
}

//===== VERIFICA SE HÁ SENHA PROVISÓRIA GERADA PARA O email informado ======//
$sql = "SELECT dt_senha_gerada,hr_senha_gerada 
  FROM tb_cron 
  WHERE email='$email_usuario' 
  AND tipo_senha='GERADA' 
  AND senha_expirada = 'FALSE' ";
$cons = $conexao->query($sql) or die($conexao->error);
$total = mysqli_num_rows($cons);
while ($row = $cons->fetch_array()) {
  $dt_senha_gerada  =  $row['dt_senha_gerada'];
  $hr_senha_gerada  =  $row['hr_senha_gerada'];
}
if ($total > 0) {
  echo "<script>
    window.addEventListener('DOMContentLoaded', () => {
      const parametroEnviado = '<b>Atenção:</b><br/>Você precisa alterar sua senha de acesso. Caso contrário, esta sessão será encerrada em 10 minutos e você terá que solicitar uma nova senha!';
      window.parent.postMessage({
        mensagem: parametroEnviado
      }, '*');
    });
  </script>";

  date_default_timezone_set('America/Sao_Paulo');
  $formato = 'd/m/Y H:i';

  //===== DEFINE DATA E HORA INICIAIS ======//
  $data_hora_inicial = DateTime::createFromFormat($formato, "$dt_senha_gerada $hr_senha_gerada");

  //===== ADD 10min NA HORA INICIAL PARA TER O LIMITE ======//
  $data_hora_limite = clone $data_hora_inicial;
  $data_hora_limite->modify('+10 minutes');

  //===== PEGA DATA E HORA ATUAL DA CLASSE DateTime() ======//
  $data_hora_atual = new DateTime();

  //===== COMPARA DATA ATUAL COM DATA LIMITE ======//
  if ($data_hora_atual >= $data_hora_limite) {

    //echo "tempo expirado";

    //EDITA tb_cron: A SENHA EXPIROU
    $sql = "UPDATE tb_cron SET tipo_senha='EXPIRADA',senha_expirada='TRUE' 
    WHERE email = '$email_usuario' AND senha_expirada = 'FALSE' AND tipo_senha='GERADA'";
    $update = mysqli_query($conexao, $sql);

    //EDITA tb_usuario: INVALIDANDO SENHA GERADA
    // Gera uma senha aleatória de 8 caracteres alfanuméricos seguros
    $senha_rand = substr(bin2hex(random_bytes(4)), 0, 8);
    $sql = "UPDATE tb_usuarios SET senha='$senha_rand' 
    WHERE email = '$email_usuario'";
    $update = mysqli_query($conexao, $sql);

    // FAZ LOGOUT
    echo "<script>
      window.addEventListener('DOMContentLoaded', () => {
        window.top.location.href = '../logout.php?v1';
      });
    </script>";
    exit();
  } else {
    echo "<p>Contando...[3min]</p>";
    echo "<p>Você ainda está dentro do prazo.</p>";
    echo "
        <script>
            function conta(){
              setTimeout(() => {
                location.reload();
              }, 25000);
            }
            conta();
        </script>
        ";
    exit();
  }
} else {
  //echo "Não há solicitação aberta para recuperação de senha";
  echo "<script>console.log('Sem ações no CRON');</script>";

  /*
  Pode se por 3 motivos:
  1. Senha provisoria já expirada;
  2. Senha já redefinida pelo usuario;
  3. Não há solicitação feita;
  consulta na tb_cron se há registro do usuaio logado,
  se existir, varificar se 0 tipo_senha = 'Expirada' ou 'Alterada';
  Se 'Alterada' nao faz/exibe nada.
  Se 'Expirada', faz nada pois usuário esta sem acesso;
  */

  $sql = "SELECT tipo_senha FROM tb_cron WHERE email='$email_usuario' ";
  $cons = $conexao->query($sql) or die($conexao->error);
  $total = mysqli_num_rows($cons);
  while ($row = $cons->fetch_array()) {
    $tipoSenha  =  $row['tipo_senha'];
  }

  if ($total > 0) {
    //existe registro na t_cron
    if ($tipoSenha == "EXPIRADA") {
      //echo "Faz LOGOUT. Usuario precisa redefinir senha";
      echo "<script>
      window.addEventListener('DOMContentLoaded', () => {
        window.top.location.href = '../logout.php?v2';
      });
      </script>";
      exit();
    } else {
      echo "Tudo ok! Solicitou e alterou a senha";
    }
  } else {
    //echo "<br />Usuário não solicitou redefinição de senha";
  }
}
