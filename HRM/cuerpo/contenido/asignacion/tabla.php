<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Asignacion</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_asignacion" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
    <button  type="button" class="btn btn-default btn-sm boton-add" data-toggle="modal" data-target="#Ver_DiasDisponibles" id="boton_view_dias"><span class="icon-eye"></span> Dias Disponibles</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="asignacion">
    <thead>
	 <tr> 
		 <th>Empleado</th>
     <th>Periodo</th>
		 <th>Dias Habiles</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
  <?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
         $query = "";
          

if($_SESSION['permiso']=='admin'){
  $query="SELECT
  hrm_asignacion.id_asignacion as id_asignacion, 
  hrm_asignacion.id_empleado as id_empleado, 
  hrm_empleado.nombre as nombre_empleado, 
  hrm_asignacion.periodo as periodo,
  hrm_asignacion.dias_habilies as dias
  FROM hrm_asignacion, hrm_empleado 
  WHERE hrm_asignacion.id_empleado = hrm_empleado.id_empleado";
}
           foreach ($db->query($query) as $row) {

             $datosAsiV = $row['id_asignacion']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre_empleado']."||".
                      $row['dias']."||".
                      $row['periodo'];

             $datosAsiE = $row['id_asignacion']."||".
                          $row['id_empleado'] ."||".
                          $row['dias']."||".
                          $row['periodo'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['periodo']; ?></td>
              <td><?php echo $row['dias']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				<button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_asignacion" 
                  onclick="AgregarAsi('<?php echo $datosAsiV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_asignacion" 
                  onclick="agregarformAsi('<?php echo $datosAsiE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarAsi(<?php echo $row['id_asignacion'] ?>)"><span class="icon-cross"></span></button>
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
		 <th>Dias Habiles</th>
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
    $('#asignacion').DataTable({
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
 <script src="../../js/funciones-asignacion.js"></script>
<script>
	$(document).ready(function(){
		$('#guardar_asignacion').click(function(){

		  ideasi = $('#Asi_idempleado').val();
		  dias = $('#Asi_dias').val();
      periodo = $('#Asi_periodo').val();
          
       agregardatosAsi(ideasi, dias, periodo);
    });
    
  $('#actualizar_asignacion').click(function(){
    actualizaDatosAsi();
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