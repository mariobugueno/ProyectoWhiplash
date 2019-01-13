<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}

mysql_select_db("agenda",$conexion);
mysql_query("INSERT INTO miagenda(Nombre,Apellido,Edad,Telefono) VALUES('Ignacio','Garnica',25,230489)");

mysql_close($conexion);

?>