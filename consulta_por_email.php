<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion) {
    die("No se puede conectar por lo siguiente: ".mysql_error());
}
mysql_select_db("whiplash",$conexion);
  //consulta los datos del empleado por su id

  $emailact=$_GET['email'];

  $peticion=mysql_query("SELECT * FROM admin WHERE email='$emailact'");
  $fila = mysql_fetch_array($peticion);
  //valores de las consultas
  $nombre=$fila['nombre'];
  $apellido=$fila['apellido'];
  $email=$fila['email'];
  $password=$fila['password'];
  //muestra los datos consultados en los campos del formulario
?>

  <form name="frmadmin" action="" onsubmit="enviarDatosAdmin(); return false">
    <input name="email" type="hidden" value="<?php echo $email; ?>" />
    <p>Nombre: <input name="nombre" type="text" value="<?php echo $nombre; ?>" />
        Apellido: <input name="apellido" type="text" value="<?php echo $apellido; ?>" />
        Email: <input name="email" type="text" value="<?php echo $email; ?>" />
        Password: <input name="password" type="password" value="<?php echo $password; ?>" /></p>
    <p><input type="submit" name="Submit" value="Actualizar" /></p>
  </form>