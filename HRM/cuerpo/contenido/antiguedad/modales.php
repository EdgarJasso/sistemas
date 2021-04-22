<?php
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Antiguedad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Antigüedad:</h4></center>
      </div> 
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Antigüedad</label></td>  
                     <td width="70%" id="view_ant_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_ant_emp"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Puesto</label></td>  
                     <td width="70%" id="view_ant_pues"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Jefe Directo</label></td>  
                     <td width="70%" id="view_ant_jefe"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Activo</label></td>  
                     <td width="70%" id="view_ant_activo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha de Alta</label></td>  
                     <td width="70%" id="view_ant_fi"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha de Baja</label></td>  
                     <td width="70%" id="view_ant_ff"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="view_ant_com"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Color distintivo calendario</label></td>  
                     <td width="70%" id="view_ant_color"></td>  
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
 <div class="modal fade" id="Agregar_Antiguedad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Antigüedad:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Ant_idempleado" id="Ant_idempleado">
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
       	<label for="idempleado">Puesto:</label>
       	<select class="form-control" name="Ant_idpuesto" id="Ant_idpuesto">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_puesto";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_puesto"]?>"><?php echo $row["id_puesto"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
       <div class="form-group">
       	<label for="idjefe">Jefe Directo:</label>
       	<select class="form-control" name="Ant_idjefe" id="Ant_idjefe">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>

       <div class="form-group">
         <label for="">Activo:</label><br>
         <center>
         <label class="radio-inline">
          <input type="radio" name="Ant_activo" id="Ant_activo" checked value="alta">Alta
         </label>
         <label class="radio-inline">
          <input type="radio" name="Ant_activo" id="Ant_activo" value="baja">Baja
         </label>
         </center>
       </div>

       <div class="form-group">
         <label >Fecha Inicio:</label>
         <input type="date" name="Ant_fi" id="Ant_fi" max="2030-12-31" min="2000-01-01" class="form-control">
         <span class="help-block" id="text_help_ant_fi"></span>
        </div>
      
       <div class="form-group">
          <label for="comentarios" class="control-label">
            Comentarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Ant_com" name="Ant_com" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_ant_com"></span>
          </div>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_antiguedad">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Antiguedad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Antigüedad:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Ant_idantiguedad_e" id="Ant_idantiguedad_e">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Ant_idempleado_e" id="Ant_idempleado_e">
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
       	<label for="idempleado">Puesto:</label>
       	<select class="form-control" name="Ant_idpuesto_e" id="Ant_idpuesto_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_puesto";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_puesto"]?>"><?php echo $row["id_puesto"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
       <div class="form-group">
       	<label for="idjefe">Jefe Directo:</label>
       	<select class="form-control" name="Ant_idjefe_e" id="Ant_idjefe_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo  $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>

       <div class="form-group">
         <label for="">Activo:</label><br>
         <center>
         <label class="radio-inline">
          <input type="radio" name="Ant_activo_e" id="Ant_activo_e" checked value="alta">Alta
         </label>
         <label class="radio-inline">
          <input type="radio" name="Ant_activo_e" id="Ant_activo_e" value="baja">Baja
         </label>
         </center>
       </div>

       <div class="form-group">
         <label >Fecha Inicio:</label>
         <input type="date" name="Ant_fi_e" id="Ant_fi_e" max="2030-12-31" min="2000-01-01" class="form-control">
         <span class="help-block" id="text_help_ant_fi_e"></span>
       
        </div>

        <div class="form-group">
         <label >Fecha Final:</label>
         <input type="date" name="Ant_ff_e" id="Ant_ff_e" max="2030-12-31" min="2000-01-01" class="form-control">
         <span class="help-block" id="text_help_ant_ff_e"></span>
       
        </div>

       <div class="form-group">
          <label for="comentarios" class="control-label">
            Comentarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Ant_com_e" name="Ant_com_e" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_ant_com_e"></span>
          </div>
        </div>

        <div class="form-group">
         <label>Color:</label>
         <center><input type="color" name="Ant_color_e" id="Ant_color_e"><br>
         <label>Distintivo en el calendario!</label>
         </center>
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_antiguedad">Actualizar</button>
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