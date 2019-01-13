<?php
session_start();
$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion){
    die("No se puede conectar por lo siguiente: ".mysql_error());
}

$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

mysql_select_db("whiplash",$conexion);
mysql_query("UPDATE admin set nombre='$nombre' WHERE email='$email'");
mysql_query("UPDATE admin set apellido='$apellido' WHERE email='$email'");
mysql_query("UPDATE admin set password='$password' WHERE email='$email'");

echo 'Modificaciones realizadas. Cuenta actualizada, <a href="pruebaregistroadminnuevo.php">volver</a>.';

mysql_close($conexion);
?>