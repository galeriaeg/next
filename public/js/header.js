function buscar() {
  const chave = document.getElementById("chave");
  if (chave.value == "") {
    alert("Vazio");
  } else {
    alert(chave.value);
    window.location.href = "busca";
  }
}
