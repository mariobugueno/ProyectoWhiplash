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
          <h2 class="text-center estilotexto text-uppercase">comentarios de la publicación</h2> 
            <?php
              $conexion=mysql_connect("localhost","root","m1189t0390");
                  if(!$conexion){
                    die("No se puede conectar por lo siguiente: ".mysql_error());
                  }

                  mysql_select_db("whiplash",$conexion); 
              /*$id_public=$_POST['id_public'];
              $array_p=mysql_query("SELECT * FROM publicacion WHERE id_publicacion=$id_public");
              $titulo_p=mysql_fetch_array($array_p);
              echo $titulo_p['titulo'];*/ ?>
          <div class="col-md-12">
            <table class="table table-striped table-dark table-bordered">
              <thead>
                <tr>
                  <th scope="col" class="estilotexto">id</th>
                  <th scope="col" class="estilotexto">autor</th>
                  <th scope="col" class="estilotexto">contenido</th>
                  <th scope="col" class="estilotexto">fecha</th>
                  <th scope="col" class="estilotexto">hora</th>
                  <th scope="col" class="estilotexto">accion</th>
                </tr>
              </thead>
              <tbody>
                <!--php-->
                <?php
                  
                  $mail=$_SESSION['email'];
                  $buscar=mysql_query("SELECT * FROM publicacion WHERE email_autor='$mail'");
                  $busqueda=mysql_fetch_array($buscar);
                  $id_pub=$busqueda['id_publicacion'];
                  $ccomentario=mysql_query("SELECT * FROM comentario WHERE id_publicacion=$id_pub");

                  while ($comentario=mysql_fetch_array($ccomentario)) {

                    /* ESTA SOLUCION PROVOCA 2 WARNINGS POR LAS FUNCIONES "date" Y "strtotime":
                    $fecha = date("d-m-Y", strtotime($comentario['fecha']));*/

                    echo "
                      <tr>
                        <th scope='row'>".$comentario['id_comentario']."</th>
                        <td>".$comentario['autor']."</td>
                        <td>".$comentario['contenido']."</td>
                        <td>".$comentario['fecha']."</td>
                        <td>".$comentario['hora']."</td>
                        <td colstan='2'>";
                    /* SERIA POCO "ETICO" QUE UN ADMINISTRADOR PUDIERA EDITAR LOS COMENTARIOS DE UN FAN. ESTARIA VIOLANDO SU DERECHO
                       A EXPRESARSE LIBREMENTE, MODIFICANDO LA OPINION PERSONAL ESCRITA POR OTRA PERSONA...*/
                    /*
                    echo"
                          <div class='col-md-12'>
                            <form action='modificarcomentario.php' method='post'>
                              <input type='hidden' name='id_com' value='".$comentario['id_comentario']."'>
                              <input type='image' height='32px' name='editar' value='".$comentario['id_publicacion']."' src='img/glyph-iconset-master/svg/si-glyph-pencil.svg'/>
                            </form>
                          </div>";*/
                    echo"
                          <div class='col-md-12'>
                            <form action='eliminarcomentario.php' method='post'>
                              <input type='hidden' name='id_com' value='".$comentario['id_comentario']."'>  
                              <input type='image' height='32px' name='eliminar' value='".$comentario['id_comentario']."' src='img/glyph-iconset-master/svg/si-glyph-delete.svg'/>
                            </form>
                          </div>
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