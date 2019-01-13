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
        <a class="navbar-brand ml-auto mr-auto" href="index.html"><img src="img/logoWhiplash blanco.png" height="60"></a>
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
    </nav>
  </header>
  <section class="login-block">
    <div class="container tamaño">
      <div class="row">
        <div class="col-md-5 login-sec">
          <h2 class="text-center estilotexto text-uppercase">nueva cuenta</h2>
          <form class="login-form" action="nuevoadmin.php" method="post">
            <div class="row">
            <div class="col-md-6 form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Nombre</label>
              <input type="text" class="form-control" name="nombre" id="inputnombre3" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Apellido</label>
              <input type="text" class="form-control" name="apellido" id="inputApellido3" placeholder="Apellido" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group">
              <label for="exampleInputPassword1" class="text-uppercase">email</label>
              <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email" required>
            </div>
            <div class="col-md-6 form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Contraseña</label>
              <input type="password" class="form-control" name="password" id="inputpassword3" placeholder="Contraseña" required>
            </div>
          </div>
            <div class="form-check text-center py-3">
              <button type="submit" class="btn btn-login estilotexto">registrarme</button>
            </div>
          </form>
        </div>
        <div class="col-md-7 banner my-auto">
            <div id="demo" class="carousel slide" data-ride="carousel">
              <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
              </ul>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="img/bcarrusel1.jpg" width="630" height="420">
                </div>
                <div class="carousel-item">
                  <img src="img/bcarrusel2.jpg" width="630" height="420">
                </div>
                <div class="carousel-item">
                  <img src="img/bcarrusel3.jpg" width="630" height="420">
                </div>
              </div>     
            </div>
        </div>
      </div>
    </div>
  </section>

</body>
</html>