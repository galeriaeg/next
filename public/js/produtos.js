// window.abreProduto = function (id) {
//   console.log("Abrindo o produto de ID: " + id);

//   const urlAtual = window.location.href;
//   const urlBase = urlAtual.substring(0, urlAtual.indexOf("/next/") + 6);
//   const novaUrlCompleta = urlBase + "produto?p=" + id;
//   const rotaFetch = "produto?p=" + id;
//   window.history.pushState({ rota: rotaFetch }, "", novaUrlCompleta);

//   if (typeof carregar === "function") {
//     carregar(rotaFetch);
//   } else {
//     window.location.href = "/" + novaUrlCompleta;
//   }
// };

function ampliarImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  article.style.width = "50%";
  main.style.width = "50%";
}
function reduzirImagem() {
  const article = document.getElementById("article");
  const main = document.getElementById("main");
  article.style.width = "25%";
  main.style.width = "75%";
}
