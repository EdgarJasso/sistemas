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
  
  <link rel="stylesheet" href="../../css/alertify.css">
  <link rel="stylesheet" href="../../css/themes/default.css">
  <link rel="stylesheet" href="../../package/dist/sweetalert2.min.css">

  <link rel="stylesheet" href="../../css/bootstrap-datetimepicker.min.css">
  <!--<link rel="stylesheet" href="../../css/bootstrap-datetimepicker-standalone.css">-->
  
  
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

         <button type="button" id="btn-notificacines">
            <span class="icon icon-bell"></span>
               <div id="carga-notificaciones">
               <span class="badge badge-success">3</span>
               </div>
            <span class="icon icon-circle-down"></span>
         </button>

         <button type="button" id="btn-off">
            <a href="logout.php">
            <span class="icon icon-switch" id="off"></span>
            </a>
         </button>
      </div>

   </header>
<div class="clearfix"></div>
<div id="notificaciones">
  <a href="#?id=2">asasasasas</a>
</div>
<div class="container-fluid bg-secondary" id="contenido-todo">
   <div class="row">
   <div id="contenido-menu">
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium veritatis ut adipisci reprehenderit ex qui voluptas quas, aliquid assumenda harum hic animi quibusdam, ipsum asperiores, sunt atque quia a. Cupiditate?
   </div>
   <div id="contenido-general">
    
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque molestias rerum deserunt, nemo amet in facilis omnis aspernatur enim necessitatibus, ullam perspiciatis qui laborum ducimus quasi nesciunt maxime quia delectus?
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

<script>
 window.onload = function(){
   var contenedor = document.getElementById('contenedor_carga');
   contenedor.style.visibility = 'hidden';
   contenedor.style.opacity = '0';
 }
 reloj('<?php echo  $_SESSION['reloj']; ?>', 'reloj', 'Sesion Cerrada', '<?php echo URL;?>/sistemas/Encuestas/php/root/logout.php');
 
 $(document).ready(function(){
    //menu
    $('#btn-menu').on('click', function(){
       $('#contenido-general').toggleClass('abrir');
      });
   //notificacion
   $('#btn-notificacines').on('click', function(){
       $('#notificaciones').toggleClass('abrir-notificacion');
    });

});
</script>

</body>
</html>
<?php
} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "'.URL.'/sistemas/Encuestas";</script>';
exit;
}?>