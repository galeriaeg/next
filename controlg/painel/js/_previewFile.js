function abreAnexo(input) {
  const img = document.getElementById("view");
  const anexo = document.getElementById("box-anexo");
  img.src = URL.createObjectURL(input.files[0]);
  img.onload = function () {
    let largura = this.width;
    let altura = this.height;
    if (largura != 300 || altura != 155) {
      alert("A imagem deve ter as medidas: 300 x 155px");
      location.reload();
      return;
    }
    img.style.display = "block";
    anexo.style.display = "block";
  };
}

function fechaAnexo(input) {
  const img = document.getElementById("view");
  const anexo = document.getElementById("box-anexo");
  const inputAnexo = document.getElementById("anexo");
  img.src = "";
  img.style.display = "none";
  anexo.style.display = "none";
  inputAnexo.value = "";
}
