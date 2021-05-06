<?php       
include '../../../dominio.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permiso']=='admin') {
ob_start();
//include('../../php/cn.php');
include('../../php/connection.php');
//include('calendario_eventos.php'); 
date_default_timezone_set('America/Mexico_City');
$now = time();
if($now > $_SESSION['expire']) {
  $msj="<script>
  Swal.fire({
      title: finalMessage,
      icon: 'warning',
      timer: 2000,
      timerProgressBar: true,
      showCancelButton: false,
      showConfirmButton: false
  });
  setTimeout(
      function(){
          location.href='<?php echo URL;?>/HRM/php/root/logout.php';
  }, 2000);
</script>";
echo $msj;
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRM(Administrador)</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/icono.png" type="image/x-icon">
  
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/fonts/style.css">
  <link rel="stylesheet" href="../../css/alertify.css">
  <link rel="stylesheet" href="../../css/themes/default.css">
  <link rel="stylesheet" href="../../css/newmenu.css">
  <link rel="stylesheet" href="../../css/carga.css">

  <link rel="stylesheet" href="../../css/style-puestos.css">
  <link rel="stylesheet" href="../../css/style-personal.css">
  <link rel="stylesheet" href="../../css/stile-extra.css">
  
  <!-- inicio librerias calendario -->

  <link rel="stylesheet" href="../../packages/core/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/daygrid/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/timegrid/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/list/main.css" rel="stylesheet">
  
  <script src="../../packages/core/main.js"></script>
  <script src="../../packages/interaction/main.js"></script>
  <script src="../../packages/daygrid/main.js"></script>
  <script src="../../packages/timegrid/main.js"></script>
  <script src="../../packages/list/main.js"></script>
  <script src="../../packages/core/locales-all.js"></script>

  <!-- libreia sweet-->
  <link rel="stylesheet" href="../../package/dist/sweetalert2.min.css">
  <script src="../../package/dist/sweetalert2.all.min.js"></script>
  
<script>
   function fecha() {
   var f = new Date();
   
   var meses = new Array ("01","02","03","04","05","06","07","08","09","10","11","12");
   
   var dia = new Array ("01","02","03","04","05","06","07","08","09","10",
                     "11","12","13","14","15","16","17","18","19","20",
                     "21","22","23","24","25","26","27","28","29","30",
                        "31");
      var out = "'" + f.getFullYear() + "-" + meses[f.getMonth()]+ "-" +dia[f.getDate()-1] + "'";
      return out;
   }

</script>

  <!-- fin librerias calendario -->

  

<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/funciones-usuario.js"></script>
<script src="../../js/funcion-menu.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/datatables.min.js"></script>
<script src="../../js/alertify.js"></script>
  
<script src="../../js/dataTables.buttons.min.js"></script>
<script src="../../js/jszip.min.js"></script>
<script src="../../js/pdfmake.min.js"></script>
<script src="../../js/vfs_fonts.js"></script>
<script src="../../js/buttons.html5.min.js"></script>
<script src="../../js/reloj.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
      defaultView: 'dayGridMonth',
      defaultDate: '<?php echo $_SESSION['fecha'] ?>',
      navLinks: true, 
      editable: false,
      eventLimit: true,
      locale : 'es',
      events: 'http://localhost/sistemas/HRM/cuerpo/contenido/calendario_eventos.php',
    }); 

    calendar.render();
  });

