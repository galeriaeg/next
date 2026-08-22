function buscar() {
  const chave = document.getElementById("chave");
  if (chave.value == "") {
    document.getElementById("alerta-modal").style.display = "block";
    setTimeout(() => {
      document.getElementById("alerta-modal").style.opacity = 1;
    }, 300);
    setTimeout(() => {
      document.getElementById("alerta-modal").style.opacity = 0;
      document.getElementById("alerta-modal").style.display = "none";
    }, 3400);
  } else {
    window.location.href = "busca?key=" + chave.value;
  }
}

function fechaAlerta(el) {
  document.getElementById("alerta-modal").style.display =
    el == 0 ? "none" : "block";
}

function buscarMob() {
  const chave = document.getElementById("chave-mob");
  if (chave.value == "") {
    document.getElementById("alerta-modal").style.display = "block";
    setTimeout(() => {
      document.getElementById("alerta-modal").style.opacity = 1;
    }, 300);
    setTimeout(() => {
      document.getElementById("alerta-modal").style.opacity = 0;
      document.getElementById("alerta-modal").style.display = "none";
    }, 3400);
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
