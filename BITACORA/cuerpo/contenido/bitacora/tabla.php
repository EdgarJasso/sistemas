<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
    <center> 
     <h2>Bitacora</h2>
     </center>
  	<button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Agregar_Bitacora" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
 
   <table class="table table-hover table-bordered table-condensed table-striped" id="bitacora">
    <thead>
	 <tr> 
		 <th>Id Peticion</th>
		 <th>Encargado</th>
		 <th>Fecha</th>
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
          $query="SELECT * FROM tkd_bitacora";
           foreach ($db->query($query) as $row) {
             $datos = $row['id_bitacora']."||".
                      $row['id_peticion']."||".
                      $row['encargado'] ."||".
                      $row['fecha'] ."||".
                      $row['estado'] ."||".
                      $row['comentarios'];
             ?> 
             <tr>
              <td><?php echo $row['id_peticion']; ?> </td>
              <td><?php echo $row['encargado']; ?></td>
              <td><?php echo $row['fecha']?></td>
              <?php if($row['estado']=="Pendiente"){
                echo "<td><span class='label label-warning text-center'>".$row['estado']."</span></td>";
              }elseif($row['estado']=="Realizado"){
                echo "<td><span class='label label-success text-center'>".$row['estado']."</span></td>";
              }elseif($row['estado']=="Cancelado"){
                echo "<td><span class='label label-danger text-center'>".$row['estado']."</span></td>";
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
                 
				          <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                   data-target="#Ver_Bitacora" onclick="AgregarViewBitacora('<?php echo $datos?>')"><span class="icon-eye"></span></button>
                  
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Editar_Bitacora" onclick="agregarformBit('<?php echo $datos?>')"><span class="icon-pencil"></span></button>
                   
				          <button type="button" class="btn btn-danger btn-sm" onclick="preguntarBit(<?php echo $row['id_bitacora'] ?>)"><span class="icon-cross"></span></button>

                  <a href="../../reporte/bitacora_print.php?id=<?php echo $row['id_bitacora'];?>"  class="btn btn-success btn-sm"><span class="icon-download"></span></a>
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
		 <th>Encargado</th>
		 <th>Fecha</th>
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
    $('#bitacora').DataTable({
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
 <script src="../../js/funciones-bitacora.js"></script>
 <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>
