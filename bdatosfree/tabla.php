<?php session_start(); 
include("variables.php"); 
include("constantes.php");
include("encriptado.php"); 
include("cincoysiete.css"); 

?>

<html lang="es">
<link rel="manifest" href="manifest.json">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="icon" type="image/png" href="<?php echo $log; ?>" />
<?php header('Content-Type: text/html; charset=UTF-8'); ?>


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

$_SESSION["puedomodificar"]=1;
$_SESSION["editar"]=1;
 $haysuma=0;
 $haymedia=0;

// SI NO EXISTE EL ARCHIVO DE BASE DE DATOS, LO CREA
if (file_exists($mibase.".csv")){} else {
$arx=fopen($mibase.".csv","w") or die("Problemas en la creacion ");
fputs($arx,$lineo);
fclose($arx);
}

if ($_SESSION["puedomodificar"]==1){$txtper="desbloquear.png";}else{$txtper="bloquear.png";}

$labase=explode("/",$mibase);
?>
<div class="header">
<br>
<table width='100%' border='0' bgcolor="#bbd7cf">
<tr><td align='left' width='10%'>
<a href="abre.php"><img src="volver.png" width="30px"></a>
</td><td align='center' width='15%'>
<input class="button3" name="t1" value="" />
</td><td>
<input onclick="busca(document.all.t1.value)" type="image" src="buscar.png" width="25px" value="Buscar" />
<?php 
// SI HAY IMAGENES APARECE BOTON PARA MOSTRARLAS O NO EN LA TABLA
for ($f=1;$f<=count($tip);$f++){if ($tip[$f]=="image"){$hayimagenes=1;}}
echo '     <a href="ver.php?modi=-1&ficha='.$keke.'" title="Añadir registro"><img src="mas.png" width="25px"></a>';
if ($hayimagenes==1){
if ($_SESSION["verimagenes"]==-1) {echo '     <a href="verimagenes.php" title="Toca para mostrar imágenes"><img src="siimg.png" width="25px"></a>';}
if ($_SESSION["verimagenes"]==1) {echo '     <a href="verimagenes.php" title="Toca para ocultar imágenes"><img src="noimg.png" width="25px"></a>';}
echo '     <a href="descargatabla.php" title="Toca para descargar base"><img src="descargar.png" width="25px"></a>';
}


?>
</td><td align='center' width='15%'>
<?php echo $labase[1]; ?>
</td></td></table>
</div>
<br><br><br>

<?php

// MUESTRA LA TABLA CON LOS REGISTROS
$_SESSION["ficha"]="";
echo '<p><TABLE id="tabla" width=100% align="center" border="0" cellpadding="0" cellspacing="0" class="tabla"><TR>';

$sumao[]=0;
$conta=0;
$contando=1;

// GENERA LOS ENCABEZADOS DE LAS COLUMNAS
// echo '<TH>'.'<center>VER</center>'.'</TD>';
for ($f=1;$f<=count($col);$f++){
echo '<TH>'.'<center><a href="ordena.php?qwer='.$f.'" title="Toca para ordenar la tabla por este campo">'.$col[$f].'</a></center>'.'</TD>';
}

