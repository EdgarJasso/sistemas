<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Bajas</h2>
     </center>

   <table class="table table-hover table-bordered table-condensed table-striped" id="bajas">
    <thead>
	 <tr> 
		 <th>Fecha</th>
     <th>Nombre</th>
    </tr>
	</thead>
	<tbody> 
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="select * from hrm_bajas";
           foreach ($db->query($query) as $row) {
             ?> 
             <tr>
             <td><?php echo $row['fecha']; ?></td>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_completo'];?></td>
              
             </tr>
            <?php }
             $db = null;                 
              } catch (PDOException $e) {
               echo "Error: ".$e->getMessage()." !<br>";
               }?>
	</tbody>
	<tfoot>
	<tr>
  <th>Fecha</th>
     <th>Nombre</th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<script>
    $(document).ready( function () {
    $('#bajas').DataTable({
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
 <script src="../../js/funciones-area.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>


