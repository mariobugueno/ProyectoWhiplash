<?php
error_reporting(0);
session_start();
$con = new mysqli("localhost", "root", "m1189t0390", "whiplash");
if ($con->connect_errno)
{
       echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
       exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
if ($_POST['email'] == null || $_POST['password'] == null)
{
    echo '<span>Por favor complete todos los campos.</span>';
}
else
{
    $email = mysqli_real_escape_string($_POST['email'], $con);
    $password = mysqli_real_escape_string($_POST['password'], $con);
    $consulta = mysqli_query($con, "SELECT email, password FROM admin WHERE email = '$email' AND password = '$password'");
    if (mysqli_num_rows($consulta) > 0)
    {
        $_SESSION["email"] = $user;
        echo '<script>location.href = "welcome.php"</script>';
    }
    else
    {
        echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
    }
}
?>