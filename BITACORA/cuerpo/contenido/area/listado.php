<?php 
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
include_once('../../../php/connection.php');
try {
    $database = new Connection();
    $db = $database->open();
    $query="select * from tkd_area";
        foreach ($db->query($query) as $row) {
         $arreglo['data'][] = $row;
        }
        echo json_encode($arreglo);
    $db = null;                 
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage()." !<br>";
    }
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
}
?>