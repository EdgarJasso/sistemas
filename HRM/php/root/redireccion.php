<?php
session_start();
//var_dump($_SESSION); die();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    
    if ($_SESSION['permiso']=='admin'){
       header('Location: https://remittent-crowd.000webhostapp.com/HRM/cuerpo/contenido/index.php');
       echo "admin"; exit;
    }else{}
    if($_SESSION['permiso']=='user'){
      header('Location: https://remittent-crowd.000webhostapp.com/HRM/cuerpo/contenido/usuario.php');
      echo "user"; exit;
    }else{}
    if($_SESSION['permiso']=='jefe-area'){
       header('Location: https://remittent-crowd.000webhostapp.com/HRM/cuerpo/contenido/jefe-area.php');
       echo "jefe"; exit;
    }else{}
    if($_SESSION['permiso']=='objetivos'){
      header('Location: https://remittent-crowd.000webhostapp.com/HRM/cuerpo/contenido/objetivos.php');
       echo "objetivos"; exit;
    }else{ 
        header('Location: https://remittent-crowd.000webhostapp.com/HRM/');
      echo "no entro";  exit;
    }


} else {
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
exit;
}
?>