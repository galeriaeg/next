// Função principal que insere o texto na posição do cursor
function inserirNoCursor(textarea, textoInserir) {
  var inicioSelecao = textarea.selectionStart;
  var fimSelecao = textarea.selectionEnd;

  var textoAntes = textarea.value.substring(0, inicioSelecao);
  var textoDepois = textarea.value.substring(fimSelecao);

  textarea.value = textoAntes + textoInserir + textoDepois;

  // Reposiciona o cursor após o texto inserido e foca
  textarea.selectionStart = textarea.selectionEnd =
    inicioSelecao + textoInserir.length;
  textarea.focus();
}

// 1. Escuta o clique do Botão
document.getElementById("btn-br").addEventListener("click", function () {
  var textarea = document.getElementById("texto");
  inserirNoCursor(textarea, "<br>");
});

// 2. Escuta a tecla Enter dentro do Textarea
document.getElementById("texto").addEventListener("keydown", function (evento) {
  // Verifica se a tecla pressionada foi o Enter
  if (evento.key === "Enter") {
    evento.preventDefault(); // Impede o Enter de pular a linha nativa do navegador
    inserirNoCursor(this, "<br>"); // Insere o <br> no lugar
  }
});
