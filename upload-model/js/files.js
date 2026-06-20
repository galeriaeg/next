function abreFechaModalFiles(el) {
  const input = document.getElementById("modal-files");
  if (el > 0) {
    input.style.display = "block";
  } else {
    input.style.display = "none";
  }
}

function removerAnexo() {
  const inputValor = document.getElementById("id_arquivo");
  if (inputValor) {
    inputValor.value = "";
    document.getElementById("box-file").style.display = "none";
    document.getElementById("btn-anexar").style.display = "inline-block";
  }
}

function anexarFile(id, file, name) {
  console.log("ID: " + id);
  console.log("File: " + file);
  console.log("Nome: " + name);

  const idFile = id;
  const imgfile = file;
  const nameFile = name;

  const inputFile = document.getElementById("arquivo");

  document.getElementById("modal-files").style.display = "none";
  document.getElementById("btn-anexar").style.display = "none";
  document.getElementById("box-file").style.display = "block";
  document.getElementById("legenda").textContent = nameFile;

  const idFileNum = idFile.replace(/file/g, ""); // pega somente o ID
  document.getElementById("id_arquivo").value = idFileNum;

  const meuArquivo = new File([imgfile], imgfile, {
    type: "text/plain",
  });
  const dataTransfer = new DataTransfer();
  dataTransfer.items.add(meuArquivo);
  inputFile.files = dataTransfer.files;

  console.log("Arquivo injetado com sucesso!", inputFile.files[0]);
}
