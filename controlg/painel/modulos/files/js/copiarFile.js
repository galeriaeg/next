function copiarUrl(idInput) {
  var inputTexto = document.getElementById(idInput);

  inputTexto.select();
  inputTexto.setSelectionRange(0, 99999); // Garante a seleção em dispositivos móveis

  navigator.clipboard
    .writeText(inputTexto.value)
    .then(() => {
      alert("Link copiado com sucesso.");
    })
    .catch((err) => {
      console.error("Erro ao copiar o texto: ", err);
    });
}

function buscarArquivo() {
  var inputTexto = document.getElementById("chave");
  window.location.href = "index.php?id=4&file=" + inputTexto.value;
}