$ero=fopen($mibase.".csv","r") or die("Error en base de datos");
while (!feof($ero)) 
{
$linea=fgets($ero);
$trozo=explode(";",$linea);
$koko="";
for ($f=2;$f<=count($col);$f++){
$koko=$koko.$trozo[$f]."~";
}
$linea=$koko;

// GENERA EL ENLACE PARA VER LA FICHA DEL ARTICULO
$keke="";
for ($f=0;$f<=count($col);$f++){
$keke=$keke.$trozo[$f]."~";
}
for ($t=1;$t<=count($col);$t++) {$lineamala=$lineamala.";";}
$_SESSION["paficha"]=$keke;
// if (strlen($linea)<=$lineamala){
// $keke='<a href="ver.php?modi=-1&ficha='.$keke.'" title="Añadir registro"><img src="mas.png" width="25px"></a>';
// } else {
// $keke='<a href="ver.php?modi=1&ficha='.$keke.'" title="Ver ficha del registro"><img src="ojo.png" width="25px"></a>';
// }

// GENERA LOS DATOS DEL ARTICULO PARA VERLOS EN MODO FICHA
$kiki="";
for ($f=1;$f<=count($col);$f++){

// ENLACE EN IMAGENES
$kikio=explode("/",$trozo[$f]);
if ($tip[$f]=="image" and $trozo[$f]!=""){
// if ($imgtabla=="si"){
if ($_SESSION["verimagenes"]==1){
if (strpos($trozo[$f],".")) {} else {$trozo[$f]="blanco.png";}
$trozo[$f]='<a href="'.$trozo[$f].'">'.'<img src="'.$trozo[$f].'" width-max="'.$anchoimg.'" height="'.$altoimg.'">'.'</a>';
} else {
$imagiya="peque.png";
// if (strlen($trozo[$f])>4) {$trozo[$f]='<a href="'.$trozo[$f].'">'.$kikio[1].'</a>';}
if (strlen($trozo[$f])>4) {$trozo[$f]='<a href="'.$trozo[$f].'">'.'<img src="'.$imagiya.'" width="20px"></a>';}
}
}

// SUMA LOS VALORES DE LA COLUMNA, SI ES EL CASO
if ($sum[$f]=="si"){$sumao[$f]=$sumao[$f]+$trozo[$f]; $haysuma=1;}
if ($med[$f]=="si"){ $haymedia=1;}

// DA FORMATO A LOS VALORES NUMERICOS
if ($tip[$f]=="number" and $trozo[$f]!=0){$numfor=number_format($trozo[$f],$deci,",",".");} else {$numfor="";}
// if ($tip[$f]=="date" and $trozo[$f]!=0){$fechafor=str_replace("-","_",$trozo[$f]);} else {$fechafor="";}

if ($tip[$f]=="text"){$trozo[$f]="<div class='izq'>".$trozo[$f]."</div>";}
if ($tip[$f]=="number"){$trozo[$f]="<div class='dcha'>".$numfor."</div>";}
// if ($tip[$f]=="date"){$trozo[$f]="<div class='izq'>".$fechafor."</div>";}
if ($tip[$f]=="textarea"){$trozo[$f]="<div class='izq'>".$trozo[$f]."</div>";}
if ($tip[$f]=="image"){$trozo[$f]="<div class='cen'>".$trozo[$f]."</div>";}

if (is_numeric($trozo[$f])){$trozo[$f]=number_format($trozo[$f],$deci,",",".");}

if ($tip[$f]!="image") {$trozo[$f]='<a href="ver.php?modi=1&ficha='.$_SESSION["paficha"].'">'.$trozo[$f].'</a>';}

$kiki=$kiki.$trozo[$f].";";
}


// $linea=$keke.";".$kiki;
$linea=$kiki;
echo '</TR><TR class="modo2">';
echo '<TH class="modo2">';
echo str_replace(";","</TD><TH class='modo2'>",$linea);
echo '</TD>';
echo '</TR><TR>';
$conta++;
$contando++;
}
fclose($ero);


// TOTALIZA LAS COLUMNAS INDICADAS
if ($conta>1 and $haysuma==1){
$kiki="SUMA";
for ($f=1;$f<count($sum);$f++)
{
if ($sum[$f]=="si"){$linea="<div class='dcha'>".number_format($sumao[$f],$deci,",",".")."</div>";} else {$linea="";}
$kiki=$kiki.$linea.";";
}
$kiki = substr($kiki, 0, -1);

echo '</TR><TR class="modo2">';
echo '<TH class="modo2">';
echo str_replace(";","</TD><TH class='modo2'>",$kiki);
echo '</TD>';
echo '</TR><TR>';
}

// HACE LA MEDIA DE LAS COLUMNAS INDICADAS
if ($conta>1 and $haymedia==1){
$kiki="MEDIA";
$conta--;
for ($f=1;$f<count($med);$f++)
{
if ($med[$f]=="si"){$mediao=$sumao[$f]/$conta; $linea="<div class='dcha'>".number_format($mediao,$deci,",",".")."</div>";} else {$linea="";}
$kiki=$kiki.$linea.";";
}
$kiki = substr($kiki, 0, -1);

echo '</TR><TR class="modo2">';
echo '<TH class="modo2">';
echo str_replace(";","</TD><TH class='modo2'>",$kiki);
echo '</TD>';
echo '</TR><TR>';
}

$contando=$contando-2;
// echo $contando;
echo '</TR><TR class="modo2">';
echo '<TH class="modo2">';
echo str_replace(";","</TD><TH class='modo2'>",$contando." registros");
echo '</TD>';
echo '</TR><TR>';

// FINALIZA LA TABLA
echo '</TR></TABLE></p>';
echo '<br>';


if ($contando==0) {echo '<a href="importar.php?impo='.$labase[1].'.csv" title="Importar base de datos">    <img src="subir.png" width="30px"></a>';}
echo '<br>';

?>

<!-- BUSQUEDA EN LA TABLA DE DATOS -->
<script language="JavaScript">
var TRange=null

function busca (str) {
 if (parseInt(navigator.appVersion)<4) return;
 var strFound;
 if (window.find) {

  strFound=self.find(str);
  if (!strFound) {
   strFound=self.find(str,0,1)
   while (self.find(str,0,1)) continue
  }
 }
 else if (navigator.appName.indexOf("Microsoft")!=-1) {

    if (TRange!=null) {
   TRange.collapse(false)
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
  if (TRange==null || strFound==0) {
   TRange=self.document.body.createTextRange()
   strFound=TRange.findText(str)
   if (strFound) TRange.select()
  }
 }
 else if (navigator.appName=="Opera") {
  alert ("Opera no soporta busqueda")
  return;
 }
//  if (!strFound) alert ("Cadena '"+str+"' no fue Encontrada")
 return;
}
</script>
