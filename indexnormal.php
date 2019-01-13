<!DOCTYPE html>
<html lang="en">
<head>
  <title>Whiplash Rock Cover Band</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css"></script>
  <link rel="stylesheet" href="include/css/formulario.css">
  
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
        </div>
		</nav>
    <nav class="navbar navbar-expand navbar-dark bg-dark tamañonav">
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto ml-auto">
          <li class="nav-item">
            <a class="nav-link estilotexto" href="indexnormal.php">inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link estilotexto" href="#proximasfechas">próximas fechas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link estilotexto" href="formulario.html">contacto</a>
          </li>
        </ul>
      </div>
    </nav>
    </nav>
  </header>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/banner2-2.jpg" width="1100" height="300">
    </div>
    <div class="carousel-item">
      <img src="img/banner1-2.jpg" width="1100" height="300">
    </div>
    <div class="carousel-item">
      <img src="img/banner3.jpg" width="1100" height="300">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
  <img class="mx-auto d-block" id="noticias" src="img/noticias.png" height="300">
	<div class="redes">
		<div class="row">
			<?php
        $conexion=mysql_connect("localhost","root","m1189t0390");
        if(!$conexion){
          die("No se puede conectar por lo siguiente: ".mysql_error());
        }

        mysql_select_db("whiplash",$conexion);
        $peticionpublic=mysql_query("SELECT * FROM publicacion ORDER BY id_publicacion DESC");

        while ($public=mysql_fetch_array($peticionpublic)) {
          echo "<div class='col-md-12 my-auto'>
                  <div class='container rounded  py-3 px-3'>
                    <h2 class='estilotexto text-uppercase'>".$public['titulo']."</h2>
                    <p class='heading'>Fecha de publicación: ".$public['fecha_publicacion']." a las ".$public['hora_publicacion']."</p>
                    <p class='lead'>".$public['contenido']."</p>
                    <hr>
                    <p>
                      <button class='btn btn-dark estilotexto' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
                        ver comentarios
                      </button>
                    </p>";
                    $id=$public['id_publicacion'];
                    $peticioncoment=mysql_query("SELECT * FROM comentario WHERE id_publicacion='$id'");
                    while ($coment=mysql_fetch_array($peticioncoment)) {
                      echo"
                          <div class='collapse' id='collapseExample'>
                            <div class='col-md-8 my auto'>
                              <div class='container rounded  py-3 px-3'>
                              <p class='heading text-bold'>".$coment['autor']." escribió el día ".$coment['fecha']." a las ".$coment['hora']." :</p>
                              <p class='heading'>".$coment['contenido']."</p>
                              </div>
                              <hr class='featurette-divider'>
                            </div>
                          </div>

                            ";
                            }
          echo "    <div class='col-md-8 my-auto'>
                      <form class='login-form' action='subircomentario.php' method='post'>
                        <div class='row'>
                          <div class='col-md-6 form-group'>
                            <input type='hidden' name='id_public' value='$id'>
                            <label for='exampleInputEmail1' class='text-uppercase'>nombre</label>
                            <input type='text' class='form-control' name='autor' id='inputAutor' placeholder='Nombre' required>
                          </div>
                          <div class='col-md-12 form-group'>
                            <label for='exampleInputPassword1' class='text-uppercase'>comentario</label>
                            <textarea class='form-control' rows='2'  name='comentario' id='inputContenido' placeholder='Comentario' required></textarea>
                          </div>
                        </div>
                        <div class='form-check text-center py-3'>
                          <button type='submit' class='btn btn-login estilotexto'>comentar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <hr class='featurette-divider'>
                </div>
                <br>";
        }
        mysql_close($conexion);
      ?>
		</div>
	<div class="row">
		<div class="col-md-6 mx-auto text-center">
			<p class="estilotexto textoblanco">síguenos en facebook</p>
			<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FWhiplashCppo%2F&tabs=timeline&width=340&height=400&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="340" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
		</div>
		<div class="col-md-6 mx-auto text-center">
			<p class="estilotexto textoblanco">síguenos en instagram</p>
			<img src="img/instagram.jpg" width="340">
		</div>
	</div>
	</div>
	<hr>
	<img class="mx-auto d-block" id="proximasfechas" src="img/proximasfechas.png" height="300">
<div class="container interior rounded">
      <hr>
      <div class="row featurette">
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">sábado</h2>
          <p class="lead">17/11/2018</p>
        </div>
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">entre jotes, caldera.</h2>
          <p class="lead">Wheelwright #485 - 23:00hrs</p>
        </div>
        <div class="col-md-4">
        	<a href="https://www.facebook.com/entrejotes/" target="_blank"><img class="float-right" src="img/logo44.png" width="150"></a>
        </div>
      </div>
      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">sábado</h2>
          <p class="lead">24/11/2018</p>
        </div>
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">el origen, caldera.</h2>
          <p class="lead">Wheelwright #673 - Medianoche</p>
        </div>
        <div class="col-md-4">
        	<a href="https://www.facebook.com/elorigenrestobar/" target="_blank"><img class="float-right" src="img/logo11.jpg" width="150"></a>
        </div>
      </div>
      <hr class="featurette-divider">
      <div class="row featurette">
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">viernes</h2>
          <p class="lead">30/11/2018</p>
        </div>
        <div class="col-md-4 my-auto">
          <h2 class="estilotexto">tololo pampa, copiapó.</h2>
          <p class="lead">Atacama esq. Yumbel - Medianoche</p>
        </div>
        <div class="col-md-4">
        	<a href="https://www.facebook.com/restobartololopampa/" target="_blank"><img class="float-right" src="img/logo33.jpg" width="150"></a>
        </div>
      </div>
      <hr class="featurette-divider">
    </div>

<footer>
    <div class="col-md-12 text-center">
      <a href="indexnormal.php">&copy Whiplash Rock Cover Band.</a>
      <a class="social" href="https://www.facebook.com/whiplashcppo/" target="_blank"><img src="img/facebook_circle-512.png" height="30"></a>
      <a class="social" href="#"><img src="img/round.png" height="30"></a>
      <a class="social" href="#"><img src="img/855163_video_512x512.png" height="30"></a>
    </div>
    <div class="col-md-12 text-center estilotexto">	
      <a href="ingresoadmin.html">Ingreso Administrador</a>
    </div>
</footer>
</body>
</html>
