<?php
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
    //print_r($_POST);
    $activo = $_POST['activo'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    if(strlen($fecha_inicio)==0){
        $fecha_inicio = "-";
    }else{}

    if(strlen($fecha_fin)==0){
        $fecha_fin = "-";
    }else{}

    $database = new Connection();
    $db = $database->open();
    
    $sql ="";

    if($activo == "alta"){
        $sql = "
    Select 
		  hrm_antiguedad.id_antiguedad as id_antiguedad, 
          hrm_antiguedad.id_empleado as id_empleado,
          hrm_empleado.nombre as nombre_empleado, 
          hrm_area.nombre as area_nombre,
          hrm_antiguedad.id_puesto as id_puesto, 
          hrm_puesto.nombre as puesto_nombre, 
          hrm_antiguedad.activo as activo,
          hrm_antiguedad.fecha_inicio as fecha_inicio, 
          hrm_antiguedad.fecha_fin as fecha_fin, 
          hrm_antiguedad.Aumento as aumento,
          hrm_antiguedad.comentarios as comentarios 
          FROM
          hrm_antiguedad, hrm_empleado, hrm_puesto, hrm_area 
          WHERE 
          hrm_antiguedad.id_empleado = hrm_empleado.id_empleado 
          AND
          hrm_antiguedad.id_puesto = hrm_puesto.id_puesto
          AND
          hrm_area.id_area = hrm_puesto.id_area
          AND
	      hrm_antiguedad.activo = '".$activo."'
          AND
          hrm_antiguedad.fecha_inicio BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."';
    ";
    }else{}
    if($activo == "baja"){
        $sql = "
    Select 
		  hrm_antiguedad.id_antiguedad as id_antiguedad, 
         hrm_antiguedad.id_empleado as id_empleado,
          hrm_empleado.nombre as nombre_empleado, 
          hrm_area.nombre as area_nombre,
          hrm_antiguedad.id_puesto as id_puesto, 
          hrm_puesto.nombre as puesto_nombre, 
          hrm_antiguedad.activo as activo,
          hrm_antiguedad.fecha_inicio as fecha_inicio, 
          hrm_antiguedad.fecha_fin as fecha_fin, 
          hrm_antiguedad.Aumento as aumento,
          hrm_antiguedad.comentarios as comentarios 
          FROM
          hrm_antiguedad, hrm_empleado, hrm_puesto, hrm_area 
          WHERE 
          hrm_antiguedad.id_empleado = hrm_empleado.id_empleado 
          AND
          hrm_antiguedad.id_puesto = hrm_puesto.id_puesto
          AND
          hrm_area.id_area = hrm_puesto.id_area
          AND
	      hrm_antiguedad.activo = '".$activo."'
          AND
          hrm_antiguedad.fecha_fin BETWEEN '".$fecha_inicio."' AND '".$fecha_fin."';
    ";
    }else{}


    $lista = $db->query($sql);
    
        //echo $sql;
        echo '
    <table class="table table-hover table-bordered table-condensed table-striped" id="consulta">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Puesto</th>
         <th>Activo</th>
         <th>Fecha Inicio</th>
         <th>Fecha Fin</th>
	 </tr>
	</thead>
    <tbody>';

    
    while($row = $lista->fetch(PDO::FETCH_ASSOC)){
      
?> 
<tr>
<td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
<td><?php echo $row['area_nombre']." - ".$row['puesto_nombre']; ?></td>
<td><?php echo $row['activo'];?></td>
<td><?php echo $row['fecha_inicio']; ?></td>
<td><?php echo $row['fecha_fin']; ?></td>

</tr>
    <?php }
echo '
</tbody>
<tfoot>
<tr>
     <th>Empleado</th>
     <th>Puesto</th>
     <th>Activo</th>
     <th>Fecha Inicio</th>
     <th>Fecha Fin</th>
</tr>
</tfoot>
</table>
';
}else {
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
    exit;
  }
?>