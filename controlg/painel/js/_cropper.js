let cropperInstance = null;

function abreAnexo(input, ratio) {
  if (!input.files || !input.files[0]) return;

  const file = input.files[0];
  const reader = new FileReader();

  reader.onload = function (e) {
    const imgCrop = document.getElementById("imagem-crop");
    imgCrop.src = e.target.result;

    const modal = document.getElementById("modal-crop");
    modal.style.display = "flex";

    // Destroi instância anterior se existir
    if (cropperInstance) {
      cropperInstance.destroy();
      cropperInstance = null;
    }

    cropperInstance = new Cropper(imgCrop, {
      aspectRatio: ratio, //16 / 8,
      viewMode: 1,
      movable: true,
      zoomable: true,
      scalable: false,
      rotatable: false,
    });
  };

  reader.readAsDataURL(file);
}

function confirmarCrop() {
  if (!cropperInstance) return;

  // Gera canvas com tamanho fixo 1280x800 (16:10)
  const canvas = cropperInstance.getCroppedCanvas({
    width: 1280,
    height: 800,
    imageSmoothingEnabled: true,
    imageSmoothingQuality: "high",
  });

  const base64 = canvas.toDataURL("image/jpeg", 0.9);

  // Preenche o campo hidden com o base64
  document.getElementById("imagem_cropada").value = base64;

  // Atualiza o preview existente
  const img = document.getElementById("view");
  img.src = base64;
  img.style.display = "block";

  document.getElementById("box-anexo").style.display = "block";
  document.getElementById("modal-crop").style.display = "none";

  cropperInstance.destroy();
  cropperInstance = null;
}

function cancelarCrop() {
  document.getElementById("modal-crop").style.display = "none";
  document.getElementById("anexo").value = "";

  if (cropperInstance) {
    cropperInstance.destroy();
    cropperInstance = null;
  }
}

function fechaAnexo() {
  const img = document.getElementById("view");
  const anexo = document.getElementById("box-anexo");
  const inputAnexo = document.getElementById("anexo");

  img.src = "";
  img.style.display = "none";
  anexo.style.display = "none";
  inputAnexo.value = "";
  document.getElementById("imagem_cropada").value = "";
}
