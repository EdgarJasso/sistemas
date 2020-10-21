<?php session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {?>
 <div class="row"> 
 <div class="col-sm-12 table-responsive">
     <center>
     <h2>Antigüedad</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Antiguedad" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="antiguedad">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Puesto</th>
     <th>Activo</th>
         <th>Fecha Inicio</th>
         <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT 
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
          hrm_area.id_area = hrm_puesto.id_area";
           foreach ($db->query($query) as $row) {

             $datosAntV = $row['id_antiguedad']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre_empleado']."||".
                      $row['id_puesto']."||".
                      $row['area_nombre']."||".
                      $row['puesto_nombre']."||".
                      $row['activo']."||".
                      $row['fecha_inicio']."||".
                      $row['fecha_fin']."||".
                      $row['aumento']."||".
                      $row['comentarios'];

             $datosAntE = $row['id_antiguedad']."||".
                          $row['id_empleado'] ."||".
                          $row['id_puesto']."||".
                          $row['activo']."||".
                          $row['fecha_inicio']."||".
                          $row['fecha_fin']."||".
                          $row['aumento']."||".
                          $row['comentarios'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['area_nombre']." - ".$row['puesto_nombre']; ?></td>
              <td><?php echo $row['activo'];?></td>
              <td><?php echo $row['fecha_inicio']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				<button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Antiguedad" 
                  onclick="AgregarAnt('<?php echo $datosAntV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Antiguedad" 
                  onclick="agregarformAnt('<?php echo $datosAntE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarAnt(<?php echo $row['id_antiguedad'] ?>)"><span class="icon-cross"></span></button>
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
         <th>Empleado</th>
		 <th>Puesto</th>
     <th>Activo</th>
         <th>Fecha Inicio</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#antiguedad').DataTable({
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
 <script src="../../js/funciones-antiguedad.js"></script>
 <?php
 
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
exit;
}
?>