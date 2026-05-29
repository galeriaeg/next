function ampliarImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  article.style.width = "50%";
  main.style.width = "50%";
  btnMenos;
}
function reduzirImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  article.style.width = "25%";
  main.style.width = "75%";
}

function setarMarca() {
  const marca = document.getElementById("marca").value;
  if (marca) {
    window.location.href = "produtos?m=" + marca;
    console.log(marca);
  }
}
function setarLinha() {
  const linha = document.getElementById("linha").value;
  if (linha) {
    const [idMarca, idLinha] = linha.split("-");
    console.log("ID da Marca:", idMarca);
    console.log("ID da Linha:", idLinha);
    window.location.href = "produtos?m=" + idMarca + "&l=" + idLinha;
  }
}

function voltar() {
  window.history.back();
}
