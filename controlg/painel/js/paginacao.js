const linhasPorPagina = 7; // <--- AJUSTE A QUANTIDADE AQUI
let paginaAtual = 0;
const linhas = document.querySelectorAll("#corpoTabela tr");

function renderizar() {
  linhas.forEach((tr, index) => {
    const inicio = paginaAtual * linhasPorPagina;
    const fim = inicio + linhasPorPagina;
    tr.style.display = index >= inicio && index < fim ? "" : "none";
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

renderizar(); // Inicializa
