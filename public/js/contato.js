document.addEventListener("DOMContentLoaded", function () {
  // Lista com os 27 estados do Brasil
  const estados = [
    "Acre",
    "Alagoas",
    "Amapá",
    "Amazonas",
    "Bahia",
    "Ceará",
    "Distrito Federal",
    "Espírito Santo",
    "Goiás",
    "Maranhão",
    "Mato Grosso",
    "Mato Grosso do Sul",
    "Minas Gerais",
    "Pará",
    "Paraíba",
    "Paraná",
    "Pernambuco",
    "Piauí",
    "Rio de Janeiro",
    "Rio Grande do Norte",
    "Rio Grande do Sul",
    "Rondônia",
    "Roraima",
    "Santa Catarina",
    "São Paulo",
    "Sergipe",
    "Tocantins",
  ];

  const datalist = document.getElementById("lista-estados");

  // Popula o datalist com as opções de estados
  estados.forEach(function (estado) {
    const option = document.createElement("option");
    option.value = estado;
    datalist.appendChild(option);
  });
});

//mascra p/ numeros diversos
function mascaraNum(src, mask) {
  var i = src.value.length;
  var saida = mask.substring(0, 1);
  var texto = mask.substring(i);
  if (texto.substring(0, 1) != saida) {
    src.value += texto.substring(0, 1);
  }
}

//SOMENTE NUMEROS
function somenteNumeros(campo) {
  var digits = "0123456789-";
  var campo_temp;
  for (var i = 0; i < campo.value.length; i++) {
    campo_temp = campo.value.substring(i, i + 1);
    if (digits.indexOf(campo_temp) == -1) {
      campo.value = campo.value.substring(0, i);
    }
  }
}
