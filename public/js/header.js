function buscar() {
  const chave = document.getElementById("chave");
  if (chave.value == "") {
    alert("Informe uma palavra-chave.");
  } else {
    //alert(chave.value);
    window.location.href = "busca?key=" + chave.value;
  }
}

function buscarMob() {
  const chave = document.getElementById("chave-mob");
  if (chave.value == "") {
    alert("Informe uma palavra-chave.");
  } else {
    //alert(chave.value);
    window.location.href = "busca?key=" + chave.value;
  }
}

function controlaMenuMob(con) {
  if (con.alt == "menuoff") {
    document.getElementById("box-menu").style.display = "block";
    document.getElementById("btnMenu").alt = "menuon";
    document.getElementById("btnMenu").src = "public/imgs/btn-close-mob.png";
  } else {
    document.getElementById("box-menu").style.display = "none";
    document.getElementById("btnMenu").alt = "menuoff";
    document.getElementById("btnMenu").src = "public/imgs/btn-bars-mob.png";
  }
}

function controlaBuscaMob(con) {
  if (con.alt == "buscaoff") {
    document.getElementById("box-busca-mob").style.display = "block";
    document.getElementById("btnBusca").alt = "buscaon";
  } else {
    document.getElementById("box-busca-mob").style.display = "none";
    document.getElementById("btnBusca").alt = "buscaoff";
  }
}
