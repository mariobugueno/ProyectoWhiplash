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
          <h2 class="text-center estilotexto text-uppercase">nueva publicación</h2>
          <form class="login-form" action="subirpublicacion.php" method="post">
            <div class="row">
              <div class="col-md-12 form-group">
                <label class="estilotexto">título</label>
                <input type="text" class="form-control" name="titulo" id="inputTitulo3" placeholder="Título" required>
              </div>
              <div class="col-md-12 form-group">
                <label class="estilotexto">publicación</label>
                <textarea class="form-control" name="contenido" id="idcontenido" rows="5" required></textarea>
              </div>
            </div>
            <div class="form-check text-center py-3">
              <button type="submit" class="btn btn-login estilotexto">publicar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

</body>
</html>