<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row">  
 <div class="col-sm-12 table-responsive">
   
  	
   <table class="table table-hover table-bordered table-condensed table-striped" id="doctos_u">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Titulo</th>
		 <th>Descripcion</th>
         <th>Tipo</th>
		 <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
    include_once('../../../php/connection.php');
    session_start();
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_documentos.id_documento as id_documento, hrm_documentos.id_empleado as id_empleado, hrm_documentos.empleado as empleado, hrm_documentos.titulo as titulo, hrm_documentos.descripcion as descripcion, hrm_documentos.tipo as tipo, hrm_documentos.tamano as tamano, hrm_documentos.ruta as ruta FROM hrm_documentos, hrm_empleado WHERE hrm_documentos.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$_SESSION['idempleado'];
           foreach ($db->query($query) as $row) {
             $datosDocto = $row['id_documento']."||".
                      $row['id_empleado']."||".
				              $row['empleado']."||".
                      $row['titulo'] ."||".
                      $row['descripcion']."||".
				 	            $row['tipo']."||".
                      $row['tamano']."||".
                      $row['ruta'];

             ?> 
             <tr>
              <td><?php echo $row['id_empleado'].' - '.$row['empleado']; ?></td>
              <td><?php echo $row['titulo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['tipo']; ?></td>
              <td> 
               <center>
               <a href="<?php echo $row['ruta'];?>" target="_blank" class="btn btn-info btn-sm"><span class="icon-eye"></span></a>
                <a href="<?php echo $row['ruta'];?>" download="<?php echo $row['titulo']; ?>" class="btn btn-success btn-sm"><span class="icon-download"></span></a>
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
		 <th>Titulo</th>
		 <th>Descripcion</th>
         <th>Tipo</th>
		<th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#doctos_u').DataTable({
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
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>