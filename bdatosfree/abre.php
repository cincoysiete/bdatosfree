<?php session_start(); 
include("encriptado.php"); 
include("constantes.php"); 
include("cincoysiete.css"); 

?>

<html lang="es">
<link rel="manifest" href="manifest.json">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" type="image/png" href="favicon.png" />
<?php //header('Content-Type: text/html; charset=UTF-8'); ?>


<title><?php echo $nom; ?></title>

<style>
a:link {
	text-decoration: none;
color: #34484E;
}
a:visited {
	text-decoration: none;
color: #34484E;
}
a:hover {
	text-decoration: none;
color: #34484E;
}
a:active {
	text-decoration: none;
color: #34484E;
}
</style>

<?php


// MUESTRA LOS ARCHIVOS DE BASE DE DATOS
function listarArchivos($path,$cuantosarchivos,$archives){
    $dir = opendir($path);
    $cuenteo=0;
    while ($cuenteo < $cuantosarchivos){
      echo '<font size="3">';
      $kikio0=explode("/",$archives[$cuenteo]);
      $kikio1=explode(".",$kikio0[0]);
      echo '               <a href="abrebase.php?mtk=bases/'.$archives[$cuenteo].'">'.$kikio1[0].'</a>';
      echo '<br>';
       $cuenteo++;
 }

}

// MUESTRA LOS PEDIDOS
$cuantosarchivos=0;
$archives[]="";
$dir = opendir("bases");
  while ($elemento = readdir($dir)){
      if( $elemento != "." && $elemento != ".." && strpos($elemento,".csv")){
          if( is_dir("bases".$elemento) ){
          } else {
            $archives[$cuantosarchivos]=$elemento;
            $cuantosarchivos++;
          }
      }
  }

?>

<div class="contenedor22">
<br>
<table width='100%' border='0' bgcolor="#bbd7cf">
<tr><td align='left' width="10%">
<a href="salida.php"><img src="cerrar.png" width="30px"></a>
</td><td align='center'>
<?php echo $nom; ?>
</td><td align='right' width="10%">
<a href="crea.php" title="Crear nueva base de datos"><img src="creabase.png" width="30px"></a>
<!-- </td><td align='right' width="10%">
<a href="importar.php" title="Importar base de datos"><img src="subir.png" width="30px"></a> -->
</td></td></table>

<!--  <a href="index.php"><img src="atras.png" width="30px"></a>      -->
<!-- <button class="button">BDatos</button> -->
<br>
<?php
listarArchivos( "bases",$cuantosarchivos,$archives ); 


echo "hola, venga, vamos";
?>
<!-- <br><br> -->
<!-- <a href="crea.php"><button class="button">Crear base de datos</button></a> -->
