<?php
$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion){
	die("No se puede conectar por lo siguiente: ".mysql_error());
}

mysql_select_db("agenda",$conexion);
$peticion=mysql_query("SELECT * FROM miagenda");

while ($fila=mysql_fetch_array($peticion)) {
	echo $fila['Nombre']." ".$fila['Apellido']." ".$fila['Edad']." ".$fila['Telefono'];
	echo "<br>";
}
mysql_close($conexion);
?>