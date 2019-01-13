<?php
session_start();

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$autor = $_POST['autor'];
$comentario = $_POST['comentario'];
$id_public = $_POST['id_public'];

mysql_select_db("whiplash",$conexion);
mysql_query("INSERT INTO comentario(id_publicacion,autor,contenido,fecha,hora) VALUES('$id_public','$autor','$comentario',CURDATE(),NOW())");
echo "Nuevo comentario ingresado correctamente. <a href='index.php'>volver</a>";



mysql_close($conexion);

?>