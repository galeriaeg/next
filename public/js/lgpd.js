document.addEventListener("DOMContentLoaded", function () {
  const lgpdBanner = document.getElementById("lgpd-banner");
  const lgpdBtn = document.getElementById("lgpd-btn");

  // Chave usada para salvar no navegador
  const LGPD_STORAGE_KEY = "lgpd_aceito";

  // Se o usuário NÃO aceitou ainda, mostra o banner
  if (!localStorage.getItem(LGPD_STORAGE_KEY)) {
    lgpdBanner.style.display = "block";
  }

  // Ação ao clicar no botão "Concordo"
  lgpdBtn.addEventListener("click", function () {
    localStorage.setItem(LGPD_STORAGE_KEY, "true");
    lgpdBanner.style.display = "none";
  });
});
