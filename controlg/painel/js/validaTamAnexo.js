function validaTamMarca(input) {
  const img = document.getElementById("view-sd");
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
  if (!input.files || !input.files[0]) return;
  var reader = new FileReader();
  reader.onload = function (e) {
    var img = new Image();
    img.src = e.target.result;
    img.onload = function () {
      if (this.width !== 1800 || this.height !== 450) {
        alert("A imagem deve ter exatamente 1800 x 450px.");
        input.value = ""; // Limpa o campo
        return;
      }
      // Mostra o preview
      document.getElementById("view-sd").src = e.target.result;
      document.getElementById("box-anexo-sd").style.display = "block";
      document.getElementById("input-sd").style.display = "none";
    };
  };
  reader.readAsDataURL(input.files[0]);
}

function validaTamSlideMob(input) {
  const inputfile = document.getElementById("input-sm");
  const img = document.getElementById("view-sm");
  const anexo = document.getElementById("box-anexo-sm");
  img.src = URL.createObjectURL(input.files[0]);
  img.onload = function () {
    let largura = this.width;
    let altura = this.height;
    if (largura != 600 || altura != 450) {
      alert("A imagem deve ter as medidas: 600 x 450px para mobile.");
      location.reload();
      return;
    }
    img.style.display = "block";
    anexo.style.display = "block";
    inputfile.style.display = "none";
  };
}

function fechaPreviewSlide(el) {
  if (el == 1) {
    document.getElementById("input-sd").style.display = "block";
    document.getElementById("input-sd").value = "";
    document.getElementById("box-anexo-sd").style.display = "none";
  } else {
    document.getElementById("input-sm").style.display = "block";
    document.getElementById("input-sm").value = "";
    document.getElementById("box-anexo-sm").style.display = "none";
  }
}
