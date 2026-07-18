//VALIDA USUARIO
function validaSenha(formUser) {
  if (formUser.senha.value.length < 8) {
    alert("Sua senha deve ter no mínimo 08 caracteres!");
    formUser.senha.value = "";
    formUser.senha.focus();
    return false;
  }
}

function mostraEsconde() {
  const img = document.getElementById("iconpass");
  const inputSenha = document.getElementById("senha");
  //alert(img.alt);
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

function altera_display(id) {
  // Opções para o atributo display - block, inline e none
  if (document.getElementById(id).style.display == "none") {
    document.getElementById(id).style.display = "block";
  } else {
    document.getElementById(id).style.display = "none";
    document.getElementById("senha").value = "";
  }
}

//SOMENTE NUMEROS
function somenteNumeros(campo) {
  var digits = "0123456789-";
  var campo_temp;
  for (var i = 0; i < campo.value.length; i++) {
    campo_temp = campo.value.substring(i, i + 1);
    if (digits.indexOf(campo_temp) == -1) {
      campo.value = campo.value.substring(0, i);
    }
  }
}
