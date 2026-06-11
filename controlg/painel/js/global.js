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

//VALIDA CONTEUDO
function conteudo(formConteudo) {
  if (formConteudo.titulo.value == "") {
    alert("Informe o titulo do conteúdo!");
    formConteudo.titulo.focus();
    return false;
  }
  if (formConteudo.texto.value == "") {
    alert("Escreva o conteúdo da página!");
    formConteudo.texto.focus();
    return false;
  }
  if (formConteudo.tipo.value == "") {
    alert("Informe o tipo de conteúdo!");
    formConteudo.tipo.focus();
    return false;
  }
}

//VALIDA NOTICIAS
function noticias(formNoticias) {
  if (formNoticias.titulo.value == "") {
    alert("Informe o titulo do conteúdo!");
    formNoticias.titulo.focus();
    return false;
  }
  if (formNoticias.texto.value == "") {
    alert("Informe a descrição!");
    formNoticias.texto.focus();
    return false;
  }
  if (formNoticias.link.value == "") {
    alert("Informe o link da notícia!");
    formNoticias.link.focus();
    return false;
  }
  if (formNoticias.fonte.value == "") {
    alert("Informe a fonte!");
    formNoticias.fonte.focus();
    return false;
  }
}

//VALIDA FONTE
function fonte(formFonte) {
  if (formFonte.titulo.value == "") {
    alert("Informe um título!");
    formFonte.titulo.focus();
    return false;
  }
  if (formFonte.arquivo.value == "") {
    alert("Anexe o arquivo!");
    formFonte.arquivo.focus();
    return false;
  }
}

//VALIDA LINHA
function valida_linha(formLinha) {
  if (formLinha.marca.value == "") {
    alert("Selecione a marca!");
    formLinha.marca.focus();
    return false;
  }
  if (formLinha.linha.value == "") {
    alert("Informa a linha!");
    formLinha.linha.focus();
    return false;
  }
}

//VALIDA SLIDE
function slide(formSlide) {
  if (formSlide.arquivoDesktop.value == "") {
    alert("Anexe a imagem desktop!");
    formSlide.arquivoDesktop.focus();
    return false;
  }
  if (formSlide.arquivoMobile.value == "") {
    alert("Anexe a imagem Mobile!");
    formSlide.arquivoMobile.focus();
    return false;
  }
  if (formSlide.link.value == "") {
    alert("Informe o link!");
    formSlide.link.focus();
    return false;
  }
}

function edtSlide(formEdtSlide) {
  if (formEdtSlide.arquivo.value == "") {
    alert("Anexe uma imagem!");
    formEdtSlide.arquivo.focus();
    return false;
  }
}

//SOMENTE NUMEROS METROS
function somenteNumeros(num) {
  var er = /[^0-9.]/;
  er.lastIndex = 0;
  var campo = num;
  if (er.test(campo.value)) {
    campo.value = "";
  }
}

//mascra p/ numeros diversos
function mascaraNum(src, mask) {
  var i = src.value.length;
  var saida = mask.substring(0, 1);
  var texto = mask.substring(i);
  if (texto.substring(0, 1) != saida) {
    src.value += texto.substring(0, 1);
  }
}

//SOMENTE NUMEROS
function somenteNumeros(campo) {
  var digits = "0123456789/";
  var campo_temp;
  for (var i = 0; i < campo.value.length; i++) {
    campo_temp = campo.value.substring(i, i + 1);
    if (digits.indexOf(campo_temp) == -1) {
      campo.value = campo.value.substring(0, i);
    }
  }
}
