<?php 
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
include_once 'connection.php';
$database = new Connection();
$db = $database->open();
try {
$sql_registrados = "SELECT COUNT(tkd_peticiones.estado) as registrado FROM tkd_peticiones, tkd_empleado, tkd_area WHERE tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_empleado.id_area = tkd_area.id_area AND tkd_peticiones.estado LIKE 'Registrado'";
    $stmt = $db->prepare($sql_registrados);            
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $registrado = $stmt->fetch();

$sql_realizados = "SELECT COUNT(tkd_peticiones.estado) as realizado FROM tkd_peticiones, tkd_bitacora, tkd_empleado, tkd_area WHERE tkd_bitacora.id_peticion = tkd_peticiones.id_peticion AND tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_empleado.id_area = tkd_area.id_area AND tkd_peticiones.estado LIKE 'Finalizado' AND tkd_bitacora.estado LIKE 'Realizado'";   
    $stmt = $db->prepare($sql_realizados);            
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $realizado = $stmt->fetch();

$sql_pendientes = "SELECT COUNT(tkd_peticiones.estado) as pendiente FROM tkd_peticiones, tkd_bitacora, tkd_empleado, tkd_area WHERE tkd_bitacora.id_peticion = tkd_peticiones.id_peticion AND tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_empleado.id_area = tkd_area.id_area AND tkd_peticiones.estado LIKE 'Asignado' AND tkd_bitacora.estado LIKE 'Pendiente'";
    $stmt = $db->prepare($sql_pendientes);            
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $pendiente = $stmt->fetch();

$sql_cancelados = "SELECT COUNT(tkd_peticiones.estado) as incidencia FROM tkd_peticiones, tkd_bitacora, tkd_empleado, tkd_area WHERE tkd_bitacora.id_peticion = tkd_peticiones.id_peticion AND tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_empleado.id_area = tkd_area.id_area AND tkd_peticiones.estado LIKE 'Finalizado' AND tkd_bitacora.estado LIKE 'Cancelado'";
    $stmt = $db->prepare($sql_cancelados);            
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $incidencia = $stmt->fetch();
    $db = $database ->close();
} catch (PDOException $e) {
    $result = $e->getMessage();
    echo $result;
}
?>
            <article class="marcador Registrados">
              <div class="contenido-marca">
                <div class="icono-marca">
                  <span class="icon-folder-plus"></span>
                </div>
                <div class="marca-marca">
                  <b class="titulo">Registrados</b>
                  <h3 class="contador"><?php echo $registrado['registrado']?></h3>
                </div>
              </div>
            </article> 

            <article class="marcador Realizados">
            <div class="contenido-marca">
                <div class="icono-marca">
                  <span class="icon-checkmark"></span>
                </div>
                <div class="marca-marca">
                  <b class="titulo">Realizados</b>
                  <h3 class="contador"><?php echo $realizado['realizado']?></h3>
                </div>
              </div>
            </article>
            
            <article class="marcador Pendientes">
            <div class="contenido-marca">
                <div class="icono-marca">
                  <span class="icon-notification"></span>
                </div>
                <div class="marca-marca">
                  <b class="titulo">Pendientes</b>
                  <h3 class="contador"><?php echo $pendiente['pendiente']?></h3>
                </div>
              </div>
            </article>
            
            <article class="marcador Incidencia">
            <div class="contenido-marca">
                <div class="icono-marca">
                  <span class="icon-warning"></span>
                </div>
                <div class="marca-marca">
                  <b class="titulo">Incidencia</b>
                  <h3 class="contador"><?php echo $incidencia['incidencia']?></h3>
                </div>
              </div>
            </article>
            <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>