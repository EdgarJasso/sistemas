<?php
session_start();
session_destroy();
include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
exit();
//header("Location:http://remittent-crowd.000webhostapp.com/BITACORA");
die();
?>