const links = document.querySelectorAll(".navegacao a");
const cards = document.querySelectorAll(".card");
const boxSlide = document.getElementById("box-slide");

let autoplayTimer = null;
const TEMPO_AUTOPLAY = 10000; // 8 segundos em milissegundos

// --- FUNÇÃO DO AUTOPLAY ---
function iniciarAutoplay() {
  // Garante que não existam múltiplos timers rodando juntos
  pararAutoplay();

  autoplayTimer = setInterval(() => {
    // Descobre qual é o link ativo atualmente
    const linkAtivo = document.querySelector(".navegacao a.active");
    if (!linkAtivo) return;

    // Pega o index do slide atual (0, 1 ou 2)
    let indexAtual = Array.from(links).indexOf(linkAtivo);

    // Calcula o próximo slide (se for o último, volta pro 0)
    let proximoIndex = (indexAtual + 1) % cards.length;

    // Rola suavemente para o próximo card
    boxSlide.scrollTo({
      left: cards[proximoIndex].offsetLeft,
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

// --- 1. CONTROLE DO CLIQUE VIA JAVASCRIPT ---
links.forEach((link) => {
  link.addEventListener("click", (e) => {
    e.preventDefault();
    resetarAutoplay(); // O usuário clicou, reinicia o contador de 8s

    const targetId = link.getAttribute("href");
    const targetCard = document.querySelector(targetId);

    if (targetId === "#card3" && link.classList.contains("active")) {
      boxSlide.scrollTo({ left: 0, behavior: "smooth" });
    } else if (targetId === "#card1" && link.classList.contains("active")) {
      const lastCard = document.getElementById("card3");
      boxSlide.scrollTo({ left: lastCard.offsetLeft, behavior: "smooth" });
    } else {
      boxSlide.scrollTo({ left: targetCard.offsetLeft, behavior: "smooth" });
    }
  });
});

// --- 2. OBSERVER (ATUALIZA O BOTÃO ATIVO) ---
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
        if (targetLink) {
          targetLink.classList.add("active");
        }
      }
    });
  },
  {
    root: boxSlide,
    threshold: 0.6,
  },
);

cards.forEach((card) => observer.observe(card));

// --- 3. MONITORA O ARRASTO COM O DEDO / MOUSE ---
// Se o usuário rolar manualmente, reinicia o tempo
boxSlide.addEventListener("touchstart", pararAutoplay);
boxSlide.addEventListener("touchend", resetarAutoplay);
boxSlide.addEventListener("mousedown", pararAutoplay);
boxSlide.addEventListener("mouseup", resetarAutoplay);

// --- 4. INICIALIZAÇÃO ---
iniciarAutoplay();
