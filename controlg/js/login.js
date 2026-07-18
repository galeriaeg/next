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
  return true;
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

//VALIDA RESETE DE SENHA
function resetaSenha(formReset) {
  var email = formReset.email.value;
  if (email == "") {
    alert("Informe seu e-mail!");
    formReset.email.focus();
    return false;
  }
  if (email.indexOf("@") == -1 || email.indexOf(".") == -1) {
    alert("Por favor, informe um e-mail válido!");
    formReset.email.focus();
    return false;
  }
  return true;
}
