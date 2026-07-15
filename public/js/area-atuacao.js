function setarMarca() {
  const marca = document.getElementById("marca").value;
  if (marca) {
    console.log("ID Marca:", marca);
    window.location.href = "area-atuacao?m=" + marca + "#result";
  }
}

function carregaMapa() {
  // 1. Executa após 3 segundos (3000ms)
  setTimeout(function () {
    const box = document.getElementById("boxmapa");
    box.style.setProperty("width", "400px", "important");
    box.style.setProperty("opacity", "1", "important");
  }, 200);

  // 2. Executa após 4 segundos (4000ms)
  setTimeout(function () {
    const mapa = document.getElementById("mapa");
    mapa.style.setProperty("opacity", "1", "important");
    mapa.style.setProperty("margin-top", "0", "important");
  }, 600);

  setTimeout(function () {
    const box = document.getElementById("logo");
    box.style.setProperty("opacity", "1", "important");
  }, 700);
}
