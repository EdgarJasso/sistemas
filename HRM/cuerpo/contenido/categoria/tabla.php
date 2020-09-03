<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Categoria</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Categoria" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="categoria">
    <thead>
	 <tr> 
		 <th>Area</th>
		 <th>Nombre</th>
         <th>Sueldo</th>
         <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_puesto.id_puesto as id_puesto, hrm_puesto.id_area as id_area, hrm_area.nombre as nombre_area, hrm_puesto.nombre as nombre_puesto, hrm_puesto.descripcion as descripcion, hrm_puesto.sueldo as sueldo, hrm_puesto.comentarios as comentarios FROM hrm_puesto, hrm_area WHERE hrm_puesto.id_area = hrm_area.id_area";
           foreach ($db->query($query) as $row) {
             $datosCV = $row['id_puesto']."||".
                      $row['id_area'] ."||".
                      $row['nombre_area']."||".
                      $row['nombre_puesto']."||".
                      $row['descripcion']."||".
                      $row['sueldo']."||".
                      $row['comentarios'];

             $datosCE = $row['id_puesto']."||".
                      $row['id_area'] ."||".
                      $row['nombre_puesto']."||".
                      $row['descripcion']."||".
                      $row['sueldo']."||".
                      $row['comentarios'];
             ?> 
             <tr>
              <td><?php echo $row['id_area']." - ".$row['nombre_area']; ?></td>
              <td><?php echo $row['nombre_puesto']; ?></td>
              <td><?php echo $row['sueldo']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				          <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Categoria" 
                  onclick="AgregarViewCat('<?php echo $datosCV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Categoria" 
                  onclick="agregarformCat('<?php echo $datosCE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarCat(<?php echo $row['id_puesto'] ?>)"><span class="icon-cross"></span></button>
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
         <th>Area</th>
		 <th>Nombre</th>
         <th>Sueldo</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#categoria').DataTable({
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
 <script src="../../js/funciones-categoria.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>
