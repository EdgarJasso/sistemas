<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Usuarios</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#Agregar_Usuario" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="usuarios">
    <thead>
	 <tr> 
		 <th>Id Usuario</th>
		 <th>Empleado</th>
		 <th>Clave</th>
		 <th>Permiso</th>
		 <th>Accion</th>
	 </tr>
	</thead>
	<tbody>
	<?php 
		include_once('../../../php/connection.php');
      try {
        $database = new Connection();
         $db = $database->open();
          $query="SELECT hrm_usuario.id_usuario as id, hrm_usuario.id_empleado as ide, hrm_empleado.nombre as nombre, hrm_usuario.clave as clave, hrm_usuario.permiso as per, hrm_usuario.nomina as nomina FROM hrm_usuario, hrm_empleado WHERE hrm_usuario.id_empleado = hrm_empleado.id_empleado";
           foreach ($db->query($query) as $row) {
             $datos = $row['id']."||".
                      $row['ide']."||".
                      $row['clave'] ."||".
                      $row['per'] ."||".
                      $row['nomina'];
             $datosV = $row['id']."||".
                      $row['ide']."||".
                      $row['nombre']."||".
                      $row['clave'] ."||".
                      $row['per'] ."||".
                      $row['nomina'];
             ?> 
             <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['nombre']; ?></td>
              <td><?php echo $row['clave']?></td>
              <td><?php echo $row['per']; ?></td>
              <td> 
               <center>
                <div class="btn-group">
                 <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="icon-cog"></span>
                  <span class="icon-circle-down"></span>
                 </button>
                 <div class="dropdown-menu box">
                 
				  <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                   data-target="#Ver_Usuario" onclick="AgregarView('<?php echo $datosV?>')"><span class="icon-eye"></span></button>
                  
                   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Usuario" onclick="agregarform('<?php echo $datos?>')"><span class="icon-pencil"></span></button>
                   
				  <button type="button" class="btn btn-danger btn-sm" onclick="preguntarUsuario(<?php echo $row['id'] ?>)"><span class="icon-cross"></span></button>
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
		<th>Id Usuario</th>
		<th>Empleado</th>
		<th>Clave</th>
		<th>Permiso</th>
		<th><center>Accion</center></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<?php include('modales.php');?>
<script>
    $(document).ready( function () {
    $('#usuarios').DataTable({
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
 <script src="../../js/funciones.js"></script>
 <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>