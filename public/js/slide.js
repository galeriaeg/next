(function () {
  const links = document.querySelectorAll(".navegacao a");
  const cards = document.querySelectorAll(".card");
  const boxSlide = document.getElementById("box-slide");

  // SE NÃO EXISTIR O SLIDE NESSA TELA, JÁ PARA O SCRIPT PARA NÃO DAR ERRO
  if (!boxSlide || cards.length === 0) return;

  let autoplayTimer = null;
  const TEMPO_AUTOPLAY = 10000;

  function iniciarAutoplay() {
    pararAutoplay();
    autoplayTimer = setInterval(() => {
      const linkAtivo = document.querySelector(".navegacao a.active");
      if (!linkAtivo) return;

      let indexAtual = Array.from(links).indexOf(linkAtivo);
      let proximoIndex = (indexAtual + 1) % cards.length;

      // 💡 CORREÇÃO MOBILE: Calcula baseado no tamanho atual de 1 card (responsivo)
      const larguraCard = cards[0].offsetWidth;

      boxSlide.scrollTo({
        left: proximoIndex * larguraCard,
        behavior: "smooth",
      });
    }, TEMPO_AUTOPLAY);
  }

  function pararAutoplay() {
    if (autoplayTimer) clearInterval(autoplayTimer);
  }

  function resetarAutoplay() {
    pararAutoplay();
    iniciarAutoplay();
  }

  links.forEach((link, index) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      resetarAutoplay();

      const targetId = link.getAttribute("href");
      const larguraCard = cards[0].offsetWidth;

      if (targetId === "#card3" && link.classList.contains("active")) {
        boxSlide.scrollTo({ left: 0, behavior: "smooth" });
      } else if (targetId === "#card1" && link.classList.contains("active")) {
        boxSlide.scrollTo({ left: boxSlide.scrollWidth, behavior: "smooth" });
      } else {
        // 💡 CORREÇÃO MOBILE: Multiplica o index do card pela largura dele
        boxSlide.scrollTo({ left: index * larguraCard, behavior: "smooth" });
      }
    });
  });

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          document
            .querySelector(".navegacao a.active")
            ?.classList.remove("active");
          const targetLink = document.querySelector(
            `.navegacao a[href="#${entry.target.id}"]`,
          );
          if (targetLink) targetLink.classList.add("active");
        }
      });
    },
    // 💡 CORREÇÃO MOBILE: threshold de 0.6 pode ser muito alto no mobile se o card passar da tela.
    // Usar 0.5 (metade do card visível) é mais seguro para telas pequenas.
    { root: boxSlide, threshold: 0.5 },
  );

  cards.forEach((card) => observer.observe(card));

  // Eventos de toque para mobile funcionarem sem travar o scroll natural
  boxSlide.addEventListener("touchstart", pararAutoplay, { passive: true });
  boxSlide.addEventListener("touchend", resetarAutoplay, { passive: true });
  boxSlide.addEventListener("mousedown", pararAutoplay);
  boxSlide.addEventListener("mouseup", resetarAutoplay);

  iniciarAutoplay();
})();
