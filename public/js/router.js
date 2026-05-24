const carregar = async (caminhoCompleto) => {
  // Se não houver caminho, assume 'home'
  const caminho = caminhoCompleto || "home";

  // 1. Separa o nome da página das variáveis da URL
  const [nomePagina, queryString] = caminho.split("?");

  try {
    // 2. Reconstrói os parâmetros se eles existirem
    const sufixoParametros = queryString ? `?${queryString}` : "";

    // 3. Busca o arquivo correto dentro da pasta 'pages'
    const res = await fetch(`pages/${nomePagina}.php${sufixoParametros}`);

    if (!res.ok) throw new Error();

    document.getElementById("conteudo-principal").innerHTML = await res.text();
  } catch {
    window.location.href = "./erro404";
    // document.getElementById("conteudo-principal").innerHTML = `
    //         <h2>Erro 404</h2>
    //         <p>A página que você procura não foi encontrada.</p>
    //     `;
  }
};

// Captura cliques nos links do menu
document.addEventListener("click", (e) => {
  if (e.target.matches("[data-link]")) {
    e.preventDefault();
    const rota = e.target.getAttribute("href");

    history.pushState({ rota }, "", `/next/${rota}`);
    carregar(rota);
  }
});

// Trata os botões voltar/avançar do navegador
window.addEventListener("popstate", (e) => {
  carregar(e.state?.rota);
});
