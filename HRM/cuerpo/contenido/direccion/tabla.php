<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
    <center>
     <h2>Direccion</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Direccion" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="direccion">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Municipio</th>
		 <th>Colonia</th>
		 <th>Calle</th>
         <th><center>Accion</center></th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_direccion.id_direccion as id_direccion, hrm_direccion.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_direccion.pais as pais, hrm_direccion.estado as estado, hrm_direccion.municipio as municipio, hrm_direccion.colonia as colonia, hrm_direccion.calle as calle, hrm_direccion.numero as numero, hrm_direccion.entre_calles as entre_calles FROM hrm_direccion, hrm_empleado WHERE hrm_direccion.id_empleado = hrm_empleado.id_empleado";
           foreach ($db->query($query) as $row) {
             $datos = $row['id_direccion']."||".
                      $row['id_empleado']."||".
                      $row['pais'] ."||".
                      $row['estado'] ."||".
                      $row['municipio'] ."||".
                      $row['colonia'] ."||".
                      $row['calle'] ."||".
                      $row['numero'] ."||".
                      $row['entre_calles'];

              $datosVw = $row['id_direccion']."||".
                      $row['id_empleado']."||".
                      $row['nombre']."||".
                      $row['pais'] ."||".
                      $row['estado'] ."||".
                      $row['municipio'] ."||".
                      $row['colonia'] ."||".
                      $row['calle'] ."||".
                      $row['numero'] ."||".
                      $row['entre_calles'];
             ?> 
             <tr>
              <td><?php echo $row['id_empleado'].' - '.$row['nombre']; ?> </td>
              <td><?php echo $row['municipio']; ?></td>
              <td><?php echo $row['colonia']?></td>
              <td><?php echo $row['calle'].' - '.$row['numero']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                   data-target="#Ver_Direccion" onclick="AgregarViewDireccion('<?php echo $datosVw?>')"><span class="icon-eye"></span></button>
                  
                   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Direccion" onclick="agregarformDir('<?php echo $datos?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntardir(<?php echo $row['id_direccion'] ?>)"><span class="icon-cross"></span></button>
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
		 <th>Municipio</th>
		 <th>Colonia</th>
		 <th>Calle</th>
		<th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#direccion').DataTable({
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
 <script src="../../js/funciones_direccion.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>