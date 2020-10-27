<?php
session_start();
session_destroy();
include '../../../dominio.php';
   // echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
   header("Location:".URL."/Encuestas");
   exit();
die();
?>