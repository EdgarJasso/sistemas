<?php
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
ob_start();
function getInfoBitacora($valor){
    include_once('connection.php');
    $info = array();
    try {
      $database = new Connection();
       $db = $database->open();
       $sql="SELECT tkd_peticiones.id_peticion as id_peticion, tkd_peticiones.id_empleado as id_empleado, tkd_peticiones.area as area, tkd_peticiones.fecha as fecha, tkd_peticiones.servicio as servicio, tkd_peticiones.comentarios as comentarios_peticion, tkd_empleado.id_empleado as id_empleado_emp, tkd_empleado.nombre as nombre, tkd_empleado.apellido_p as apellido, tkd_bitacora.id_bitacora as id_bitacora, tkd_bitacora.id_peticion as id_peticion_peticion, tkd_bitacora.encargado as encargado, tkd_bitacora.fecha as fecha_bit, tkd_bitacora.estado as estado, tkd_bitacora.comentarios as comentarios_bit from tkd_peticiones, tkd_empleado, tkd_bitacora WHERE tkd_bitacora.id_peticion = tkd_peticiones.id_peticion AND tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_bitacora.id_bitacora =".$valor;
       foreach ($db->query($sql) as $row) {
            $info[] = $row;
         }
    return $info;
    $db = null;                 
    }catch (PDOException $e) {
  echo "Error: ".$e->getMessage()." !<br>";
  }
}

}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
