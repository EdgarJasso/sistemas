<?php        
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true && $_SESSION['permiso']=='root') {
   include('../../php/connection.php');
   //ob_start(); 
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
                    location.href= https://remittent-crowd.000webhostapp.com/BITACORA/php/root/logout.php';
            }, 2000);
          </script>";
  echo $msj;
  session_destroy();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bitacora(Administrador)</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/icono.png" type="image/x-icon">
  
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/fonts/style.css">
  <link rel="stylesheet" href="../../css/newmenu.css">
  <link rel="stylesheet" href="../../css/carga.css">

  <link rel="stylesheet" href="../../css/estilos-panel.css">
  
  <link rel="stylesheet" href="../../css/alertify.css">
  <link rel="stylesheet" href="../../css/themes/default.css">
  <link rel="stylesheet" href="../../package/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
  <!--<link rel="stylesheet" href="../../css/bootstrap-datetimepicker-standalone.css">-->
  
  
</head>
<body>
<header>

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
                    <a class="nav-link" id="pills-area-tab" data-toggle="pill" href="#pills-area" 
                        role="tab" aria-controls="pills-area" aria-selected="false">Area
                    <span class="icon-user-tie"></span>
                     </a>
                </li>
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
             </ul>
        </li>
        <li>
          <a href="#">Bitacora<span class="icon-book"></span></a>
             <ul>
                <li>  
                    <a class="nav-link" id="pills-servicios-tab" data-toggle="pill" href="#pills-servicios" 
                        role="tab" aria-controls="pills-sevicios" aria-selected="false">Servicios
                    <span class="icon-folder-plus"></span>
                     </a>
                </li>
                 <li>  
                    <a class="nav-link" id="pills-peticiones-tab" data-toggle="pill" href="#pills-peticiones" 
                        role="tab" aria-controls="pills-peticiones" aria-selected="false">Peticiones
                    <span class="icon-folder-plus"></span>
                     </a>
                </li>
                <li>   
                    <a class="nav-link" id="pills-bitacora-tab" data-toggle="pill" href="#pills-bitacora" 
                    role="tab" aria-controls="pills-bitacora" aria-selected="false">Bitacora
                    <span class="icon-history"></span>
                    </a>
                </li>
             </ul>
        </li>
        <li>   
        <div id="clock"></div>
        </li>
    </ul>
		</nav>
</header>

<div class="container-fluid" id="contenido_general">
  

<section id="layout">
<div class="caja bt-m">
          <a href="#" class="" id="bt_menu_new">
            <span class="icon-menu"></span>
          </a>
        </div>
        <button type="button" class="btn btn-primary bt-marcadores" 
        data-toggle="collapse" data-target="#marcadores-collapse">Marcadores 
        <span class="icon-meter"></span></button>

        <div class="collapse caja marcador-m in" id="marcadores-collapse">
          <div id="marcadores">

            

          </div>
        </div>
</section>


<div class="tab-content" id="pills-tabContent">
<!-- inicio -->
  <div class="tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container-fluid">
      <div class="jumbotron jumbotron-fluid" id="home-f">
        <center>  
         <h2 class="display-4">Bienvenido <?php echo $_SESSION['name'];?>!</h2>
          <p class="lead">Mantente Informado!</p>
          <p class="lead">Se tendra un maximo de 10 minutos dentro de esta plataforma, despues de eso se saldra automaticamente.</p>
          <hr class="my-4">
          
          <a href="../../php/root/logout.php" class="btn btn-danger">Cerrar Sesion</a>
        </center>
      </div>
     </div> 
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-area" role="tabpanel" aria-labelledby="pills-area-tab">
   <div class="container-fluid">
      <div id="contenedor_area"></div>
   </div>
  </div>
<!-- fin -->
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
<div class="tab-pane fade " id="pills-servicios" role="tabpanel" aria-labelledby="pills-servicios-tab">
   <div class="container-fluid">
      <div id="contenedor_servicios"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-peticiones" role="tabpanel" aria-labelledby="pills-peticiones-tab">
   <div class="container-fluid">
      <div id="contenedor_peticiones"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade" id="pills-bitacora" role="tabpanel" aria-labelledby="pills-bitacora-tab">
   <div class="container-fluid">
      <div id="contenedor_bitacora"></div>
   </div>
  </div>
<!-- fin -->
</div>


</div>

<div id="contenedor_carga">
 <div id="carga"></div>
</div>
<script>
 window.onload = function(){
   var contenedor = document.getElementById('contenedor_carga');
   contenedor.style.visibility = 'hidden';
   contenedor.style.opacity = '0';
 }
</script>

<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/funcion-menu.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/datatables.min.js"></script>
<script src="../../js/alertify.min.js"></script>

<script src="../../package/dist/sweetalert2.min.js"></script>
<script src="../../js/moment.min.js"></script>
<script src="../../js/bootstrap-datetimepicker.min.js"></script>

<script src="../../js/dataTables.buttons.min.js"></script>
<script src="../../js/jszip.min.js"></script>
<script src="../../js/pdfmake.min.js"></script>
<script src="../../js/vfs_fonts.js"></script>
<script src="../../js/buttons.html5.min.js"></script>
<script src="../../js/reloj.js"></script>
<script type="text/javascript">
 reloj('<?php echo  $_SESSION['reloj']; ?>', 'clock', 'Sesion Cerrada', ' https://remittent-crowd.000webhostapp.com/BITACORA/php/root/logout.php');
$(document).ready(function(){

    $('.mennu li ul').slideUp();

    $('#bt_menu_new').on('click', function(){
        $('#contenido_general').toggleClass('abrir');
    });
    $('#bt_menu_new').on('click', function(){
        $('.mennu li ul').slideUp();
    });

    $('.nav-link').click(function(){
	    $('#contenido_general').toggleClass('abrir');
	});
    $('#marcadores').load('../marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
     
	});
</script>
</body>
</html>
<?php
} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
exit;
}?>