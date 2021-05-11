<?php
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

include_once('../../../php/connection.php');
try {
     $databasev = new Connection();
     $dbv = $databasev->open();
     //dias totales
     $sql_contador = "SELECT SUM(hrm_asignacion.dias_habilies) as dias FROM hrm_asignacion, hrm_empleado 
     WHERE hrm_asignacion.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$_SESSION['idempleado'];
     $stmtn_v = $dbv->prepare($sql_contador);
     $stmtn_v->setFetchMode(PDO::FETCH_ASSOC);
     $stmtn_v->execute();
     $result_v = $stmtn_v->fetch();
     //dias ocupados
     $sql_ocupados = "SELECT COUNT(*) as ocupo  FROM hrm_vacaciones, hrm_empleado 
     WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$_SESSION['idempleado']." AND hrm_vacaciones.estado NOT LIKE '%Denegado%'";
     $stmtn_o = $dbv->prepare($sql_ocupados);
     $stmtn_o->setFetchMode(PDO::FETCH_ASSOC);
     $stmtn_o->execute();
     $result_o = $stmtn_o->fetch();
     $dbv = null;      
     //var_dump($result_v);   
     $ddv = $result_v['dias'] - $result_o['ocupo'];        
   } catch (PDOException $e) {
     $result_v = $e->getMessage();
     echo $result_v;
   }
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
  <?php
  try {
    $SQL ="SELECT hrm_vacaciones.id_vacaciones as id_vacaciones, hrm_empleado.nombre as nombre, hrm_vacaciones.fecha as fecha, hrm_vacaciones.estado as estado  FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_jefe = ".$_SESSION['idempleado']." AND hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Pendiente'";
    
    $database = new Connection();
    $db = $database->open();
    $stmt = $db->prepare($SQL);        
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    $rows = $stmt->rowCount();

    if($rows>0){
      echo '
      <div class="alert alert-info mt-5" role="alert">
       <center>
        Por favor revisa las vacaciones solicitadas por tu equipo de trabajo
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Revicion_de_Vacaciones" onclick="CalificarEquipo('.$_SESSION['idempleado'].')"><span class="icon-user-check"></span> Revisar</button>
       </center>
      </div>';
      
    }else{
        echo '';
    }
$db = $database ->close();
} catch (PDOException $e) {
    $result = $e->getMessage();
    echo $result;
}
?>

 <center>
        <h2>Dias Disponibles:
          <b><?php echo $ddv?></b>
        </h2>
  </center><br>
    <?php
    if($ddv >= 1){
      $out_v = '<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_vacaciones_user" id="boton_add"><span class="icon-plus"></span> Nuevo</button>';
    }else{
      $out_v = '';
    }
    echo $out_v;
    ?>

   <table class="table table-hover table-bordered table-condensed table-striped" id="vacaciones">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Dia</th>
     <th>Estado</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_vacaciones.id_vacaciones as id_vacaciones, hrm_vacaciones.id_empleado as id_empleado, hrm_empleado.nombre as nombre_empleado, hrm_vacaciones.dia as dia, hrm_vacaciones.color as color, hrm_vacaciones.estado as estado, hrm_vacaciones.id_jefe as jefe, hrm_vacaciones.fecha as fecha FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado=".$_SESSION['idempleado'];
           foreach ($db->query($query) as $row) {

             $datosVacVU = $row['id_vacaciones']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre_empleado']."||".
                      $row['fecha']."||".
                      $row['dia']."||".
                      $row['color']."||".
                      $row['estado'];

             $datosVacEU = $row['id_vacaciones']."||".
             $row['id_empleado'] ."||".
             $row['jefe']."||".
             $row['fecha']."||".
             $row['dia']."||".
             $row['color']."||".
             $row['estado'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['dia']; ?></td>
              <td><?php echo $row['estado']; ?> </td>
              <td> 
               <center>
               <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_vacaciones" 
                  onclick="AgregarVac('<?php echo $datosVacVU?>')"><span class="icon-eye"></span></button>

                 <?php
                 if($row['estado']=='Pendiente'){
                   $out_ve = ' <button type="button" class="btn btn-warning btn-sm" 
                   data-toggle="modal" data-target="#Editar_vacacionesUser" 
                   onclick="agregarformVacU(\''.$datosVacEU.'\')"><span class="icon-pencil"></span></button>';
                 }else{
                  $out_ve = '';
                 }
                 echo $out_ve;
                 ?>
               
               
               </center>
              </td>
             </tr>
            <?php }
             $db = null;                 
              } catch (PDOException $e) {
               echo "Error: ".$e->getMessage()." !<br>";
               }?>
	</tbody>
	<tfoot>
	<tr>
         <th>Empleado</th>
		 <th>Dia</th>
         <th>Estado</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#vacaciones').DataTable({
		 dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'pdfHtml5'
        ],
      "info": true,
      "pagingType": "full",
      "lengthMenu": [ 25, 50 ],
        "language":{
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
				"info": "Mostrando pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtrada de _MAX_ registros)",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search": "Buscar:",
				"zeroRecords":    "No se encontraron registros coincidentes",
				"paginate": {
					"next":       "Siguiente",
					"previous":   "Anterior",
                     "first": "Inicio",
                     "last":"Fin"
				},					
        }
    });
  });
 </script>
<script src="../../js/funciones-vacaciones.js"></script>
<script>
	$(document).ready(function(){
 
    $('#guardar_vacacion_user').click(function(){
    dia_vac_u = $('#vac_dia_u').val();
    color_vac_u = $('#vac_color_u').val();
    agregardatosVacU(dia_vac_u, color_vac_u);
    });
    
  $('#actualizar_vacacionesU').click(function(){
    actualizaDatosVacU();
   });
	});
</script>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>