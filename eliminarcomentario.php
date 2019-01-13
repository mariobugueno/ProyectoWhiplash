<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$id_com = $_POST['id_com'];

mysql_select_db("whiplash",$conexion);
$peticion=mysql_query("SELECT * FROM comentario WHERE id_comentario='$id_com'");

if($fila=mysql_fetch_array($peticion)) {
    
    mysql_query("DELETE FROM comentario WHERE id_comentario = '$id_com'");
    echo "se han eliminado los datos. <a href='vercomentarios.php'>volver</a>";
}
else{
	echo "NO se han eliminado datos. <a href='vercomentarios.php'>volver</a>";
}

mysql_close($conexion);

?>