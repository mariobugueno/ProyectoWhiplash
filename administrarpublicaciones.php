<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css"></script>
  <script type="text/javascript" src="include/js/iconwc.js"></script>
  <script src="include/css/open-iconic.css"></script>
  <link rel="stylesheet" href="include/css/bootstrap.css">
  <link rel="stylesheet" href="include/css/formulario.css">
  <title>Whiplash Rock Cover Band</title>
</head>
<body>
  <header>
    <nav class="fixed-top">
      <nav class="navbar navbar-expand navbar-dark navbar-fixed-top" style="background-color: #000">
      <div class="col-md-4 my-auto"></div>
      <div class="col-md-4 text-center">
        <a class="navbar-brand ml-auto mr-auto" href="indexnormal.php"><img src="img/logoWhiplash blanco.png" height="60"></a>
      </div>
      <div class="col-md-4">
          <?php
            session_start();
            if(isset($_SESSION['email'])){
              echo '<div class="row">
                      <div class="col-md-6"><p class="estilotexto textoblanco">' . $_SESSION['email'] . '</p></div> 
                      <div class="col-md-6 float-right"><a href="cerrar-sesion.php"><button type="button" class="btn btn-primary estilotexto">cerrar sesion</button></a></div>
                    </div>';
            }else{
              header("HTTP/1.1 302 Moved Temporarily");
              header("Location: ingresoadmin.html");
            }
          ?> 
        </div>
    </nav>
    <nav class="navbar navbar-expand navbar-dark bg-dark tamañonav">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item">
            <a class="nav-link estilotexto" href="index.php">inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link estilotexto" href="#proximasfechas">próximas fechas</a>
          </li>
          <li class="nav-item">
            <div class="dropdown">
              <a class="nav-link estilotexto dropdown" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                publicaciones
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="nuevapublicacion.php">nueva publicación</a>
                <a class="dropdown-item" href="administrarpublicaciones.php">publicaciones existentes</a>
              </div>
            </div>
            <!--<a class="nav-link estilotexto" href="nuevapublicacion.php">nueva publicación</a>-->
          </li>
          <li class="nav-item">
            <a class="nav-link estilotexto" href="pruebaregistroadminnuevo.php">administrar cuentas</a>
          </li>
        </ul>
      </div>
    </nav>
    </nav>
  </header>
  <section class="login-block">
    <div class="container">
      <div class="row">
        <div class="col-md-12 login-sec">
          <h2 class="text-center estilotexto text-uppercase">publicaciones de <?php echo $_SESSION['email']; ?></h2>
          <div class="col-md-12">
            <table class="table table-striped table-dark table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="estilotexto">id</th>
                  <th scope="col" class="estilotexto">titulo</th>
                  <th scope="col" class="estilotexto">contenido</th>
                  <th scope="col" class="estilotexto">fecha</th>
                  <th scope="col" class="estilotexto">hora</th>
                  <th scope="col" class="estilotexto">comentarios</th>
                  <th scope="col" class="estilotexto">accion</th>
                </tr>
              </thead>
              <tbody>
                <!--php-->
                <?php
                  $conexion=mysql_connect("localhost","root","m1189t0390");
                  if(!$conexion){
                    die("No se puede conectar por lo siguiente: ".mysql_error());
                  }

                  mysql_select_db("whiplash",$conexion);
                  $mail=$_SESSION['email'];
                  $ppublic=mysql_query("SELECT * FROM publicacion WHERE email_autor='$mail'");

                  while ($public=mysql_fetch_array($ppublic)) {
                    echo "
                      <tr>
                        <th scope='row'>".$public['id_publicacion']."</th>
                        <td>".$public['titulo']."</td>
                        <td>".$public['contenido']."</td>
                        <td>".$public['fecha_publicacion']."</td>
                        <td>".$public['hora_publicacion']."</td>
                        <td>";
                            $id_pub=$public['id_publicacion'];
                            $contador_comentarios=0;
                            $coment=mysql_query("SELECT * FROM comentario WHERE id_publicacion='$id_pub'");
                            while ($comenta=mysql_fetch_array($coment)) {
                              $contador_comentarios=$contador_comentarios+1;
                            }
                            echo "<p class='text-center'>[ ".$contador_comentarios." ]<br> 
                                  <form class='login-form' action='vercomentarios.php' method='post'>
                                    <input type='hidden' name='id_public' value='$id_pub'>
                                    <button type='submit' class='btn btn-login'>ver comentarios</button>
                                    </form></p>";
                    
                    /* *** EN ESTE ECHO ESTAN LOS ICONOS CON LOS LINKS DE FORMULARIO PARA EDITAR Y ELIMINAR PUBLICACIONES *** */
                    /* *** DESCARGAR E INSTALAR LA LIBRERIA DE SVG DE GLYPHICONS DE BOOTSTRAP EN LA SECCION EXTEND->ICONS->GLYPH *** */
                    echo "
                        </td>
                        <td colstan='2'> 
                            <form action='modificarpublicacion.php' method='post'>
                              <input type='hidden' name='id_' value='".$public['id_publicacion']."'>
                              <input type='image' height='32px' name='editar' value='".$public['id_publicacion']."' src='img/glyph-iconset-master/svg/si-glyph-pencil.svg'/>
                            </form>
                            <form action='eliminarpublicacion.php' method='post'>
                              <input type='hidden' name='id_' value='".$public['id_publicacion']."'>  
                              <input type='image' height='32px' name='eliminar' value='".$public['id_publicacion']."' src='img/glyph-iconset-master/svg/si-glyph-delete.svg'/>
                            </form>
                        </td>
                      </tr>";
                    }
                      ?>
                <!--/php-->
              </tbody>
            </table>
          </div>  
        </div>
      </div>
    </div>
  </section>

</body>
</html>