<?php
// PERSONALIZACION

$anchoimg="150px";                  // ANCHO DE LAS IMAGENES EN LA TABLA
$altoimg="150px";                   // ALTO DE LAS IMAGENES EN LA TABLA
$imgtabla="si";                       // CON si, MUESTRA LAS FOTOS EN LA TABLA DE REGISTROS
$mibase="ejemplo";                   // NOMBRE DE LA BASE DE DATOS SIN EXTENSION
$deci="2";                          // NUMERO DE DECIMALES EN CAMPOS NUMERICOS

// NO MODIFICAR
$mibase="bases/".$mibase;

// DEFINICION DE TABLA
// ENCABEZADO Y NOMBRE DE LOS CAMPOS
$col[1]="FECHA";
$col[2]="CONCEPTO";
$col[3]="IMPORTE";
$col[4]="NOTAS";
$col[5]="FOTO1";
$col[6]="FOTO2";

// TIPOS DE CAMPOS
$tip[1]="date";
$tip[2]="text";
$tip[3]="number";
$tip[4]="textarea";
$tip[5]="image";
$tip[6]="image";

// INDICA SI HACER SUMA DE LA COLUMNA
$sum[1]="";
$sum[2]="";
$sum[3]="si";
$sum[4]="";
$sum[5]="";
$sum[6]="";

// INDICA SI HAY QUE HACER LA MEDIA DE LOS VALORES DE LA COLUMNA
$med[1]="";
$med[2]="";
$med[3]="si";
$med[4]="";
$med[5]="";
$med[6]="";


?>
