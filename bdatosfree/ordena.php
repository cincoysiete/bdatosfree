<?php session_start(); 
include("variables.php"); 
include("constantes.php");

// ORENA SEGUN LA COLUMNA QUE HEMOS MARCADO
$comoordeno=$_GET["qwer"];

$conta=0;
$er=fopen($mibase.".csv","r");
while (!feof($er))
{
$linea=fgets($er);
$kaka=explode(";",$linea);
$lineo[$conta]=$kaka[$comoordeno].";";
if ($lineo[$conta]==";"){$lineo[$conta]="vacio;";}
for ($t=0;$t<=count($col);$t++){$lineo[$conta]=$lineo[$conta].$kaka[$t].";";}
$lineo[$conta] = substr($lineo[$conta], 0, -1);
$conta++;
}
fclose($er);


$kiki="";
$lineamala="";
for ($t=1;$t<=count($col);$t++) {$lineamala=$lineamala.";";}

$k=sort($lineo,SORT_NATURAL);

$ar=fopen($mibase.".csv","w");
for ($i=0; $i<$conta; $i++)
{
$kaka=explode(";",$lineo[$i]);
$lineu="";
for ($t=1;$t<=count($col)+1;$t++){$lineu=$lineu.$kaka[$t].";";}
$lineu = substr($lineu, 0, -1);
if (trim($lineu)!=$lineamala) {$kiki=$kiki.$lineu;}

// echo $lineu;
// echo "<br>";

}

// echo "<br>";
// echo "<br>";
// echo $kiki;
// echo "<br>";
fputs($ar,$kiki);
fclose($ar);


// ACTUALIZA LOS NUMEROS DE LOS REGISTROS
// include("actualizaregistros");
$conta=1;
$lineo="";
$contao=1;
$ero=fopen($mibase.".csv","r") or die("Error en base de datos");
while (!feof($ero)) 
{
$linea=fgets($ero);
$kaka=explode(";",$linea);
if ($kaka[0]>0){
$kaka[0]=$conta;
for ($f=0;$f<=count($col);$f++){$lineo=$lineo.$kaka[$f].";";}
$conta++;
}
$lineo = substr($lineo, 0, -1);
$contao++;
}
fclose($ero);
$lineo=$lineo.PHP_EOL;
$lineo=str_replace(PHP_EOL.PHP_EOL,PHP_EOL,$lineo);
// if (strlen($lineo)<2){$lineo = substr($lineo, 0, -1);}

// exit();

$arx=fopen($mibase.".csv","w") or die("Problemas en la creacion ");
fputs($arx,$lineo);
fclose($arx);

echo '<script>location.href="tabla.php"</script>';

?>
