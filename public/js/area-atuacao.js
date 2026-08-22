function setarMarca() {
  const marca = document.getElementById("marca").value;

  if (marca) {
    console.log("ID Marca:", marca);
    // Redireciona o usuário para a página com o parâmetro e a âncora #result
    window.location.href = "area-atuacao?m=" + marca;
  }
}

function carregaMapa() {
  setTimeout(function () {
    const mapa = document.getElementById("mapa");

    // O SEGREDO TÁ AQUI: Só altera o estilo se o mapa existir nesta página atual
    if (mapa) {
      mapa.style.setProperty("opacity", "1", "important");
      mapa.style.setProperty("margin-top", "0", "important");
    }
  }, 300);

  setTimeout(function () {
    const box = document.getElementById("logo");
    if (box) {
      box.style.setProperty("opacity", "1", "important");
    }
  }, 600);
}
carregaMapa();
