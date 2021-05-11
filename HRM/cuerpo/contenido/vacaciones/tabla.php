<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Vacaciones</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_vacaciones" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="vacaciones">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Dia</th>
     <th>Estado</th>
     <th>Valor</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
         
        $query = "";

          

if($_SESSION['permiso']=='admin'){
  $query="SELECT 
          hrm_vacaciones.id_vacaciones as id_vacaciones,
           hrm_vacaciones.id_empleado as id_empleado, 
           hrm_empleado.nombre as nombre_empleado, 
           hrm_vacaciones.fecha as fecha, 
           hrm_vacaciones.dia as dia, 
           hrm_vacaciones.color as color, 
           hrm_vacaciones.estado as estado 
           FROM hrm_vacaciones, hrm_empleado 
           WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado";
}else{}

if($_SESSION['permiso']=='gerente'){
  $query ="SELECT 
  hrm_vacaciones.id_vacaciones as id_vacaciones,
           hrm_vacaciones.id_empleado as id_empleado, 
           hrm_empleado.nombre as nombre_empleado, 
           hrm_vacaciones.fecha as fecha, 
           hrm_vacaciones.dia as dia, 
           hrm_vacaciones.color as color, 
           hrm_vacaciones.estado as estado 
  FROM hrm_vacaciones, hrm_empleado, hrm_area, hrm_antiguedad, hrm_puesto 
  WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado 
  AND hrm_area.id_area = hrm_puesto.id_area 
  AND hrm_puesto.id_puesto = hrm_antiguedad.id_puesto 
  AND hrm_empleado.id_empleado = hrm_antiguedad.id_empleado 
  AND hrm_area.nombre = '".$_SESSION['area']."'";
}else{}

           foreach ($db->query($query) as $row) {

             $datosVacV = $row['id_vacaciones']."||".
                      $row['id_empleado'] ."||".
                      $row['nombre_empleado']."||".
                      $row['fecha']."||".
                      $row['dia']."||".
                      $row['color']."||".
                      $row['estado'];

             $datosVacE = $row['id_vacaciones']."||".
             $row['id_empleado'] ."||".
             $row['fecha']."||".
             $row['dia']."||".
             $row['estado'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['dia']; ?></td>
              <td><?php echo $row['estado']; ?></td>
              <td><?php 
                    if($row['estado']=='Pendiente'){
                      $out = ' <center>
                              <button type="button" class="btn btn-danger btn-sm" onclick="preguntarDen('. $row["id_vacaciones"].')"><span class="icon-cross"></span></button>
                              <button type="button" class="btn btn-success btn-sm" onclick="preguntarApr('. $row["id_vacaciones"].')"><span class="icon-checkmark"></span></button>
                              
                              </center>';
                      echo $out;
                    }else{
                      $out = '';
                      echo $out;
                    }
               
              ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				        <button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_vacaciones" 
                  onclick="AgregarVac('<?php echo $datosVacV?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" 
                  data-toggle="modal" data-target="#Editar_vacaciones" 
                  onclick="agregarformVac('<?php echo $datosVacE?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarVac(<?php echo $row['id_vacaciones'] ?>)"><span class="icon-cross"></span></button>
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
         <th>Estado</th>
         <th>Valor</th>
         <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#vacaciones').DataTable({
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
 <script src="../../js/funciones-vacaciones.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>