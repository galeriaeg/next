const linhasPorPagina = 6; // <--- AJUSTE A QUANTIDADE AQUI
let paginaAtual = 0;
const linhas = document.querySelectorAll("h4.new"); // <--- ajustado

function renderizar() {
  linhas.forEach((h4, index) => {
    const inicio = paginaAtual * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    h4.style.display = index >= inicio && index < fim ? "" : "none";
  });

  document.getElementById("label").innerText = `Página ${paginaAtual + 1}`;
  document.getElementById("prev").disabled = paginaAtual === 0;
  document.getElementById("next").disabled =
    (paginaAtual + 1) * linhasPorPagina >= linhas.length;

  // INCLUSÃO: Ajuste da opacidade baseado no estado do 'disabled' que você definiu acima
  document.getElementById("prev").style.opacity = document.getElementById(
    "prev",
  ).disabled
    ? "0.5"
    : "1";
  document.getElementById("next").style.opacity = document.getElementById(
    "next",
  ).disabled
    ? "0.5"
    : "1";
}

function mudarPagina(dir) {
  paginaAtual += dir;
  renderizar();
}

renderizar();
