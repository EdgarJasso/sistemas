<?php 
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?><div class="row">  
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Documentos</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Doctonew" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="documentos">
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
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_documentos.id_documento as id_documento, hrm_documentos.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_empleado.ape_p as ape, hrm_documentos.titulo as titulo, hrm_documentos.descripcion as descripcion, hrm_documentos.tipo as tipo, hrm_documentos.tamano as tamano, hrm_documentos.ruta as ruta FROM hrm_documentos, hrm_empleado WHERE hrm_documentos.id_empleado = hrm_empleado.id_empleado";
           foreach ($db->query($query) as $row) {

            $datos_delete = $row['id_documento']."||".
                            $row['ruta'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado'].' - '.$row['nombre'].' - '.$row['ape']; ?></td>
              <td><?php echo $row['titulo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['tipo']; ?></td>
              <td> 
               <center> 
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box"> 
                  <a href="<?php echo $row['ruta'];?>" target="_blank" class="btn btn-info btn-sm"><span class="icon-eye"></span></a>
                  <a href="<?php echo $row['ruta'];?>" download="<?php echo $row['titulo']; ?>" class="btn btn-success btn-sm"><span class="icon-download"></span></a>
                  <br>
                  <button type="button" class="btn btn-danger btn-sm" 
                  onclick="preguntarDoctoNew('<?php echo $datos_delete;?>')"><span class="icon-cross"></span></button>
                  <!--
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Docto" 
                  onclick="agregarformDocto('<?php // echo $datosDocto?>')"><span class="icon-pencil"></span></button> 
                  
				          -->
                  <!-- <a href="documentos/delete.php?id=<?php //echo $row['id_documento'];?>&path=<?php //echo $row['ruta'];?>"  
                  class="btn btn-danger btn-sm"><span class="icon-cross"></span></a>-->
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
		 <th>Titulo</th>
		 <th>Descripcion</th>
         <th>Tipo</th>
		<th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
    <?php 
                if(isset($_SESSION['message'])){
                   echo $_SESSION['message']; 
					unset($_SESSION['message']);
                }
    ?>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#documentos').DataTable({
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
<script src="../../js/funciones-doctosnew.js"></script> 
<?php 
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
exit;
}
?>