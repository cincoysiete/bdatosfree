<?php 
session_start(); 
$_SESSION["gusuario"]="";
$_SESSION["gclave"]="";
$_SESSION["gusuario1"]="";
$_SESSION["gclave1"]="";
// session_destroy(); 
include("encriptado.php");
// include("variables.php");
include("constantes.php");
include("cincoysiete.css"); 

?>
<html lang="es">
<?php header('Content-Type: text/html; charset=UTF-8'); ?>

<link rel="manifest" href="manifest.json">
<link rel="icon" type="image/png" href="favicon.png" />
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<!-- <link rel="stylesheet" href="_formoid_files/formoid1/formoid-solid-blue.css" type="text/css" />
<script type="text/javascript" src="_formoid_files/formoid1/jquery.min.js"></script> -->
<title><?php echo $nom; ?></title>

<style>
    body{
background: url(<?php echo $img; ?>?wewe=0) no-repeat center center fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
}
</style>


<!-- DISEÑO DE FORMULARIO -->
<style>
*{box-sizing:border-box;}

form{
	width:100%;
	padding:16px;
	border-radius:10px;
	margin:auto;
	/* background-color:#CCDCFF; */
	background-color:#bbd7cf;
}

form label{
	width:72px;
	font-weight:bold;
	display:inline-block;
}

form input[type="password"],
form input[type="text"],
form input[type="email"]{
	width:100%;
	height:40px;
	padding:3px 10px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;
	margin:8px 0;
	display:inline-block;
}

form input[type="submit"]{
	width:100%;
	padding:8px 16px;
	margin-top:32px;
	border:1px solid #000;
	border-radius:5px;
	display:block;
	color:#fff;
	background-color:#19ba8c;
} 

form input[type="submit"]:hover{
	cursor:pointer;
}

textarea{
	width:100%;
	height:100px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;			
	margin:8px 0;
	resize: vertical | horizontal | none | both
	resize:none;
	display:block;
}

select{
	width:100%;
	height:40px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;			
	margin:8px 0;
	/*resize: vertical | horizontal | none | both*/
	resize:none;
	display:block;
}

form input[type="file"]{
	width:100%;
	padding:3px 10px;
	border:1px solid #f6f6f6;
	border-radius:3px;
	background-color:#f6f6f6;
	margin:8px 0;
	display:inline-block;
}


</style>

<center>
<br><br><br><br><br><br>
<div class="contenedor">
<form method="POST" action="entra.php" style="max-width:500px;margin:auto">

<div class="title"><h2><img class="invertir" src="<?php echo $log; ?>" width="30px"> Base de datos</h2></div>
      <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Usuario" name="gusuario">
  </div>

  <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Clave" name="gpassword">
  </div>

  <input class="submit" type="submit"  value="Acceder">

</form>
</div>
</center>

