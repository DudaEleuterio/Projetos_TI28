<?php
// $nota1 = 5;
// $nota2 = 5;
// $nota3 = 6;

// USANDO METODO GET PARA COLETA DE NOTAS
// PARA COLETAR DADOS USANDO METODO GET
// [seuscript.php?suavariavel=seuvalor&outravariavel=outrovalor], ?n1=5&n2=5&n3=8&idusu=.
$n1 = $_GET['n1'];
$n2 = $_GET['n2'];
$n3 = $_GET['n3'];
$idusu = $_GET['idusu'];

$media = ($n1 + $n2 + $n3) /3;

echo("Nota 1: ". $n1);
echo("<br>Nota 2: ". $n2);
echo("<br>Nota 3: ". $n3);
echo("<br>Nome do Aluno: ". $idusu. "<br>");
echo("<br>Média: ". $media);
echo("<br>");
 
  if ($media >= 7) {
    echo($media);
    echo ("<br>Aprovado<br>");
  } 
  else if ($media >= 6 & $media <7) {
    echo($media);
    echo ("<br>Recuperação<br>");
  } 
  else if ($media < 6) {
    echo($media);
    echo ("<br>Reprovado<br>");
  }
 
?>