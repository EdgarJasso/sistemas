<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
    
    $database = new Connection();
    $db = $database->open();
    $ide = $_POST['id'];
    $SQL ="SELECT hrm_vacaciones.id_vacaciones as id_vacaciones, hrm_empleado.nombre as nombre, hrm_vacaciones.fecha as fecha, hrm_vacaciones.estado as estado  FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_jefe = ".$ide." AND hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Pendiente'";
    $out = '<table class="table table-hover table-bordered table-condensed table-striped" id="">
    <thead>
	    <tr> 
        <th>Empleado</th>
        <th>Dia</th>
        <th>Estado</th>
        <th><center>Accion</center></th>
	    </tr>
	  </thead>
	  <tbody>';
    foreach ($db->query($SQL) as $row) {
      $out .= '<tr>
              <td>'.$row['nombre'].'</td>
              <td>'.$row['fecha'].'</td>
              <td>'.$row['estado'].'</td>
              <td> 
               <center>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" onclick="preguntarDen('. $row["id_vacaciones"].')"><span class="icon-cross"></span></button>
                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal" onclick="preguntarApr('. $row["id_vacaciones"].')"><span class="icon-checkmark"></span></button>
               </center>
              </td>
             </tr>';
    }
    $out .= '	</tbody>
    <tfoot>
    <tr>
           <th>Empleado</th>
           <th>Dia</th>
           <th>Estado</th>
           <th><center>Accion</center></th>
    </tr>
    </tfoot>
     </table>';
    echo $out;
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?> 