<?php session_start(); 
include("variables.php"); 
include("constantes.php");
include("encriptado.php"); 
include("cincoysiete.css"); 

?>
<html lang="es">

<?php
//compruebo si las características del archivo son las que deseo 
// $tipo_archivo = $_FILES['image']['type']; 
// $tamano_archivo = $_FILES['image']['size']; 
// $nombre_archivo = $_FILES[$f]['name']; 
// if (!((strpos($tipo_archivo, "png") || strpos($tipo_archivo, "jpg")) && ($tamano_archivo < 100000))) { 
//    	echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>"; 
// }else{ 
//    	if (move_uploaded_file($HTTP_POST_FILES['userfile']['tmp_name'], $nombre_archivo)){ 
//       	echo "El archivo ha sido cargado correctamente."; 
//    	}else{ 
//       	echo "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
//    	} 
// }


// SI ESTOY CREANDO UN REGISTRO, LE PONGO NUMERO
if ($_SESSION["puedomodificar"]==-1){$_POST[0]=9999999;}

// RECORRO LOS CAMPOS DEL REGISTRO QUE HA LLEGADO DESDE LA TABLA POR $_POST
$kiki="";
for ($f=0;$f<=count($col);$f++){
$pea=$_POST[$f];

// ELIMINA DEL textarea LOS PUNTOS Y COMA Y LOS INTROS
if ($tip[$f]=="textarea") {
$pea=str_replace(";",",",$_POST[$f]);
$_POST[$f]=$pea;
$pea=str_replace(PHP_EOL,". ",$_POST[$f]);
}

// SUBE LAS IMAGENES QUE SE HAYAN AÑADIDO
if ($tip[$f]=="image") {
if ($_FILES[$f]['name']!="" and $_POST[$f+count($col)+1]==""){ 
move_uploaded_file($_FILES[$f]['tmp_name'], "upload/".$_FILES[$f]['name']);
$pea="upload/".$_FILES[$f]['name'];
} else {
$pea=$_POST[$f+count($col)+1];
}
}

// AQUI ESTA EL REGISTRO NUEVO O MODIFICADO
$kiki=$kiki.$pea.";";
}
$kiki = substr($kiki, 0, -1);

// ELIMINA EL ULTIMO CARACTER DEL NUEVO REGISTRO, QUE RESULTA SER UN ; QUE HEMOS AÑADIDO EN LA LINEA ANTERIOR
// if ($_SESSION["puedomodificar"]==1){$kiki = substr($kiki, 0, -1);}

// SI ESTAMOS MODIFICANDO, LEEMOS LA BASE DE DATOS Y AL LLEGAR AL NUMERO DE REGISTRO A MODIFICAR INSERTAMOS EL MODIFICADO
if ($_SESSION["puedomodificar"]==1){

$conta=1;
$koko="";
$kaka=explode("~",$_SESSION["fichactual"]);
$ero=fopen($mibase.".csv","r") or die("Error en base de datos");
while (!feof($ero)) 
{
$linea=fgets($ero);

if ($conta==trim($kaka[0])){$koko=$koko.$kiki.PHP_EOL;} else {$koko=$koko.$linea;}
$conta++;
}
fclose($ero);

} else {

// SI ESTAMOS CREANDO UN REGISTRO LO AÑADIMOS AL FINAL DE LA BASE DE DATOS
$ero=fopen($mibase.".csv","r") or die("Error en base de datos");
while (!feof($ero)) 
{
$linea=fgets($ero);
$koko=$koko.$linea;

}
fclose($ero);
$koko=$koko.$kiki.PHP_EOL;
}

// GUARDAMOS LA BASE DE DATOS MODIFICADA
$arx=fopen($mibase.".csv","w") or die("Problemas en la creacion ");
fputs($arx,$koko);
fclose($arx);



// ACTUALIZA LOS NUMEROS DE LOS REGISTROS PARA QUE SEAN CORRELATIVOS
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

// exit($lineo);

$arx=fopen($mibase.".csv","w") or die("Problemas en la creacion ");
fputs($arx,$lineo);
fclose($arx);

echo '<script>location.href="tabla.php"</script>';

?>
