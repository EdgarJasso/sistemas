<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
  <center>
     <h2>Empleados</h2>
  </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" 
    data-target="#Agregar_Empleado" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="empleados">
    <thead>
	 <tr> 
     <th>Id Empleado</th>  
     <th>Area</th> 
		 <th>Empleado</th>
		 <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT tkd_empleado.id_empleado as id_empleado, tkd_area.id_area as id_area, tkd_area.nombre as area, tkd_empleado.nombre as nombre, tkd_empleado.apellido_p as apellido_p, tkd_empleado.apellido_m as apellido_m FROM tkd_empleado, tkd_area WHERE tkd_empleado.id_area = tkd_area.id_area";
           foreach ($db->query($query) as $row) {
            $datosV = $row['id_empleado']."||".
                      $row['id_area'] ."||".
                      $row['area'] ."||".
                      $row['nombre'] ."||".
                      $row['apellido_p']."||".
                      $row['apellido_m'];

            $datosE = $row['id_empleado']."||".
                      $row['id_area'] ."||".
                      $row['nombre'] ."||".
                      $row['apellido_p']."||".
                      $row['apellido_m'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']; ?></td>
              <td><?php echo $row['id_area']." - ".$row['area']; ?></td>
              <td><?php echo $row['nombre']." ".$row['apellido_p']; ?></td>
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
                  onclick="AgregarViewEmpleado('<?php echo $datosV?>')"><span class="icon-eye"></span></button>
                  
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
  <th>Id Empleados</th> 
  <th>Area</th>  
		 <th>Empleado</th>
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
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>
 