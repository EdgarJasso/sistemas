<?php        
include '../../../dominio.php';
date_default_timezone_set("America/Mexico_City");
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true && $_SESSION['permiso']=='root') {
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
                    location.href= ".URL."/Encuestas/php/root/logout.php;
            }, 2000);
          </script>";
  echo $msj;
  session_destroy();
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Encuestas</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/icono.png" type="image/x-icon">
  
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/fonts/style.css">
  <link rel="stylesheet" href="../../css/carga.css">

  <link rel="stylesheet" href="../../css/estilos-panel.css">
  <link rel="stylesheet" href="../../css/estilos_encuestas.css">
  
  <link rel="stylesheet" href="../../css/alertify.css">
  <link rel="stylesheet" href="../../css/themes/default.css">
  <link rel="stylesheet" href="../../package/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
  
</head>
<body>

   <header>
      <div class="menu">
        <button type="button" id="btn-menu">
        <span class="icon icon-menu"></span>
        <span id="titulo">Cryo 360</span>
        </button>
      </div>
      
      <div class="opciones">

         <div id="reloj">
         </div>

         <button type="button" id="btn-off">
            <a href="logout.php">
            <span class="icon icon-switch" id="off"></span>
            </a>
         </button>
      </div>

   </header>
<div class="clearfix"></div>
<div class="container-fluid bg-secondary" id="contenido-todo">
   <div class="row">
   <div id="contenido-menu">
      <ul class="">  
          <li>   
                 <a class="nav-link" id="pills-encuestas_faltantes-tab" data-toggle="pill" href="#pills-encuestas_faltantes" 
                     role="tab" aria-controls="pills-area" aria-selected="false">Evaluaciones
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-area" 
                     role="tab" aria-controls="pills-area" aria-selected="false">Area
                    <span class="icon-home"></span>
                 </a>
          </li>
           <li>   
                 <a class="nav-link" id="pills-categoria-tab" data-toggle="pill" href="#pills-categoria" 
                     role="tab" aria-controls="pills-categoria" aria-selected="false">Categoria
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-competencias-tab" data-toggle="pill" href="#pills-competencias" 
                     role="tab" aria-controls="pills-competencias" aria-selected="false">Competencias
                    <span class="icon-home"></span>
                 </a>
          </li>
           <li>   
                 <a class="nav-link" id="pills-contesto-tab" data-toggle="pill" href="#pills-contesto" 
                     role="tab" aria-controls="pills-contesto" aria-selected="false">Contesto
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-pregunta-tab" data-toggle="pill" href="#pills-pregunta" 
                     role="tab" aria-controls="pills-pregunta" aria-selected="false">Preguntas
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-respuesta-tab" data-toggle="pill" href="#pills-respuesta" 
                     role="tab" aria-controls="pills-respuesta" aria-selected="false">Respuestas
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-usuario-tab" data-toggle="pill" href="#pills-usuario" 
                     role="tab" aria-controls="pills-usuario" aria-selected="false">Usuarios
                    <span class="icon-home"></span>
                 </a>
          </li>
          <li>   
                 <a class="nav-link" id="pills-validacion-tab" data-toggle="pill" href="#pills-validacion" 
                     role="tab" aria-controls="pills-validacion" aria-selected="false">Validacion
                    <span class="icon-home"></span>
                 </a>
          </li>
    </ul>
   </div>
   
   <div id="contenido-general" class="">
   <div class="tab-content" id="pills-tabContent">

<!-- inicio -->
<div class="tab-pane  " id="pills-area" role="tabpanel" aria-labelledby="pills-area-tab">
   <div class="container-fluid">
      <div id="contenedor_area"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-categoria" role="tabpanel" aria-labelledby="pills-categoria-tab">
   <div class="container-fluid">
      <div id="contenedor_categoria"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-competencias" role="tabpanel" aria-labelledby="pills-competencias-tab">
   <div class="container-fluid">
      <div id="contenedor_competencias"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-contesto" role="tabpanel" aria-labelledby="pills-contesto-tab">
   <div class="container-fluid">
      <div id="contenedor_contesto"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-pregunta" role="tabpanel" aria-labelledby="pills-pregunta-tab">
   <div class="container-fluid">
      <div id="contenedor_pregunta"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-respuesta" role="tabpanel" aria-labelledby="pills-respuesta-tab">
   <div class="container-fluid">
      <div id="contenedor_respuesta"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-usuario" role="tabpanel" aria-labelledby="pills-usuario-tab">
   <div class="container-fluid">
      <div id="contenedor_usuario"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade " id="pills-validacion" role="tabpanel" aria-labelledby="pills-validacion-tab">
   <div class="container-fluid">
      <div id="contenedor_validacion"></div>
   </div>
  </div>
<!-- fin -->
<!-- inicio -->
<div class="tab-pane fade active in" id="pills-encuestas_faltantes" role="tabpanel" aria-labelledby="pills-encuestas_faltantes-tab">
   <div class="container-fluid">
      <div id="contenedor_encuestas_faltantes"></div>
   </div>
  </div>
<!-- fin -->
</div>
   </div>

   </div>
</div>


<div id="contenedor_carga">
 <div id="carga">
 <center>
 <div id="carga_int"></div>
 </center> 
 </div>
</div>

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

<script> 
 window.onload = function(){
   var contenedor = document.getElementById('contenedor_carga');
   contenedor.style.visibility = 'hidden';
   contenedor.style.opacity = '0';
 }
 reloj('<?php echo  $_SESSION['reloj']; ?>', 'reloj', 'Sesion Cerrada', '<?php echo URL;?>Encuestas/php/root/logout.php');
 
 $(document).ready(function(){
    //menu
    $('#btn-menu').on('click', function(){
       $('#contenido-general').toggleClass('abrir');
      });
      $(function(){
         $('li').on('click', function(){
          $(".is-active").removeClass("is-active");
          $(this).addClass("is-active");
    });
});
   //notificacion
   $('#btn-notificacines').on('click', function(){
       $('#notificaciones').toggleClass('abrir-notificacion');
    });

    //contenido
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
    $('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
    $('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
    $('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php');
    $('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  
    $('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  
    $('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
    $('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php');  
});
</script>

</body>
</html>
<?php
} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
exit;
}?>