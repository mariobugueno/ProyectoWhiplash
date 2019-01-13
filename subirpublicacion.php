<?php
session_start();

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido'];
$email = $_SESSION['email'];

mysql_select_db("whiplash",$conexion);
mysql_query("INSERT INTO publicacion(titulo,contenido,email_autor,fecha_publicacion,hora_publicacion) VALUES('$titulo','$contenido','$email',CURDATE(),NOW())");
echo "Nueva publicación ingresada correctamente. <a href='index.php'>volver</a>";



mysql_close($conexion);

?>