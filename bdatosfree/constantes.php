<?php
include("encriptado.php"); 

$nom="Base de datos";       // NOMBRE DE LA PLICACION
$log="favicon.png";         // ICONO
$img="foto04.png";          // FONDO DE LA PANTALLA DE ACCESO
$anchoimg="100px";          // ANCHO DE LAS IMAGENES EN LA TABLA DE REGISTROS
$altoimg="100px";           // ALTO DE LAS IMAGENES EN LA TABLA DE REGISTROS
$imgtabla="";               // CON si, MUESTRA LAS FOTOS EN LA TABLA DE REGISTROS (Esto puede ralentizar la aparición de la tabla de datos)
$numcampos=20;              // NUMERO DE CAMPOS MÁXIMO

if (strpos($_SERVER["PHP_SELF"],"index.php")){} else {
if ($_SESSION["gusuario"]==$_SESSION["gusuario1"] and $_SESSION["gclave"]==$encriptar($_SESSION["gclave1"])) {} else {header('Location: index.php');}
}
?>
