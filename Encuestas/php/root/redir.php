<?php
session_start();
include '../../../dominio.php';
//var_dump($_SESSION); die();

if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true) {
    
    if ($_SESSION['permiso']=='root'){
       header('Location: '.URL.'/Encuestas/php/root/index.php');
       echo "admin"; exit;
    }else{}
    if($_SESSION['permiso']=='user'){
      header('Location: '.URL.'/Encuestas/php/root/usuario.php');
      echo "user"; exit;
    }else{ 
        header('Location: '.URL.'/Encuestas/');
      echo "no entro";  exit;
    }


} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
exit;
}
?>