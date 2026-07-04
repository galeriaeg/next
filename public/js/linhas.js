let intervaloRolagem;
function iniciarRolagem(direcao) {
  const carrossel = document.querySelector(".box-linhas");

  // Remove a suavização temporariamente para a rolagem contínua não dar trancos
  carrossel.style.scrollBehavior = "auto";

  // Cria um loop que move o scroll a cada 10 milissegundos
  intervaloRolagem = setInterval(() => {
    carrossel.scrollLeft += direcao * 2; // 5 é a velocidade. Aumente para ir mais rápido.
  }, 10);
}

function pararRolagem() {
  const carrossel = document.querySelector(".box-linhas");

  // Limpa o loop para parar a rolagem imediatamente
  clearInterval(intervaloRolagem);

  // Devolve o comportamento suave padrão do CSS
  carrossel.style.scrollBehavior = "smooth";
}
