<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$email = $_GET['email'];

mysql_select_db("whiplash",$conexion);
mysql_query("DELETE FROM admin WHERE email = '$email'");
echo "<div class='estilotexto'>cuenta eliminada exitosamente.</div>";

mysql_close($conexion);
include('consulta_cuentasadmin.php');

?>