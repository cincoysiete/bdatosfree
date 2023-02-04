<?php session_start(); 
include("variables.php"); 
include("constantes.php");
include("encriptado.php"); 
include("cincoysiete.css"); 

$_SESSION["fichactual"]=$_GET["qwer"];

$ero=fopen($mibase.".csv","r") or die("Error en base de datos");
while (!feof($ero)) 
{
$linea=fgets($ero);
$trozo=explode(";",$linea);
if ($_GET["qwer"]<1){$_GET["qwer"]=1;}
if ($trozo[0]==$_GET["qwer"]){
$keke="";
for ($f=0;$f<=count($col);$f++){
$keke=$keke.trim($trozo[$f])."~";
}
}

}
fclose($ero);

include("muestraficha.php");

?>

