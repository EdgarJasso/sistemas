<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Peticiones</h2>
</center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Agregar_Peticion" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="peticion">
    <thead>
	 <tr> 
        <th>Id Peticion</th>
	      <th>Empleado</th>
        <th>Area</th>
        <th>Fecha</th>
        <th>Servicio</th>
        <th>Estado</th>
        <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT tkd_peticiones.id_peticion as id_peticion, tkd_peticiones.id_empleado as id_empleado, tkd_empleado.nombre as nombre, tkd_empleado.apellido_p as apellido_p, tkd_area.id_area as id_area, tkd_area.nombre as area, tkd_peticiones.fecha as fecha, tkd_peticiones.servicio as servicio, tkd_peticiones.comentarios as comentarios, tkd_peticiones.estado as estado FROM tkd_peticiones, tkd_empleado, tkd_area WHERE tkd_peticiones.id_empleado = tkd_empleado.id_empleado AND tkd_peticiones.area = tkd_area.id_area";
           foreach ($db->query($query) as $row) {

             $datosPetV = $row['id_peticion']."||".
                          $row['id_empleado']."||".
                          $row['nombre']."||".
                          $row['apellido_p'] ."||".
                          $row['id_area']."||".
                          $row['area']."||".
                          $row['fecha']."||".
                          $row['servicio']."||".
                          $row['comentarios']."||".
                          $row['estado'];

             $datosPetE = $row['id_peticion']."||".
                          $row['id_area']."||".
                          $row['id_empleado']."||".
                          $row['fecha']."||".
                          $row['servicio']."||".
                          $row['comentarios']."||".
                          $row['estado'];
             ?> 
             <tr>
              <td><?php echo $row['id_peticion']?></td>
              <td><?php echo $row['id_empleado']." - ".$row['nombre']." ".$row['apellido_p']; ?></td>
              <td><?php echo $row['id_area'].' - '.$row['area']?></td>
              <td><?php echo $row['fecha'];?></td>
              <td><?php echo $row['servicio'];?></td>
              <?php if($row['estado']=="Registrado"){
                echo "<td><span class='label label-info text-center'>".$row['estado']."</span></td>";
              }elseif($row['estado']=="Asignado"){
                echo "<td><span class='label label-warning text-center'>".$row['estado']."</span></td>";
              }elseif($row['estado']=="Finalizado"){
                echo "<td><span class='label label-success text-center'>".$row['estado']."</span></td>";
              }else{
                echo "<td><span class=' text-center'>".$row['estado']."</span></td>";
              }?>
              <td> 
               <center>
                <div class="btn-group color-p">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				        <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Peticion" 
                  onclick="AgregarViewPet('<?php echo $datosPetV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_Peticion" 
                  onclick="agregarformPet('<?php echo $datosPetE?>')"><span class="icon-pencil"></span></button>
                   
				        <button type="button" class="btn btn-danger btn-sm" onclick="preguntarPet(<?php echo $row['id_peticion'] ?>)">
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
        <th>Id Peticion</th>
	      <th>Empleado</th>
        <th>Area</th>
        <th>Fecha</th>
        <th>Servicio</th>
        <th>Estado</th>
        <th><center>Accion</center></th>
	 </tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#peticion').DataTable({
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
 <script src="../../js/funciones-peticiones.js"></script>
 <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>
