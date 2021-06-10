<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Alergias</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_alergia" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="Alergias">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Tipo Sangre</th>
     <th>Contacto</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
         
        $query="SELECT hrm_alergias.id_alergia as id_alergia, hrm_alergias.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_empleado.ape_p as apellido, hrm_alergias.descripcion as descripcion, hrm_alergias.tipo_sangre as tipo_sangre, hrm_alergias.nombre_contacto as nombre_contacto, hrm_alergias.tel_contacto as tel_contacto From hrm_empleado, hrm_alergias WHERE hrm_alergias.id_empleado = hrm_empleado.id_empleado";


           foreach ($db->query($query) as $row) {

             $datosAlergiasV = $row['id_alergia']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre'] ."||".
                      $row['apellido'] ."||".
                      $row['descripcion']."||".
                      $row['tipo_sangre']."||".
                      $row['nombre_contacto']."||".
                      $row['tel_contacto'];

             $datosAlergiasE = $row['id_alergia']."||".
             $row['id_empleado'] ."||".
             $row['descripcion']."||".
             $row['tipo_sangre']."||".
             $row['nombre_contacto']."||".
             $row['tel_contacto'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre'].' '.$row['apellido']; ?></td>
              <td><?php echo $row['tipo_sangre']; ?></td>
              <td><?php echo $row['nombre_contacto']." - ".$row['tel_contacto']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				        <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_alergias" 
                  onclick="AgregarAlergias('<?php echo $datosAlergiasV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_alergias" 
                  onclick="agregarformAlergias('<?php echo $datosAlergiasE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarAlergias(<?php echo $row['id_alergia'] ?>)"><span class="icon-cross"></span></button>
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
		     <th>Tipo Sangre</th>
         <th>Contacto</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#Alergias').DataTable({
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
 <script src="../../js/funciones-alergias.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>