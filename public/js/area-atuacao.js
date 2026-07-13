function setarMarca() {
  const marca = document.getElementById("marca").value;
  if (marca) {
    console.log("ID Marca:", marca);
    window.location.href = "area-atuacao?m=" + marca;
  }
}
