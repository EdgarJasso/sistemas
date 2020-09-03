<?php       
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['permiso']=='jefe-area') {
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
        location.href='https://remittent-crowd.000webhostapp.com/HRM/php/root/logout.php';
  }, 2000);
</script>";
echo $msj;
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRM(Jefe de Area)</title> 
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
          <a href="#">Extra<span class="icon-link"></span></a>
             <ul>
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
    reloj('<?php echo  $_SESSION['reloj']; ?>', 'clock', 'Sesion Cerrada', 'http://remittent-crowd.000webhostapp.com/HRM/php/root/logout.php');
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

     
  
     $('#contenedor_empleados').load('empleados/tabla.php'); 
     $('#contenedor_usuarios').load('usuarios/tabla.php'); 
     $('#contenedor_direccion').load('direccion/tabla.php'); 
     $('#contenedor_area').load('area/tabla.php'); 
     $('#contenedor_categoria').load('categoria/tabla.php'); 
     $('#contenedor_antiguedad').load('antiguedad/tabla.php'); 
     $('#contenedor_objetivos').load('objetivos/tabla.php'); 
     $('#contenedor_asignacion').load('asignacion/tabla.php'); 
     $('#contenedor_vacaciones').load('vacaciones/tabla.php'); 
     $('#contenedor_documentos').load('documentos/tabla.php'); 
     $('#contenedor_imagen').load('imagen/tabla.php'); 
	});
</script>
</body>
</html>
<?php
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
exit;
}?>