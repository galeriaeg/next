function validaTamMarca(input) {
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

function validaTamSlideDesk(input) {
  const img = document.getElementById("view");
  const anexo = document.getElementById("box-anexo");
  img.src = URL.createObjectURL(input.files[0]);
  img.onload = function () {
    let largura = this.width;
    let altura = this.height;
    if (largura != 1800 || altura != 450) {
      alert("A imagem deve ter as medidas: 1800 x 450px");
      location.reload();
      return;
    }
    img.style.display = "block";
    anexo.style.display = "block";
  };
}
