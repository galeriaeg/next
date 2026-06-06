//VALIDA LOGIN
function logon(formLogin) {
  if (formLogin.login.value == "") {
    alert("Informe seu login!");
    formLogin.login.focus();
    return false;
  }

  if (formLogin.senha.value == "") {
    alert("Informe sua senha!");
    formLogin.senha.focus();
    return false;
  }
}

function mostraEsconde() {
  const img = document.getElementById("iconpass");
  const inputSenha = document.getElementById("senha");

  if (img.alt == "senhaOff") {
    img.alt = "senhaOn";
    img.src = "imgs/icon-senha-on.png";
    inputSenha.type = "text";
  } else {
    img.alt = "senhaOff";
    img.src = "imgs/icon-senha-off.png";
    inputSenha.type = "password";
  }
}
