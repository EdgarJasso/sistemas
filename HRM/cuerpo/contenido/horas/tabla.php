<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Horas</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_horas" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="horas">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Dia</th>
         <th>Horas</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
         
        $query="SELECT hrm_horas.id_hora as id_hora, hrm_horas.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_empleado.ape_p as ape_p, hrm_horas.fecha as fecha, hrm_horas.horas as horas From hrm_empleado, hrm_horas WHERE hrm_horas.id_empleado = hrm_empleado.id_empleado";


           foreach ($db->query($query) as $row) {

             $datosHorasV = $row['id_hora']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre'] ."||".
                      $row['ape_p'] ."||".
                      $row['fecha']."||".
                      $row['horas'];

             $datosHorasE = $row['id_hora']."||".
             $row['id_empleado'] ."||".
             $row['fecha']."||".
             $row['horas'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre'].' '.$row['ape_p']; ?></td>
              <td><?php echo $row['fecha']; ?></td>
              <td><?php echo $row['horas']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				        <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_horas" 
                  onclick="AgregarHoras('<?php echo $datosHorasV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_horas" 
                  onclick="agregarformHoras('<?php echo $datosHorasE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarHoras(<?php echo $row['id_hora'] ?>)"><span class="icon-cross"></span></button>
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
		 <th>Dia</th>
         <th>Horas</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#horas').DataTable({
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
 <script src="../../js/funciones-horas.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>