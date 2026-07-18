function copiarUrl(idInput) {
  // 1. Pega o input específico pelo ID que passamos no parâmetro
  var inputTexto = document.getElementById(idInput);

  // 2. Seleciona o conteúdo do input
  inputTexto.select();
  inputTexto.setSelectionRange(0, 99999); // Garante a seleção em dispositivos móveis

  // 3. Copia o texto selecionado para a área de transferência
  navigator.clipboard
    .writeText(inputTexto.value)
    .then(() => {
      // Feedback visual para o usuário
      //alert("Link copiado com sucesso: " + inputTexto.value);
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
