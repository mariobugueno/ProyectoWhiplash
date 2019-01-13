<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$email = $_POST['email'];

mysql_select_db("whiplash",$conexion);
$peticion=mysql_query("SELECT * FROM admin WHERE email='$email'");

if($fila=mysql_fetch_array($peticion)) {
    
    mysql_query("DELETE FROM admin WHERE email = '$email'");
    echo "se han eliminado los datos. <a href='pruebaregistroadminnuevo.php'>volver</a>";
}
else{
	echo "NO se han eliminado datos. <a href='pruebaregistroadminnuevo.php'>volver</a>";
}

mysql_close($conexion);

?>