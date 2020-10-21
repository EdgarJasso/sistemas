<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Empleados</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" 
    data-target="#Agregar_Empleado" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="empleados">
    <thead>
	 <tr> 
     <th>Id Empleados</th>   
		 <th>Empleado</th>
		 <th>CURP</th>
		 <th>Celular</th>
		 <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {
             $datosE = $row['id_empleado']."||".
                      $row['nombre'] ."||".
                      $row['ape_p']."||".
                      $row['ape_m']."||".
                      $row['fecha_nac']."||".
                      $row['curp']."||".
                      $row['rfc']."||".
                      $row['nss']."||".
                      $row['celular'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']; ?></td>
              <td><?php echo $row['nombre']." ".$row['ape_p']; ?></td>
              <td><?php echo $row['curp']; ?></td>
              <td><?php echo $row['celular']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" 
                 aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				          <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Empleado" 
                  onclick="AgregarViewEmpleado('<?php echo $datosE?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Empleado" 
                  onclick="agregarformEmp('<?php echo $datosE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarEmp(<?php echo $row['id_empleado'] ?>)">
          <span class="icon-cross"></span></button>
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
     <th>Id Empleado</th>
		 <th>Empleado</th>
		 <th>CURP</th>
		 <th>Celular</th>
		<th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#empleados').DataTable({
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
 <script src="../../js/funciones_empleado.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>