</script>
</head>
<body>
<header>
		<!--<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
		</div>-->

		<nav>
		  <ul class="mennu">
          <li>   
                 <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" 
                     role="tab" aria-controls="pills-home" aria-selected="false">Home
                    <span class="icon-home"></span>
                 </a>
        </li>
        <li>
          <a href="#">Personal<span class="icon-users"></span></a>
             <ul>
                 <li>   
                    <a class="nav-link" id="pills-empleados-tab" data-toggle="pill" href="#pills-empleados" 
                        role="tab" aria-controls="pills-empleados" aria-selected="false">Empleados
                    <span class="icon-user-tie"></span>
                     </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-usuarios-tab" data-toggle="pill" href="#pills-usuarios" 
                    role="tab" aria-controls="pills-usuarios" aria-selected="false">Usuarios
                    <span class="icon-users"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-alergias-tab" data-toggle="pill" href="#pills-alergias" 
                    role="tab" aria-controls="pills-alergias" aria-selected="false">Alergias
                    <span class="icon-aid-kit"></span>
                     </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-direccion-tab" data-toggle="pill" href="#pills-direccion" 
                    role="tab" aria-controls="pills-direccion" aria-selected="false">Direccion
                    <span class="icon-location2"></span>
                     </a>
                </li>

             </ul>
        </li>

        <li>
          <a href="#">Puestos<span class="icon-office"></span></a>
             <ul>
                 <li>   
                    <a class="nav-link" id="pills-area-tab" data-toggle="pill" href="#pills-area" 
                        role="tab" aria-controls="pills-area" aria-selected="false">Area
                     <span class="icon-tree"></span>
                    </a>
                 </li>
                 <li>   
                   <a class="nav-link" id="pills-categoria-tab" data-toggle="pill" href="#pills-categoria" 
                    role="tab" aria-controls="pills-categoria" aria-selected="false">Categoria
                    <span class="icon-checkbox-checked"></span>
                  </a>
                 </li>
                 <li>   
                    <a class="nav-link" id="pills-antiguedad-tab" data-toggle="pill" href="#pills-antiguedad" 
                     role="tab" aria-controls="pills-antiguedad" aria-selected="false">Antiguedad
                     <span class="icon-file-text"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-consulta-tab" data-toggle="pill" href="#pills-consulta" 
                     role="tab" aria-controls="pills-consulta" aria-selected="false">Consulta
                     <span class="icon-search"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-bajas-tab" data-toggle="pill" href="#pills-bajas" 
                     role="tab" aria-controls="pills-bajas" aria-selected="false">Bajas
                     <span class="icon-user-minus"></span>
                    </a>
                </li>
            </ul>
        </li>

        <li>
          <a href="#">Extra<span class="icon-link"></span></a>
             <ul>
                <li>   
                    <a class="nav-link" id="pills-organigrama-tab" data-toggle="pill" href="#pills-organigrama" 
                  role="tab" aria-controls="pills-organigrama" aria-selected="false">Organigrama
                    <span class="icon-users"></span>
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-politicas" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Politicas
                    <span class="icon-file-zip"></span>
                 </a>
                </li>
                <li>   
                  <a class="nav-link" id="pills-objetivos-tab" data-toggle="pill" href="#pills-objetivos" 
                  role="tab" aria-controls="pills-objetivos" aria-selected="false">Objetivos
                    <span class="icon-flag"></span>
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-asignacion-tab" data-toggle="pill" href="#pills-asignacion" 
                     role="tab" aria-controls="pills-asignacion" aria-selected="false">Asignacion Dias
                    <span class="icon-stack"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-vacaciones-tab" data-toggle="pill" href="#pills-vacaciones" 
                     role="tab" aria-controls="pills-vacaciones" aria-selected="false">Vacaciones 
                    <span class="icon-airplane"></span>
                    </a>
                </li>
                 <li>   
                    <a class="nav-link" id="pills-horas-tab" data-toggle="pill" href="#pills-horas" 
                     role="tab" aria-controls="pills-horas" aria-selected="false">Horas 
                    <span class="icon-clock"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-documentosnuevos-tab" data-toggle="pill" href="#pills-documentosnuevos" 
                     role="tab" aria-controls="pills-documentosnuevos" aria-selected="false">Documentos 
                    <span class="icon-file-text"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-imagen-tab" data-toggle="pill" href="#pills-imagen" 
                     role="tab" aria-controls="pills-imagen" aria-selected="false">Imagenes
                    <span class="icon-image"></span>
                    </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-calendario-tab" data-toggle="pill" href="#pills-calendario" 
                     role="tab" aria-controls="pills-calendario" aria-selected="false">Calendario
                    <span class="icon-calendar"></span>
                     </a>
                </li>
                
            </ul>
        </li>
        <li>
        <a href="../contenido/usuario.php">Usuario 
        <span class="icon-user"></span></a>
        </li>
        <li>   
         <div id="clock"></div>
        </li>
    </ul>
		</nav>
</header>

<div class="container-fluid" id="contenido_general">
<a href="#" class="" id="bt_menu_new"><span class="icon-menu"></span></a>	
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade  in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container-fluid">
      <div class="jumbotron jumbotron-fluid" id="home-f">
        <center>  
         <h2 class="display-4">Bienvenido <?php echo $_SESSION['name'];?>!</h2>
          <p class="lead">Mantente Informado!</p>
          <p class="lead">Se tendra un maximo de 30 minutos dentro de esta plataforma, despues de eso se saldra automaticamente.</p>
          <hr class="my-4">
          <a href="../../php/root/logout.php" class="btn btn-danger">Cerrar Sesion</a>
        </center>
      </div>
     </div> 
  </div>
<!-- inicio -->
<div class="tab-pane fade " id="pills-empleados" role="tabpanel" aria-labelledby="pills-empleados-tab">
   <div class="container-fluid">
      <div id="contenedor_empleados"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-usuarios" role="tabpanel" aria-labelledby="pills-usuarios-tab">
   <div class="container-fluid">
      <div id="contenedor_usuarios"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-alergias" role="tabpanel" aria-labelledby="pills-alergias-tab">
   <div class="container-fluid">
      <div id="contenedor_alergias"></div>
   </div>
  </div>
