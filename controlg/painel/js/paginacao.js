const linhasPorPagina = 5; // <--- AJUSTE A QUANTIDADE AQUI
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
}

function mudarPagina(dir) {
  paginaAtual += dir;
  renderizar();
}

renderizar(); // Inicializa
