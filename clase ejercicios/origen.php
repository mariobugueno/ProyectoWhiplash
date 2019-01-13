<?php

//include se trabaja junto con incluido.php
echo "Yo soy el archivo ORIGEN";
include "incluido.php"; //deja pasar si no esta el documento.
echo "<br>";
//require "incluido.php"; arroja error si no esta el documento.
echo "Soy el mensaje SIGUIENTE";


//trabajo con sesiones. se trabaja junto con destino.php
echo "<br><br>";
session_start();
$_SESSION["segundavariable"]="ADIOS...";
$primeravariable="HOLA ";
echo $primeravariable;
echo "<a href='destino.php'> Voy al destino</a>";


//funciones
echo "<br><br>";
function miTabla($numero){
	for ($multiplicador=0;$multiplicador<=10;$multiplicador++) {
		echo $numero." X ".$multiplicador." = ".$numero*$multiplicador."<br>";
	}
}

for($otronumero=0;$otronumero<=10;$otronumero++){
	echo "Tabla del ".$otronumero."<br>";
	miTabla($otronumero);
}

?>