function altera_display(id) {
  // Opções para o atributo display - block, inline e none
  if (document.getElementById(id).style.display == "none") {
    document.getElementById(id).style.display = "block";
  } else {
    document.getElementById(id).style.display = "none";
    document.getElementById("senha").value = "";
  }
}
