<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<center><form class="form-inline" name="formFechas" id="formFechas" method="post">
    <div class="col-xs-10">
    <div class="form-group">
        <label for="activo">Activo:</label>
        <select name="activo" id="activo" class="form-control">
            <option value="alta">Alta</option>
            <option value="baja">Baja</option>
        </select>
    </div>
    <div class="form-group">
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input id="fecha_inicio" class="form-control" type="date" name="fecha_inicio">
    </div>
    <div class="form-group">
        <label for="fecha_fin">Fecha Fin:</label>
        <input id="fecha_fin" class="form-control" type="date" name="fecha_fin">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Buscar</button>
     </div>
    </div>
</form></center>
<br>
<br>
<br><script src="../../js/funciones-consulta.js"></script>
<div id="table_resultado">
<table class="table table-hover table-bordered table-condensed table-striped" id="consulta">
    <thead>
	 <tr> 
		 <th>Empleado</th>
		 <th>Puesto</th>
         <th>Activo</th>
         <th>Fecha Inicio</th>
         <th>Fecha Fin</th>
	 </tr>
	</thead>
	<tbody>
    
    </tbody>
	<tfoot>
	<tr>
         <th>Empleado</th>
		 <th>Puesto</th>
         <th>Activo</th>
         <th>Fecha Inicio</th>
         <th>Fecha Fin</th>
	</tr>
	</tfoot>
   </table>
</div>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>