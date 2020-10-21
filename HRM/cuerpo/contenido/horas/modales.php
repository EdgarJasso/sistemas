<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_horas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Horas:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Hora</label></td>  
                     <td width="70%" id="view_horas_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_horas_emp"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Fecha</label></td>  
                     <td width="70%" id="view_horas_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Horas</label></td>  
                     <td width="70%" id="view_horas_horas"></td>  
                </tr>
           </table>  
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="">Cerrar</button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal de  Add-->
 <div class="modal fade" id="Agregar_horas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Horas:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Horas_idempleado" id="Horas_idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>

       <div class="form-group">
         <label >Fecha:</label>
         <input type="date" name="Horas_dia" id="Horas_dia" max="2030-12-31" min="2020-05-01" class="form-control">
         <span class="help-block" id="text_help_horas_f"></span>
        </div>

        <div class="form-group">
         <label>Horas:</label>
            <select class="form-control" name="Horas_horas" id="Horas_horas">
            <?php for($i=1; $i<=8; $i++){
                echo "<option value='".$i."'>".$i."</option>";
            }?>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_horas">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_horas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Horas:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Horas_idhoras_e" id="Horas_idhoras_e">
        <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Horas_idempleado_e" id="Horas_idempleado_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>

       <div class="form-group">
         <label >Fecha:</label>
         <input type="date" name="Horas_fecha_e" id="Horas_fecha_e" max="2030-12-31" min="2020-05-01" class="form-control">
         <span class="help-block" id="text_help_horas_f_e"></span>
        </div>

        <div class="form-group">
         <label>Horas:</label>
            <select class="form-control" name="Horas_horas_e" id="Horas_horas_e">
            <?php for($i=1; $i<=8; $i++){
                echo "<option value='".$i."'>".$i."</option>";
            }?>
            </select>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_horas">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>