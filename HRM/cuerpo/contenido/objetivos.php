<?php       
include '../../../dominio.php';
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permiso']=='objetivos') { 
ob_start();
//include('../../php/cn.php');
include('../../php/connection.php');
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
  <title>HRM(Asistente)</title> 
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
      events: [
        <?php 
  try {
    $database_cal = new Connection();
    $db_c = $database_cal->open();
    $sql_calendario = "SELECT hrm_vacaciones.id_vacaciones as id_vacaiones, hrm_vacaciones.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_empleado.ape_p as ape, hrm_vacaciones.dia as dia, hrm_vacaciones.color as color FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Aprobado'";  
    foreach ($db_c->query($sql_calendario) as $row_c) {
          ?>
        
        {
          id:'<?php echo $row_c["id_vacaiones"]?>',
          title:'<?php echo $row_c["nombre"]." ".$row_c["ape"]?>',
          start:'<?php echo $row_c["dia"]?>',
          color: '<?php echo $row_c["color"]?>',
        },
        <?php 
           }
           $db_c = null;                 
           } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>";
  }?>

      ]
    }); 

    calendar.render();
  });

</script>



  <!-- fin librerias calendario -->
     
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
          <a href="#">Organizacion<span class="icon-office"></span></a>
             <ul>
                 <li>   
                    <a class="nav-link" id="pills-organigrama-tab" data-toggle="pill" href="#pills-organigrama" 
                  role="tab" aria-controls="pills-organigrama" aria-selected="false">Organigrama
                    <span class="icon-users"></span>
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_adquiciciones" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Adquisiciones
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_compensaciones" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Compsensaciones
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_computo" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Computo
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_gastos" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Gastos
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_nuevos_ingresos" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Nuevos ingresos
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_telecomunicaciones" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Telecomunicaciones
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_vacaciones" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Vacaciones
                 </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-politicas-tab" data-toggle="pill" href="#pills-pol_vehiculos" 
                  role="tab" aria-controls="pills-politicas" aria-selected="false">Vehiculos
                 </a>
                </li>
            </ul>
        </li>

        <li>
          <a href="#">Extra<span class="icon-link"></span></a>
             <ul>
        
                <li>   
                  <a class="nav-link" id="pills-objetivos-tab" data-toggle="pill" href="#pills-objetivos" 
                  role="tab" aria-controls="pills-objetivos" aria-selected="false">Objetivos
                    <span class="icon-flag"></span>
                 </a>
                </li>
                <li>   
                  <a class="nav-link" id="pills-documentos-tab" data-toggle="pill" href="#pills-documentos" 
                  role="tab" aria-controls="pills-documentos" aria-selected="false">Documentos
                    <span class="icon-file-text"></span>
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
  
  <div class="tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container-fluid">
      <div class="jumbotron jumbotron-fluid" id="home-f">
        <center>  
         <h2 class="display-4">Bienvenido <?php echo $_SESSION['name'];?>!</h2>
          <p class="lead">Mantente Informado!</p>
          <p class="lead">Se tendra un maximo de 20 minutos dentro de esta plataforma, despues de eso se saldra automaticamente.</p>
          <hr class="my-4">
          <a href="../../php/root/logout.php" class="btn btn-danger">Cerrar Sesion</a>
        </center>
      </div>
     </div> 
  </div>

<!-- inicio -->
<div class="tab-pane fade" id="pills-objetivos" role="tabpanel" aria-labelledby="pills-objetivos-tab">
   <div class="container-fluid">
      <div id="contenedor_objetivos"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-documentos" role="tabpanel" aria-labelledby="pills-documentos-tab">
   <div class="container-fluid">
      <div id="contenedor_documentos"></div>
   </div>
  </div>
<!-- fin -->
  <div class="tab-pane fade" id="pills-calendario" role="tabpanel" aria-labelledby="pills-calendario-tab">
   <div id='calendar-container'>   
    <div id='calendar'></div>
   </div>
  </div>
<!-- inicio -->
<div class="tab-pane fade" id="pills-organigrama" role="tabpanel" aria-labelledby="pills-organigrama-tab">
   <div class="container-fluid">
      <div id="contenedor_organigrama"></div>
   </div>
  </div>
<!-- fin -->
<!--politicas-->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_adquiciciones" role="tabpanel" aria-labelledby="pills-adquiciones-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_adquiciciones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_compensaciones" role="tabpanel" aria-labelledby="pills-compensaciones-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_compensaciones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_computo" role="tabpanel" aria-labelledby="pills-computo-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_computo"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_gastos" role="tabpanel" aria-labelledby="pills-gastos-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_gastos"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_nuevos_ingresos" role="tabpanel" aria-labelledby="pills-ingresos-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_ingresos"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_telecomunicaciones" role="tabpanel" aria-labelledby="pills-telecomunicaciones-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_telecomunicaciones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_vacaciones" role="tabpanel" aria-labelledby="pills-vacaciones-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_vacaciones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-pol_vehiculos" role="tabpanel" aria-labelledby="pills-vehiculos-tab">
   <div class="container-fluid">
      <div id="contenedor_pol_vehiculos"></div>
   </div>
  </div>
<!-- fin -->
<!--politicas-->


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

<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/funciones-usuario.js"></script>
<script src="../../js/funcion-menu.js"></script>
<script src="../../js/bootstrap.min.js"></script>
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
    reloj('<?php echo  $_SESSION['reloj']; ?>', 'clock', 'Sesion Cerrada', '<?php echo URL?>/HRM/php/root/logout.php');
</script>
<script type="text/javascript">
$(document).ready(function(){

    $('.mennu li ul').slideUp();

     $('#bt_menu_new').on('click', function(){
         $('#contenido_general').toggleClass('abrir');
     });

     $('.nav-link').click(function(){
		$('#contenido_general').toggleClass('abrir');
	});

     $('#contenedor_objetivos').load('objetivos/tabla.php'); 
     $('#contenedor_documentos').load('documentos/tabla_o.php'); 
     
     $('#contenedor_organigrama').load('PDF/organigrama.php'); 
     
     $('#contenedor_pol_adquiciciones').load('PDF/pol_adquisiciones.php'); 
     $('#contenedor_pol_compensaciones').load('PDF/pol_compensaciones.php'); 
     $('#contenedor_pol_computo').load('PDF/pol_computo.php'); 
     $('#contenedor_pol_gastos').load('PDF/pol_gastos.php'); 
     $('#contenedor_pol_ingresos').load('PDF/pol_nuevos_ingresos.php'); 
     $('#contenedor_pol_telecomunicaciones').load('PDF/pol_telecomunicaciones.php'); 
     $('#contenedor_pol_vacaciones').load('PDF/pol_vacaciones.php'); 
     $('#contenedor_pol_vehiculos').load('PDF/pol_vehiculos.php'); 


     
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