<!-- fin --><!-- inicio -->
<div class="tab-pane fade" id="pills-direccion" role="tabpanel" aria-labelledby="pills-direccion-tab">
   <div class="container-fluid">
      <div id="contenedor_direccion"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-area" role="tabpanel" aria-labelledby="pills-area-tab">
   <div class="container-fluid">
      <div id="contenedor_area"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-categoria" role="tabpanel" aria-labelledby="pills-categoria-tab">
   <div class="container-fluid">
      <div id="contenedor_categoria"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-antiguedad" role="tabpanel" aria-labelledby="pills-antiguedad-tab">
   <div class="container-fluid">
      <div id="contenedor_antiguedad"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-consulta" role="tabpanel" aria-labelledby="pills-consulta-tab">
   <div class="container-fluid">
      <div id="contenedor_consulta"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-organigrama" role="tabpanel" aria-labelledby="pills-organigrama-tab">
   <div class="container-fluid">
      <div id="contenedor_organigrama"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-bajas" role="tabpanel" aria-labelledby="pills-bajas-tab">
   <div class="container-fluid">
      <div id="contenedor_bajas"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-politicas" role="tabpanel" aria-labelledby="pills-politicas-tab">
   <div class="container-fluid">
      <div id="contenedor_politicas"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-objetivos" role="tabpanel" aria-labelledby="pills-objetivos-tab">
   <div class="container-fluid">
      <div id="contenedor_objetivos"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-asignacion" role="tabpanel" aria-labelledby="pills-asignacion-tab">
   <div class="container-fluid">
      <div id="contenedor_asignacion"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-vacaciones" role="tabpanel" aria-labelledby="pills-vacaciones-tab">
   <div class="container-fluid">
      <div id="contenedor_vacaciones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-horas" role="tabpanel" aria-labelledby="pills-horas-tab">
   <div class="container-fluid">
      <div id="contenedor_horas"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-documentosnuevos" role="tabpanel" aria-labelledby="pills-documentosnuevos-tab">
   <div class="container-fluid">
      <div id="contenedor_documentosnuevos"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-imagen" role="tabpanel" aria-labelledby="pills-imagen-tab">
   <div class="container-fluid">
      <div id="contenedor_imagen"></div>
   </div>
  </div>
<!-- fin -->
  <div class="tab-pane fade" id="pills-calendario" role="tabpanel" aria-labelledby="pills-calendario-tab">
   <div id='calendar-container'>   
    <div id='calendar'></div>
   </div>
  </div>
</div>


</div>

<div id="contenedor_carga">
 <div id="carga"></div>
</div>
<script>
 window.onload = function(){
   var contenedor = document.getElementById('contenedor_carga');
   contenedor.style.visibility = 'hidden';
   contenedor.style.opacity = '0'
 }
</script>

<script>
    reloj('<?php echo  $_SESSION['reloj']; ?>', 'clock', 'Sesion Cerrada', '<?php echo URL;?>/HRM/php/root/logout.php');
</script>
<?php
include_once('../../php/connection.php');
$selectArea = "";
try {
   $database = new Connection();
    $db = $database->open();
     $query="select * from hrm_area";
     $selectArea = "<select class='select_area' id='select_area'><option value='0'>Todas</option>";
      foreach ($db->query($query) as $regristro) {
        $selectArea .="<option value=\'".$regristro['id_area']."\'>".$regristro['nombre']."</option>";
      }
      $selectArea .="</select>";
      echo $selectArea;
      $db = null;                 
      } catch (PDOException $e) {
         echo "Error: ".$e->getMessage()." !<br>";
      }
?>
<script type="text/javascript">
$(document).ready(function(){
 
$(".fc-left").append("<?php echo $selectArea?>");
    $('.mennu li ul').slideUp();

     $('#bt_menu_new').on('click', function(){
         $('#contenido_general').toggleClass('abrir');
     });

     $('.nav-link').click(function(){
		$('#contenido_general').toggleClass('abrir');
	});

  
     $('#contenedor_empleados').load('empleados/tabla.php'); 
     $('#contenedor_usuarios').load('usuarios/tabla.php'); 
     $('#contenedor_alergias').load('alergias/tabla.php'); 
     $('#contenedor_direccion').load('direccion/tabla.php'); 
     $('#contenedor_area').load('area/tabla.php'); 
     $('#contenedor_categoria').load('categoria/tabla.php'); 
     $('#contenedor_antiguedad').load('antiguedad/tabla.php');
     $('#contenedor_consulta').load('consulta/tabla.php');  
     $('#contenedor_objetivos').load('objetivos/tabla.php'); 
     $('#contenedor_asignacion').load('asignacion/tabla.php'); 
     $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
     $('#contenedor_bajas').load('bajas/tabla.php'); 
     $('#contenedor_horas').load('horas/tabla.php'); 
     $('#contenedor_documentosnuevos').load('documentos/tabla.php'); 
     $('#contenedor_imagen').load('imagen/tabla.php'); 
     $('#contenedor_organigrama').load('PDF/organigrama.php'); 
     $('#contenedor_politicas').load('PDF/politicas.php'); 
     
	});
</script>
</body>
</html>
<?php
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
exit;
}
?>