<?php 

	function abrirConexion() {

		$conexion = mysqli_connect('localhost', 'root', '','inmobiliaria');
		mysqli_set_charset($conexion, 'utf8');

		if (!$conexion) {
			echo "<strong>¡ERROR! Conexión a la BD fallida</strong>";
		}

		return $conexion;

	}

  function comprobarUsuario() {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo'] != 'u') {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
      }
    } else if ($_COOKIE['datos']) {
        session_decode($_COOKIE['datos']);
        if ($_SESSION['tipo'] != 'u') {
          echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
        }
    } else {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  }

  function comprobarAdmin() {
    if (isset($_SESSION['tipo'])) {
      if ($_SESSION['tipo'] != 'a') {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
      }
    } else if ($_COOKIE['datos']) {
      session_decode($_COOKIE['datos']);
      if ($_SESSION['tipo'] != 'a') {
        echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
      }
    } else {
      echo "<META HTTP-EQUIV='REFRESH'CONTENT='0;URL=../index.php'>";
    }
  }

  function comprobarIndex() {
    if (isset($_SESSION['tipo'])) {
      //echo "Tipo: ".$_SESSION['tipo']." - Desde sesión";
    } else if (isset($_COOKIE['datos'])) {
      session_decode($_COOKIE['datos']);
      //echo "Tipo: ".$_SESSION['tipo']." - Desde cookies";
    } else {
      //echo "No hay sesión";
    }
  }

  

  function tipoMenu() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo "<header class='header'>
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
                                  <li><a href='inmuebles_disponibles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles disponibles</a></li>
                                  <li><a href='misinmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                                  <li><a href='mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                                  <li><a href='mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                                  <li><a href='./cerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                               </ul>
                            </nav>
                        </div>
                    </div>
                  </header>";
      } else if ($tipo_usuario == 'a') {
        echo "<header class='header'>
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
                                <li><a href='noticias.php'><span class='glyphicon glyphicon-bullhorn'></span> Noticias</a></li>
                                <li><a href='clientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                                <li><a href='inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                                <li><a href='citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                                <li><a href='cerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                             </ul>
                          </nav>
                      </div>
                  </div>
                </header>";
      } else {
        echo "<header class='header'>
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
                              <li><a href='ver_todos.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                              <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                              <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
                           </ul>
                        </nav>
                    </div>
                </div>
              </header>";
      }
    } else {
      echo "<header class='header'>
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
                            <li><a href='ver_todos.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                            <li><a href='contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                            <li><a href='acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
                         </ul>
                      </nav>
                  </div>
              </div>
            </header>";
      
    }
  }

  function tipoMenuIndex() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo "<header class='header'>
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
                          <li><a href='./php/inmuebles_disponibles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles disponibles</a></li>
                          <li><a href='./php/misinmuebles.php'><span class='glyphicon glyphicon-folder-open'></span> Mis inmuebles</a></li>
                          <li><a href='../inmobiliaria/php/mis_datos.php'><span class='glyphicon glyphicon-pencil'></span> Mis datos personales</a></li>
                          <li><a href='./php/mis_citas.php'><span class='glyphicon glyphicon-calendar'></span> Mis citas</a></li>
                          <li><a href='../inmobiliaria/php/cerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                        </ul>
                      </nav>
                  </div>
                </div>
              </header>"; 
      } else if ($tipo_usuario == 'a') {
        echo "<header class='header'>
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
                          <li><a href='./php/noticias.php'><span class='glyphicon glyphicon-bullhorn'></span> Noticias</a></li>
                          <li><a href='./php/clientes.php'><span class='glyphicon glyphicon-user'></span> Clientes</a></li>
                          <li><a href='./php/inmuebles.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                          <li><a href='./php/citas.php'><span class='glyphicon glyphicon-calendar'></span> Citas</a></li>
                          <li><a href='./php/cerrrarsesion.php'><span class='glyphicon glyphicon-log-in'></span> Cerrar sesión</a></li>
                        </ul>
                      </nav>
                  </div>
                </div>
              </header>";
      } else {
        echo "<header class='header'>
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
                          <li class='active'><a href='http://localhost/inmobiliaria/php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
                        </ul>
                      </nav>
                  </div>
                </div>
              </header>";
      }
    } else {
      echo "<header class='header'>
      <div class='contenedor'>
          <div class='row align-items-center justify-content-between'>
              <div class='logo'>
                 <a href='./index.php'>SISAI</a>
              </div>
              <button type='button' class='nav-toggler'>
                 <span></span>
              </button>
              <nav class='nav'>
                 <ul>
                    <li class='active'><a href='./index.php'><span class='glyphicon glyphicon-home'></span> Inicio</a></li>
                    <li><a href='./php/ver_todos.php'><span class='glyphicon glyphicon-briefcase'></span> Inmuebles</a></li>
                    <li><a href='./php/contacto.php'><span class='glyphicon glyphicon-envelope'></span> Contacto</a></li>
                    <li><a href='./php/acceder.php'><span class='glyphicon glyphicon-log-in'></span> Acceder</a></li>
                 </ul>
              </nav>
          </div>
      </div>
   </header>";
    }
  }

  //--::::Footer::::::--
  function tipoFooter() {
    if (isset($_SESSION['tipo'])) {
      $tipo_usuario = $_SESSION['tipo'];
      if ($tipo_usuario == 'u') {
        echo "<footer class='pie-pagina'>
                <div class='waves'>
                  <div class='wave' id='wave1'></div>
                  <div class='wave' id='wave2'></div>
                  <div class='wave' id='wave3'></div>
                  <div class='wave' id='wave4'></div>
                </div>
                  <div class='grupo-1'>
                    <div class='box'>
                        <figure>
                          <a href='../index.php'>
                            <img src='logo2.png' alt='Logo de SISAI'>
                          </a>
                        </figure>
                    </div>
                    <div class='box'>
                      <h2>SOBRE NOSOTROS</h2>
                      <p>SISAI es una aplicacion web destinada a funcionar como plataforma para buscar tu casa ideal</p>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                    </div>
                    <div class='box'>
                      <h2>SIGUENOS</h2>
                      <div class='red-social'>
                        <a href='#' class='fa fa-facebook'></a>
                        <a href='#' class='fa fa-instagram'></a>
                        <a href='#' class='fa fa-twitter'></a>
                        <a href='#' class='fa fa-linkedin'></a>
                      </div>
                    </div>
                  </div>
                  <div class='grupo-2'>
                      <small>&copy; 2021 <b>SISAI</b> - Todos los Derechos Reservados.</small>
                  </div>
              </footer>";
      } else if ($tipo_usuario == 'a') {
        echo "<footer class='pie-pagina'>
                <div class='waves'>
                  <div class='wave' id='wave1'></div>
                  <div class='wave' id='wave2'></div>
                  <div class='wave' id='wave3'></div>
                  <div class='wave' id='wave4'></div>
                </div>
                  <div class='grupo-1'>
                    <div class='box'>
                        <figure>
                          <a href='../index.php'>
                            <img src='logo2.png' alt='Logo de SISAI'>
                          </a>
                        </figure>
                    </div>
                    <div class='box'>
                      <h2>SOBRE NOSOTROS</h2>
                      <p>SISAI es una aplicacion web destinada a funcionar como plataforma para buscar tu casa ideal</p>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                    </div>
                    <div class='box'>
                      <h2>SIGUENOS</h2>
                      <div class='red-social'>
                        <a href='#' class='fa fa-facebook'></a>
                        <a href='#' class='fa fa-instagram'></a>
                        <a href='#' class='fa fa-twitter'></a>
                        <a href='#' class='fa fa-linkedin'></a>
                      </div>
                    </div>
                  </div>
                  <div class='grupo-2'>
                      <small>&copy; 2021 <b>SISAI</b> - Todos los Derechos Reservados.</small>
                  </div>
              </footer>";
      } else {
        echo "<footer class='pie-pagina'>
                <div class='waves'>
                  <div class='wave' id='wave1'></div>
                  <div class='wave' id='wave2'></div>
                  <div class='wave' id='wave3'></div>
                  <div class='wave' id='wave4'></div>
                </div>
                  <div class='grupo-1'>
                    <div class='box'>
                        <figure>
                          <a href='../index.php'>
                            <img src='logo2.png' alt='Logo de SISAI'>
                          </a>
                        </figure>
                    </div>
                    <div class='box'>
                      <h2>SOBRE NOSOTROS</h2>
                      <p>SISAI es una aplicacion web destinada a funcionar como plataforma para buscar tu casa ideal</p>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                    </div>
                    <div class='box'>
                      <h2>SIGUENOS</h2>
                      <div class='red-social'>
                        <a href='#' class='fa fa-facebook'></a>
                        <a href='#' class='fa fa-instagram'></a>
                        <a href='#' class='fa fa-twitter'></a>
                        <a href='#' class='fa fa-linkedin'></a>
                      </div>
                    </div>
                  </div>
                  <div class='grupo-2'>
                      <small>&copy; 2021 <b>SISAI</b> - Todos los Derechos Reservados.</small>
                  </div>
              </footer>";
      }
    } else {
      echo "<footer class='pie-pagina'>
                <div class='waves'>
                  <div class='wave' id='wave1'></div>
                  <div class='wave' id='wave2'></div>
                  <div class='wave' id='wave3'></div>
                  <div class='wave' id='wave4'></div>
                </div>
                  <div class='grupo-1'>
                    <div class='box'>
                        <figure>
                          <a href='index.php'>
                            <img src='logo2.png' alt='Logo de SISAI'>
                          </a>
                        </figure>
                    </div>
                    <div class='box'>
                      <h2>SOBRE NOSOTROS</h2>
                      <p>SISAI es una aplicacion web destinada a funcionar como plataforma para buscar tu casa ideal</p>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, ipsa?</p>
                    </div>
                    <div class='box'>
                      <h2>SIGUENOS</h2>
                      <div class='red-social'>
                        <a href='#' class='fab fa-facebook-f'></a>
                        <a href='#' class='fab fa-instagram'></a>
                        <a href='#' class='fab fa-twitter'></a>
                        <a href='#' class='fab fa-linkedin-in'></a>
                      </div>
                    </div>
                  </div>
                  <div class='grupo-2'>
                      <small>&copy; 2021 <b>SISAI</b> - Todos los Derechos Reservados.</small>
                  </div>
              </footer>";
    }
  }

  function mostarImagenes(){
    $conexion = abrirConexion();
                      $coge_imagen = "select imagen from inmuebles";
                      $imagenes = array();

                      $imagen = mysqli_query($conexion,$coge_imagen);
                      
                      if (!$imagen) {
                        echo "Se ha producido un error al cargar las imagenes";
                      } else {
                        while ($fila = mysqli_fetch_array($imagen,MYSQLI_ASSOC)) {
                          array_push($imagenes,$fila['imagen']);
                        }
                      }
                      mysqli_close($conexion);

                      $max = count($imagenes) - 1;
                      $azar = rand(0,$max);
                      echo "<img src='./php/$imagenes[$azar]' class='img-rounded img-responsive' style='width:100%; align:center; border:solid 0.5px' > ";
  }
	
  function mostrarCalendario($dia, $mes, $año) {
    
      switch ($mes) {
        case 1:
          $nombre_mes='Enero';
          break;
        case 2:
          $nombre_mes='Febrero';
          break;
        case 3:
          $nombre_mes='Marzo';
          break;
        case 4:
          $nombre_mes='Abril';
          break;
        case 5:
          $nombre_mes='Mayo';
          break;
        case 6:
          $nombre_mes='Junio';
          break;
        case 7:
          $nombre_mes='Julio';
          break;
        case 8:
          $nombre_mes='Agosto';
          break;
        case 9:
          $nombre_mes='Septiembre';
          break;
        case 10:
          $nombre_mes='Octubre';
          break;
        case 11:
          $nombre_mes='Noviembre';
          break;  
        case 12:
          $nombre_mes='Diciembre';
          break;

        default:
          $nombre_mes='';
          break;
      }
      

      // guardo el mes por semanas en un array
      $semana = 1;
     
      for ( $i=1;$i<=date( 't', strtotime( $año."-".$mes."-".$dia) );$i++ ) { // dia 1 al numero de dias del mes
        $dia_semana = date( 'N', strtotime(  $año."-".$mes."-".$i )  );// numero del dia
        $calendario[$semana][$dia_semana] = $i; //Guardo el mes en un array
        if ( $dia_semana == 7 ) // si el dia de la semana es 7 cambio de semana
        $semana++;
      }

      // consulto las citas del mes
      /* por cada fecha, cojo el mes y si es igual al actual lo guardo en un array (la fecha entera)
          y cuando muestro el calendario compara si hay un dia del array igual al dia del mes que pasa
          y si es así lo marco el calendario (background-color) */
      $citas_mes = array();
      $conexion = abrirConexion();
      $consulta = "select fecha from citas where fecha like '$año-$mes-%'";
      $fechas = mysqli_query($conexion,$consulta);
      if (!$fechas) {
        echo "Error al cargar las fechas de las citas...";
      } else {
        echo "<p align='center'><b>Las citas del mes aparecen marcadas</b></p>";
        while ($fila = mysqli_fetch_array($fechas,MYSQLI_ASSOC)) {
          $fe_marca = strtotime($fila['fecha']);
          $mesA = date('n',$fe_marca);
          $dia = date('d',$fe_marca);
          if ($mesA == date('n')) {
            array_push($citas_mes, $dia);
          }
        }
      }

      // muestro el calendario del mes
      echo "<h4>$nombre_mes</h4>";
      echo "<table class='table'>";
        echo "<tbody>";
        echo "<tr bgcolor='#b2b6b9'><th>L</th><th>M</th><th>X</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>"; //Días de la semana
        foreach ($calendario as $dias_mes) { // cojo los días del mes almacenados en el array
          echo "<tr>";
          for ($i = 1; $i <= 7; $i++) {

            if (isset($dias_mes[$i])) {
              //busca en el array citas el día por el que va i para comprobar si hay alguna
              if (in_array($dias_mes[$i],$citas_mes)) { //busca en el array citas el numero del dia / aquí si hay cita
                $con = abrirConexion();
                $sql = "select motivo,hora,lugar from citas where fecha='$año-$mes-$dias_mes[$i]'";
                $consultar_citas = mysqli_query($con,$sql);
                if ($consultar_citas) {

                  $num_filas = mysqli_num_rows($consultar_citas);

                  if ($num_filas == 1) { // hay 1 cita
                    while ($fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC)) {
                      //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                      $marca_hora = strtotime($fila['hora']);
                      $h_formateada = date("G:i",$marca_hora);
                      echo "<td bgcolor='#baa35f'>
                          <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a><br>
                          <a href='#' data-toggle='popover' title='Citas del día' data-content='· $fila[motivo] a las $h_formateada en $fila[lugar]'><span class='glyphicon glyphicon-eye-open'></span></a>
                        </td>";
                    }
                  } else { // hay mas de una cita
                      $contenido = ""; 
                      while ($fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC)) {
                        //$fila = mysqli_fetch_array($consultar_citas,MYSQLI_ASSOC);
                        $marca_hora = strtotime($fila['hora']);
                        $h_formateada = date("G:i",$marca_hora);
                        $contenido .= " · $fila[motivo] a las $h_formateada en $fila[lugar] &#013";
                      }

                      echo "<td bgcolor='#baa35f'>
                          <a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a><br>
                          <a href='#' data-toggle='popover' title='Citas del día' data-content='".$contenido."'><span class='glyphicon glyphicon-eye-open'></span></a>
                        </td>";
                  }
                } else {
                  echo "¡ERROR! no se ha podido conectar con la BD...";
                }
              } else { // Día sin cita
                echo "<td bgcolor='white'><a href='nueva_cita.php?mes=$mes&dia=$dias_mes[$i]&anio=$año'>".$dias_mes[$i]."</a></td>";
              }
            } else {
              echo "<td></td>";
            }

          }
          echo "</tr>";
        }
        echo "</tbody>";
      echo "</table>";
    
    $mes_antes = $mes-1;
    $mes_despues = $mes+1;
    echo "<ul class='pager'>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_antes&anio=".$año."'>Atrás</a></li>
              <li><a class='btn btn-warnig' role='button' href='citas.php?mes=$mes_despues&anio=".$año."'>Siguiente</a></li>
          </ul>";

  }
?>