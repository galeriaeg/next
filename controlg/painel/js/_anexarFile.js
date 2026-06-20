/*
function abrirAlbum(el) {
  const input = document.getElementById("boxAlbum");
  if (el > 0) {
    input.style.display = "block";
  } else {
    input.style.display = "none";
  }
}
*/
/*
function anexarFile(idInput) {
  const inputValor = document.getElementById(idInput).value;
  const inputFile = document.getElementById("arquivo");
  document.getElementById("boxAlbum").style.display = "none";
  document.getElementById("btn-anexar").style.display = "none";
  document.getElementById("box-file").style.display = "block";
  const meuArquivo = new File([inputValor], inputValor, {
    type: "text/plain",
  });
  const dataTransfer = new DataTransfer();
  dataTransfer.items.add(meuArquivo);
  inputFile.files = dataTransfer.files;

  //console.log("Arquivo injetado com sucesso!", inputFile.files[0]);
}
*/
// function buscarArquivo() {
//   var inputTexto = document.getElementById("chave");
//   window.location.href = "index.php?id=4&file=" + inputTexto.value;
// }
