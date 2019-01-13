<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}

$id_ = $_POST['id_'];

mysql_select_db("whiplash",$conexion);
$peticion=mysql_query("SELECT * FROM publicacion WHERE id_publicacion='$id_'");

if($fila=mysql_fetch_array($peticion)) {
    
    mysql_query("DELETE FROM publicacion WHERE id_publicacion = '$id_'");
    echo "se han eliminado los datos. <a href='administrarpublicaciones.php'>volver</a>";
}
else{
	echo "NO se han eliminado datos. <a href='administrarpublicaciones.php'>volver</a>";
}

mysql_close($conexion);

?>