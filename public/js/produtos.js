function ampliarImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  const bt_menos = document.getElementById("btnMenos");
  const bt_mais = document.getElementById("btnMais");
  bt_menos.style.display = "inline";
  bt_mais.style.display = "none";
  article.style.width = "50%";
  main.style.width = "50%";
  console.log("ampliou imagem");
}
function reduzirImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  const bt_menos = document.getElementById("btnMenos");
  const bt_mais = document.getElementById("btnMais");
  bt_menos.style.display = "none";
  bt_mais.style.display = "inline";
  article.style.width = "25%";
  main.style.width = "75%";
  console.log("reduziu imagem");
}

function setarMarca() {
  const marca = document.getElementById("marca").value;
  if (marca) {
    console.log("ID Marca:", marca);
    window.location.href = "produtos?m=" + marca;
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

function voltar(event) {
  // Impede o link de recarregar a página/piscar
  event.preventDefault();
  window.history.back();
}
