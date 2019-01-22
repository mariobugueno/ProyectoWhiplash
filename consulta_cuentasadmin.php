<?php

$conexion=mysql_connect("localhost","root","m1189t0390");
if (!$conexion) {
	die("no se ha podido conectar por la siguiente razon: ".mysql_error());
}
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];

mysql_select_db("whiplash",$conexion);

$peticion=mysql_query("SELECT * FROM admin");
?>

<table class="table table-striped table-dark table-bordered">
	<thead>
		<tr>
			<th scope="col" class="estilotexto">nombre</th>
            <th scope="col" class="estilotexto">apellido</th>
            <th scope="col" class="estilotexto">email</th>
            <th scope="col" class="estilotexto">accion</th>
        </tr>
    </thead>
    <tbody>

<?php
while($fila=mysql_fetch_array($peticion)) {
	echo "<tr>";
		echo "<td>".$fila['nombre']."</td>";
		echo "<td>".$fila['apellido']."</td>";
		echo "<td>".$fila['email']."</td>";
		echo "<td><input type='image' height='32px' name='editar' onclick=\"pedirDatos('".$fila['email']."')\" src='img/glyph-iconset-master/svg/si-glyph-pencil.svg'/>";
		echo "	  <input type='image' height='32px' name='eliminar' onclick=\"eliminarDato('".$fila['email']."')\" src='img/glyph-iconset-master/svg/si-glyph-delete.svg'/></td>";

	}
?>
	</tbody>
</table>
