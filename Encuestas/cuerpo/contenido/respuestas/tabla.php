<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Respuestas</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Agregar_Res" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="respuesta">
    <thead>
	 <tr> 
        <th>Id Respuestas</th>
				<th>No Registro</th>
				<th>Id Pregunta</th>
				<th>Respuesta</th>
				<th>Justificacion</th>
		    <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT * FROM ecsnts_respuestas";
           foreach ($db->query($query) as $row) {
             $datos = $row['id_respuesta']."||".
                      $row['id_registro']."||".
                      $row['id_pregunta']."||".
                      $row['respuesta']."||".
                      $row['justificacion'];
             ?> 
             <tr>
             <td><?php echo $row['id_respuesta']; ?></td>
				    <td><?php echo $row['id_registro']; ?></td>
				    <td><?php echo $row['id_pregunta']; ?></td>
				    <td><?php echo $row['respuesta']; ?></td>
				    <td><?php echo $row['justificacion']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                   data-target="#Ver_Res" onclick="AgregarViewRes('<?php echo $datos?>')"><span class="icon-eye"></span></button>
                  
                   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Res" onclick="agregarformRes('<?php echo $datos?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarRes(<?php echo $row['id_respuesta'] ?>)"><span class="icon-cross"></span></button>
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
        <th>Id Respuestas</th>
				<th>No Registro</th>
				<th>Id Pregunta</th>
				<th>Respuesta</th>
				<th>Justificacion</th>
		    <th>Accion</th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#respuesta').DataTable({
		 dom: 'Bfrtip',
     "buttons":[                	
	   {
		   extend:    'excelHtml5',
		   text:      '<i class="icon-file-excel"></i>',
		   titleAttr: 'Excel'
	   },
	   {
		   extend:    'pdfHtml5',
		   text:      '<i class="icon-file-pdf"></i>',
		   titleAttr: 'PDF'
	   }
   ],
      "info": true,
      "pagingType": "full",
      "lengthMenu": [ 20, 50 ],
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
 <script src="../../js/funciones-respuesta.js"></script>
 <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>