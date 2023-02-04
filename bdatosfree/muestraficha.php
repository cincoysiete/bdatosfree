<html lang="es">
<link rel="icon" type="image/png" href="<?php echo $log; ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title><?php echo $nom; ?></title>

<?php
$kaka=explode("~",$keke);
$_SESSION["fichactual"]=$keke;

// PERMINITMOS O NO QUE SE PUEDAN EDITAR LOS CAMPOS
if ($_SESSION["editar"]==-1){$bloquear="";} else {$bloquear="disabled";}
if ($_SESSION["editar"]==-1){$txtper="desbloquear.png";}else{$txtper="bloquear.png";}
?>

<!-- MOSTRAMOS EL REGISTRO EN FORMATO FICHA-->
<div class="contenedor">
<br>
<center>
<table width='86%' border='0' bgcolor="#bbd7cf">
<tr><td align='left'>
 <a href="tabla.php"><img src="volver.png" width="30px"></a>     
</td><td align='center'>
<a href="#" title="Descargar instantánea de la ficha" onClick="window.open('lafoto.php?modi=<?php echo $_GET["modi"]; ?>&ficha=<?php echo $_GET["ficha"]; ?>','popup', 'width=540px,height=1000px')"><img src="descargar.png" width="30px"></a>
</td><td align='center'>
<a href="permitir.php" title="Permitir o no hacer cambios en la base de datos"><img src="<?php echo $txtper; ?>" width="20px"></a>
</td><td align='center'>
<a href="retrocede.php?qwer=<?php echo $kaka[0]-1; ?>"><img src="atras.png" width="30px"></a>
</td><td align='center'>
<a href="avanza.php?qwer=<?php echo $kaka[0]+1; ?>"><img src="alante.png" width="30px"></a>
</td></td></table>
<br>

<form method="POST" action="modifica.php"  enctype="multipart/form-data" style="max-width:500px;margin:auto">

<input type="hidden" name="MAX_FILE_SIZE" value="50000000"> 
<?php
for ($f=0;$f<=count($col);$f++){

// LA PRIMERA COLUMNA, CON EL NUMERO DE REGISTRO, SE OCULTA
if ($f==0){echo '<input class="input-field" type="hidden" placeholder="" name="'.$f.'" value="'.$kaka[$f].'">'; $id=$kaka[$f];} 
if ($tip[$f]=="textarea") {echo '<textarea placeholder="'.$col[$f].'" rows="10" '.$bloquear.' name="'.$f.'">'.$kaka[$f].'</textarea>';}

// MOSTRAMOS ESTOS CAMPOS SOLO SI ESTAMOS EDITANDO EL REGISTRO
if ($_SESSION["editar"]==-1){
if ($tip[$f]=="image"){
echo "<table width='100%' border='0'><tr><td width='50%'>";
$pete=$f+count($col)+1;

if ($kaka[$f]==""){
echo '<input class="input-field" type="file" placeholder="'.$kaka[$f].'" name="'.$f.'" value="'.$kaka[$f].'">'; 
}

if ($kaka[$f]!=""){
echo '<input type="text" placeholder="'.$col[$f].'" name="'.$pete.'" value="'.$kaka[$f].'" > ';
echo "</td><td align='center'>";
echo '<button class="button2" onclick="return confirmar1();"><a href="quitaimagen.php?qwei='.$kaka[0].'~'.$kaka[$f].'  ">Eliminar imagen</a></button>';
}
echo "</td></td></table>";
}
}

if ($tip[$f]=="image" and $kaka[$f]!="" and file_exists($kaka[$f])){
echo '<center><a href="'.$kaka[$f].'">'.'<img src="'.$kaka[$f].'" width="100%" >'.'</a></center>';
}

if ($tip[$f]=="number") {echo '<input class="input-field" type="'.$tip[$f].'"  placeholder="'.$col[$f].'" '.$bloquear.' name="'.$f.'" value="'.$kaka[$f].'">';}

if ($tip[$f]=="text") {echo '<input class="input-field" type="'.$tip[$f].'"  placeholder="'.$col[$f].'" '.$bloquear.' name="'.$f.'" value="'.$kaka[$f].'">';}
if ($tip[$f]=="date") {echo '<input class="input-field" type="'.$tip[$f].'"  placeholder="'.$col[$f].'" '.$bloquear.' name="'.$f.'" value="'.$kaka[$f].'">';}
if ($tip[$f]=="time") {echo '<input class="input-field" type="'.$tip[$f].'"  placeholder="'.$col[$f].'" '.$bloquear.' name="'.$f.'" value="'.$kaka[$f].'">';}
if ($tip[$f]=="password") {echo '<input class="input-field" type="'.$tip[$f].'"  placeholder="'.$col[$f].'" '.$bloquear.' name="'.$f.'" value="'.$kaka[$f].'">';}

}

?>

<!-- MOSTRAMOS ESTOS CAMPOS SOLO SI ESTAMOS EDITANDO EL REGISTRO -->
<?php if ($_SESSION["editar"]==-1){ ?>
<input class="submit" type="submit"  value="Guardar">
</form>
<center>
<br><br>
<hr>
<a href="elimina.php?qwe=<?php echo $kaka[0]; ?>"><button onclick="return confirmar();" class="button1">Eliminar registro</button></a>
<br><br>
<?php } ?>

</div>
</center>

<script>
function confirmar()
{
	if(confirm('\nATENCIÓN. Esta operación no se puede deshacer\nVas a eliminar el registro actual. \n¿Deseas continuar? '))
		return true;
	else
		return false;
}

function confirmar1()
{
	if(confirm('\nATENCIÓN. Esta operación no se puede deshacer\nVas a eliminar la imagen actual. \n¿Deseas continuar? '))
		return true;
	else
		return false;
}
</script>


<!-- </span> -->

