<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Validacion</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Agregar_Val" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="validacion">
    <thead>
	 <tr> 
        <th>Id Validacion</th>
				<th>Califica</th>
				<th>Evaluado</th>
				<th>Nombre</th>
				<th>Estado</th>
        <th>Area</th>
				<th>Categoria</th>
				<th>Tipo</th>
        <th>Periodo</th>
		    <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT * FROM ecsnts_validacion";
           foreach ($db->query($query) as $row) {
             $datos = $row['Id_validacion']."||".
                      $row['Calificador']."||".
                      $row['Calificado']."||".
                      $row['Nombre']."||".
                      $row['Validacion']."||".
                      $row['Area']."||".
                      $row['Categoria']."||".
                      $row['tipo']."||".
                      $row['periodo'];
             ?> 
             <tr>
             <td><?php echo $row['Id_validacion']; ?></td>
				    <td><?php echo $row['Calificador']; ?></td>
				    <td><?php echo $row['Calificado']; ?></td>
				    <td><?php echo $row['Nombre']; ?></td>
				    <td><?php echo $row['Validacion']; ?></td>
            <td><?php echo $row['Area']; ?></td>
				    <td><?php echo $row['Categoria']; ?></td>
				    <td><?php echo $row['tipo']; ?></td>
				    <td><?php echo $row['periodo']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                   data-target="#Ver_Val" onclick="AgregarViewVal('<?php echo $datos?>')"><span class="icon-eye"></span></button>
                  
                   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Val" onclick="agregarformVal('<?php echo $datos?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarVal(<?php echo $row['Id_validacion'] ?>)"><span class="icon-cross"></span></button>
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
        <th>Id Validacion</th>
				<th>Califica</th>
				<th>Evaluado</th>
				<th>Nombre</th>
				<th>Estado</th>
        <th>Area</th>
				<th>Categoria</th>
				<th>Tipo</th>
        <th>Periodo</th>
		    <th>Accion</th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#validacion').DataTable({
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
 <script src="../../js/funciones-validacion.js"></script>
 <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>