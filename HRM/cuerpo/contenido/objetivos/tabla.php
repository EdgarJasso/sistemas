<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Objetivos</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Objetivos" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="objetivos">
    <thead>
	 <tr> 
		 <th>Puesto</th>
     <th>Empleado</th>
     <th>Objetivo</th>
     <th>Periodo</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query = "SELECT hrm_objetivos.id_objetivo as id_objetivo, hrm_objetivos.id_puesto as id_puesto, hrm_puesto.nombre as nombre_puesto, hrm_objetivos.id_empleado as id_empleado, hrm_empleado.nombre as nombre_empleado, hrm_objetivos.objetivo as objetivo, hrm_objetivos.tema as tema, hrm_objetivos.subtema as subtema, hrm_objetivos.periodo as periodo, hrm_objetivos.fecha_asignacion as fecha, hrm_objetivos.estado as estado, hrm_objetivos.realizado as realizado, hrm_objetivos.comentarios as comentarios FROM hrm_objetivos, hrm_puesto, hrm_empleado WHERE hrm_objetivos.id_puesto = hrm_puesto.id_puesto AND hrm_objetivos.id_empleado = hrm_empleado.id_empleado";
          foreach ($db->query($query) as $row) {

             $datosObjV = $row['id_objetivo']."||".
                          $row['id_puesto']."||".
                          $row['nombre_puesto']."||".
                          $row['id_empleado'] ."||".
                          $row['nombre_empleado']."||".
                          $row['objetivo']."||".
                          $row['tema']."||".
                          $row['subtema']."||".
                          $row['periodo']."||".
                          $row['fecha']."||".
                          $row['estado']."||".
                          $row['realizado']."||".
                          $row['comentarios'];

             $datosObjE = $row['id_objetivo']."||".
                          $row['id_puesto'] ."||".
                          $row['id_empleado']."||".
                          $row['objetivo']."||".
                          $row['tema']."||".
                          $row['subtema']."||".
                          $row['periodo']."||".
                          $row['fecha']."||".
                          $row['realizado']."||".
                          $row['comentarios'];
             ?> 
             <tr>
              <td><?php echo $row['id_puesto']." - ".$row['nombre_puesto']; ?></td>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['objetivo'];?></td>
              <td><?php echo $row['fecha']." - ".$row['periodo']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				<button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Objetivos" 
                  onclick="AgregarObj('<?php echo $datosObjV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Objetivos" 
                  onclick="agregarformObj('<?php echo $datosObjE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarObj(<?php echo $row['id_objetivo'] ?>)"><span class="icon-cross"></span></button>
				 </div>
                </div>  
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
     <th>Puesto</th>
     <th>Empleado</th>
     <th>Objetivo</th>
     <th>Periodo</th>
     <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#objetivos').DataTable({
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
 <script src="../../js/funciones-objetivos.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>