<?php
session_start();

  $strinicio = intval($_POST["inicio"]);
  $strfinal = intval($_POST["final"]);

  if ($strinicio == "") {
       echo  "<h3>Corregir: numero inicial esta en blanco</h3>";
     return;
  }

  if ($strfinal == "") {
       echo  "<h3>Corregir: numero final esta en blanco</h3>";
     return;
  }

  if ($strinicio > $strfinal)
  {
       echo  "<h3>Corregir: ". $strinicio ." igual a ". $strfinal. "</h3>";
     return;
  }
  if ($strinicio == $strfinal)
  {
       echo  "<h3>Corregir: ". $strinicio ." es menor a ". $strfinal. "</h3>";
     return;
  }

for ($cedula = $strinicio; $cedula <= $strfinal; $cedula++) {

$web = "";
$web = 'http://200.109.120.11/web/registro_electoral/ce.php?nacionalidad=E&cedula='.$cedula;

$content = file_get_contents($web);

preg_match('#dula:</font></strong>(.*)</td>#', $content, $match);
$name0 = $match[1];

preg_match('#>Primer Nombre:</font></strong>(.*)</td>#', $content, $match);
$name1 = $match[1];

preg_match('#>Segundo Nombre:</font></strong>(.*)</td>#', $content, $match);
$name2 = $match[1];

preg_match('#>Primer Apellido:</font></strong>(.*)</td>#', $content, $match);
$name3 = $match[1];

preg_match('#>Segundo Apellido:</font></strong>(.*)</td>#', $content, $match);
$name4 = $match[1];

preg_match('#Objeción:</font></strong>(.*)</td>#', $content, $match);
$objecion = $match[1];

echo "cedula| $name0 | $name1 | $name2 | $name3 | $name4 | $objecion |<br>";

}

$_SESSION = array();

session_destroy();

?>
