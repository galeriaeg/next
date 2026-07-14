function buscar() {
  const chave = document.getElementById("chave");
  if (chave.value == "") {
    alert("Informe uma palavra-chave.");
  } else {
    //alert(chave.value);
    window.location.href = "busca?key=" + chave.value;
  }
}
