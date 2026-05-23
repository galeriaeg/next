produtos
<?php

echo $linha = $_GET['l'];
echo $produto = $_GET['p'];
echo $teste = $_GET['x'];

if (
  (empty($linha)) ||
  (empty($produto)) ||
  (empty($teste))
) {
  echo "variavel vazia";
}
