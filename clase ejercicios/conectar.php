<?php

//CONEXION
$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion){
	die("no he podido conectar: ".mysql_error());
}

//CREAR BASE DE DATOS
/*if(mysql_query("CREATE DATABASE agenda",$conexion)){
	echo "se ha creado la base de datos";
}else{
	echo "No se ha creado la base de datos por el siguiente error: ".mysql_error();
}
*/
//SELECCIONAR BASE DE DATOS
mysql_select_db("agenda",$conexion);

//METO CREACION DE TABLA EN VARIABLE
$sql_tabla="CREATE TABLE miagenda
(
personaID int NOT NULL AUTO_INCREMENT,PRIMARY KEY(personaID),
Nombre varchar(15),
Apellido varchar(15),
Edad int,
Telefono int
)";

//CREAR TABLA
mysql_query($sql_tabla,$conexion);

mysql_query("INSERT INTO miagenda(Nombre,Apellido,Edad,Telefono) VALUES('Mario','Bugueño',29,00011)");
$insertar="INSERT INTO miagenda(Nombre,Apellido,Edad,Telefono) VALUES('Estefania','Olivares',28,000001)";

mysql_query($insertar);

//CERRAR CONEXION
mysql_close($conexion);
?>