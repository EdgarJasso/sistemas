<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>

<?php include('modales.php');?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center>
     <h2>Area</h2>
     </center>
  	
     <button  type="button" class="btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Agregar_Area" id="boton_add"><span class="icon-plus"></span> Nuevo</button>
   <table class="table table-hover table-bordered table-condensed table-striped" id="area">
    <thead>
	 <tr> 
    <th>Id Area</th>
    <th>Nombre</th>
    <th></th>
	 </tr>
	</thead>

	<tfoot>
	<tr>
		<th>Id Area</th>
		<th>Nombre</th>
	  <th></th>
	</tr>
	</tfoot>
   </table>
 </div>
</div>
<script src="../../js/funciones-area.js"></script>

<?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>
