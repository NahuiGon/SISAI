<?php

  include "php/funciones.php";
  session_start(); 
  comprobarIndex();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!--Iconos-->
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <title>Aplicación Inmobiliaria</title>
    <!-- CSS de Bootstrap -->
    <link href="php/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Mi CSS -->
    <link rel="stylesheet" href="php/css/mis-estilos.css" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Librería jQuery requerida por los plugins de JavaScript -->
    <script src="http://code.jquery.com/jquery.js"></script>
    <!-- Todos los plugins JavaScript de Bootstrap -->
    <script src="php/js/bootstrap.js"></script>
    <!--Archivos Slider-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="php/js/jquery.flexslider.js"></script>
  	<script type="text/javascript" charset="utf-8">
    $(window).load(function() {
      $('.flexslider').flexslider({
      	touch: true,
      	pauseOnAction: false,
      	pauseOnHover: false,
      });
    });
  </script>
  </head> 
  <body>
 
    <!-- Menú de navegación -->
    <?php tipoMenuIndex(); ?>
    
    <!-- Muestro imagen de un inmueble aleatorio -->
    <div class="container-fluid ">
      <div class="row ">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 menu-inicio">
          <h1 class="text-center">Encuentra tu nuevo hogar</h1>
           <!-- Slider -->
            <section id="miSlide" class="carousel slide card tnoticias">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <img src="php/img_inmuebles/0.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/1.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/2.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/3.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/10.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/13.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                  <li>
                    <img src="php/img_inmuebles/3.png" alt="">
                    <section class="flex-caption">
                      <p></p>
                    </section>
                  </li>
                </ul>
              </div>
        </div>
      </div>
    </div> 
    
    <!-- Noticias con paneles -->
    <div class="container container-fluid pagina">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="text-center">Últimas noticias</h2>
          <div class="list-group">
            <?php 
              $con = abrirConexion();
              $sql = "select * from noticias order by fecha desc";

              $noticias = mysqli_query($con,$sql);

              if (!$noticias) {
                echo "Ups... Ha ocurrido un error al cargar las noticias :(";
              } else {
                for ($i = 0; $i < 3; $i++) {
                  $fila = mysqli_fetch_array($noticias,MYSQLI_ASSOC);
                   $marca_cita = strtotime($fila['fecha']);
                   $f_formateada = date("d-m-Y",$marca_cita);
                   echo "<div class='col-sm-4'>";
                  echo "<div class='panel-default'>";
                  echo "<div class=' card tnoticias'>";
                   //muestro info de noticia
                  echo "<img align'center' class='img-responsive' src='./php/$fila[imagen]'>
                        <h4 align='center'><b>$fila[titular]</b></h4>
                        <h5 align='center'>Fecha de publicación: $f_formateada</h5>
                        <form action='./php/ver_noticia.php' method='post'><input type='hidden' name='id' value='$fila[id]'><input class='form-control btn btn-default' type='submit' name='ver' value='Ver más'></form>"; 

                   echo "</div></div></div>"; //cierre de col-sm, panel,panel-body
                 }
              }

               mysqli_close($con);
            ?>
          </div>
        </div>
      </div>
    </div>
    <!--::::Footer::::::-->
    <?php tipoFooter(); ?>
    <!--script header desplegable-->
    <script src="php/js/main.js"></script>
  </body>
</html>