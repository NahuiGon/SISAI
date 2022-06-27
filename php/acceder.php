<?php 
  include "../php/funciones.php";
  session_start();
  if (isset($_SESSION['tipo'])) {
    $tipo_usuario = $_SESSION['tipo'];
    if ($tipo_usuario == 'u') {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    } else if ($tipo_usuario == 'a') {
    echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  }
  if (isset($_POST['acceder'])) {
    $usuario = $_POST['nick'];
    $pass = $_POST['password'];

    $md5 = md5(md5($pass));

    $con = abrirConexion();
    $sql = "select id, nombre, apellidos from clientes where nombre_usuario='$usuario' and pass='$md5'";

    $consulta = mysqli_query($con,$sql);

    if ($consulta) {
      if (mysqli_num_rows($consulta) > 0) {
        $fila = mysqli_fetch_array($consulta,MYSQLI_ASSOC);
        $_SESSION['id_usuario'] = $fila['id'];

        if ($usuario == 'admin') {
          $_SESSION['tipo'] = 'a';
          $_SESSION['nombre'] = 'Administrador';
        } else {
          $_SESSION['tipo'] = 'u';
          $_SESSION['nombre'] = $fila['nombre'].' '.$fila['apellidos'];
        }

        if (isset($_POST['check'])) {
          $datos = session_encode();
          setcookie('datos', $datos, time()+(15*24*60*60), '/');
        }

        echo "<div class='container'>
                <div class='alert alert-success'>
                  <strong>¡Acceso correcto!</strong> 
                </div>
              </div>";

        echo "<META HTTP-EQUIV='REFRESH'CONTENT='1;URL=../index.php'>";

      } else {
        echo "<div class='container'>
                  <div class='alert alert-danger'>
                    <h4>
                      <strong>¡Error!</strong> Usuario o contraseña incorrectos
                    </h4>
                  </div>
              </div>";
      }
    } else {
      echo "<div class='container'>
                <div class='alert alert-danger'>
                    <h4>
                      <strong>¡Error!</strong> Usuario o contraseña incorrectos
                    </h4>
                  </div>
              </div>";
    }

  }

 ?>

 <!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Iconos-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Acceder</title>
    <!-- CSS de Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="css/mis-estilos.css">
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
 
    <!-- Todos los plugins JavaScript de Bootstrap (también puedes
         incluir archivos JavaScript individuales de los únicos
         <script src="js/main.js"></script>
         plugins que utilices) -->
    <script src="js/bootstrap.js"></script>
    <!-- Documento php con funciones -->
    
  </head>
  <body>
    
    <!-- Menú de navegación -->
    <header class='header'>
      <div class='contenedor'>
          <div class='row align-items-center justify-content-between'>
              <div class='logo'>
                 <a href='../index.php'>SISAI</a>
              </div>
              <button type='button' class='nav-toggler'>
                 <span></span>
              </button>
              <nav class='nav'>
                 <ul>
                    <li><a href='../php/ver_todos.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                    <li><a href='../php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                   <li><a href='http://localhost/web-inmobiliaria/php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
                 </ul>
              </nav>
          </div>
      </div>
   </header>
   
    <!-- Formulario de acceso -->
    <div class='container-fluid cabecera-form-cli'>
      <div class='row justify-content-between'>
        <div class='col-sm-6 col-sm-6'>
          <h2 align='center'>Acceder a la aplicación</h2>
          <div class='panel panel-default '>
            <div class='panel-body'>
              <form action="#" method="post" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 col-sm-offset-2">Usuario</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="text" name="nick">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 col-sm-offset-2">Contraseña</label>
                  <div class="col-sm-6">
                    <input class="form-control" type="password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-sm-offset-2">¿Mantener sesión abierta?</label>
                  <div class="checkbox">
                    <input type="checkbox" value="open" name="check">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-2">
                    <input class="form-control btn-primary" type="submit" name="acceder" value="Acceder">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--::::Footer::::::-->
    <footer class='pie-pagina'>
      <div class='waves'>
        <div class='wave' id='wave1'></div>
        <div class='wave' id='wave2'></div>
        <div class='wave' id='wave3'></div>
        <div class='wave' id='wave4'></div>
      </div>
      <div class="title">
        <h2>SIGUENOS</h2>
        <div class='red-social'>
            <a href='#' class='fab fa-facebook-f'></a>
            <a href='#' class='fab fa-instagram'></a>
            <a href='#' class='fab fa-twitter'></a>
            <a href='#' class='fab fa-linkedin-in'></a>
        </div>
      </div>
      <div class='grupo-2'>
        <small>&copy; 2021 <b>SISAI</b> - Todos los Derechos Reservados.</small>
      </div>
    </footer>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>