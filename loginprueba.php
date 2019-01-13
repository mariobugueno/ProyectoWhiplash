<?php
session_start();
$conexion=mysql_connect("localhost","root","m1189t0390");
if(!$conexion){
    die("No se puede conectar por lo siguiente: ".mysql_error());
}

$email = $_POST['email'];
$password = $_POST['password'];

mysql_select_db("whiplash",$conexion);
$peticion=mysql_query("SELECT * FROM admin WHERE email='$email' AND password='$password'");

if($fila=mysql_fetch_array($peticion)) {
    
        $_SESSION['email'] = $email;
     
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: index.php");
    }
    else{
        echo 'El email o password es incorrecto, <a href="ingresoadmin.html">vuelva a intentarlo</a>.';
    }

?>