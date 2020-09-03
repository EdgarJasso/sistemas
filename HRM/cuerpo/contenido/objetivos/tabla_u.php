<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center><h3>Objetivos</h3></center>
  	
   <table class="table table-hover table-bordered table-condensed table-striped" id="objetivos_u">
    <thead>
	 <tr> 
		 <th>Puesto</th>
     <th>Empleado</th>
     <th>Titulo</th>
     <th>Fecha Limite</th>
     <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
  <?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_objetivos.id_objetivo as id_objetivo, hrm_objetivos.id_puesto as id_puesto, hrm_puesto.nombre as nombre_puesto, hrm_objetivos.id_empleado as id_empleado, hrm_empleado.nombre as nombre_empleado, hrm_objetivos.titulo as titulo, hrm_objetivos.descripcion as descripcion, hrm_objetivos.f_limite as fecha, hrm_objetivos.cumplio as cumplio, hrm_objetivos.porcentaje as porcentaje FROM hrm_objetivos, hrm_puesto, hrm_empleado WHERE hrm_objetivos.id_puesto = hrm_puesto.id_puesto AND hrm_objetivos.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$_SESSION['idempleado'];
           foreach ($db->query($query) as $row) {

             $datosObjV = $row['id_objetivo']."||".
                          $row['id_puesto']."||".
                          $row['nombre_puesto']."||".
                          $row['id_empleado'] ."||".
                          $row['nombre_empleado']."||".
                          $row['titulo']."||".
                          $row['descripcion']."||".
                          $row['fecha']."||".
                          $row['cumplio']."||".
                          $row['porcentaje'];
             ?> 
             <tr>
              <td><?php echo $row['id_puesto']." - ".$row['nombre_puesto']; ?></td>
              <td><?php echo $row['id_empleado']." - ".$row['nombre_empleado']; ?></td>
              <td><?php echo $row['titulo']; ?></td>
              <td><?php echo $row['fecha']; ?></td>
              <td> 
               <center>
               
				<button type="button" class="btn btn-info btn-sm" 
                  data-toggle="modal" data-target="#Ver_Objetivos" 
                  onclick="AgregarObj('<?php echo $datosObjV?>')"><span class="icon-eye"></span></button>
                 
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
		 <th>Puesto</th>
     <th>Empleado</th>
     <th>Titulo</th>
     <th>Fecha Limite</th>
     <th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#objetivos_u').DataTable({
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
 <script src="../../js/funciones-objetivos.js"></script>
<script>
	$(document).ready(function(){
		$('#guardar_objetivos').click(function(){
		  idp = $('#Obj_idpuesto').val();
		  ide = $('#Obj_idempleado').val();
      desc = $('#Obj_descripcion').val();
      fecha = $('#Obj_ff').val();
      cumplio = $('input[name=Obj_cumplio]:checked').val();
      porce = $('#Obj_por').val();
        
      agregardatosObj(idp, ide, desc, fecha, cumplio, porce);
    });
    
  $('#actualizar_objetivo').click(function(){
    actualizaDatosObj();
   });
	});
</script>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>