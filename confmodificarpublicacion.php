<?php
session_start();
$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion){
    die("No se puede conectar por lo siguiente: ".mysql_error());
}

$id_p= $_POST['id_p'];
$titulo = $_POST['titulo'];
$contenido = $_POST['contenido']; 

mysql_select_db("whiplash",$conexion);
mysql_query("UPDATE publicacion set titulo='$titulo' WHERE id_publicacion='$id_p'");
mysql_query("UPDATE publicacion set contenido='$contenido' WHERE id_publicacion='$id_p'");

echo 'Modificaciones realizadas. Publicacion actualizada, <a href="administrarpublicaciones.php">volver</a>.';

mysql_close($conexion);
?>