<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Usuario:</h4></center>
      </div> 
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Usuario</label></td>  
                     <td width="70%" id="view_user_i"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado:</label></td>  
                     <td width="70%" id="view_user_nombre"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Clave</label></td>  
                     <td width="70%" id="view_user_clav"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Permiso</label></td>  
                     <td width="70%" id="view_user_permis"></td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Permiso para nomina</label></td>  
                     <td width="70%" id="view_user_nomina"></td>  
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
 <div class="modal fade" id="Agregar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
        <center><h4 class="modal-title">Agregar nuevo Usuario:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="empleado" id="empleado">
         <option label="-Seleccione Empleado-" disabled>-Seleccione Empleado-</option>
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_user_emp"></span>
       </div>
       <div class="form-group">
         <label for="clave">Clave:</label>
         <input type="text" class="form-control" id="clave" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_pass"></span>
       </div>
       <div class="form-group">
       	<label for="permiso">Permiso:</label>
       	<select class="form-control" name="permiso" id="permiso">
       		<option value="user">Usuario</option>
          <option value="objetivos">Objetivos</option>
          <option value="jefe-area">Jefe de Area</option>
       		<option value="admin">Administrador</option>
         </select>
         <span class="help-block" id="text_user_per"></span>
       </div>
       <div class="form-check">
       <label class="form-check-label" for="nomina">Acceso a nomina</label><br>
        <input type="checkbox" class="form-check-input" id="nomina" value="activado">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_usua">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Usuario:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
      	<input type="hidden" id="idpersona">
      </div>
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="idempleado" id="idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_user_empAct"></span>
       </div>
       <div class="form-group">
       	<label for="clave">Contraseña:</label>
         <input type="text" class="form-control" id="clave_u" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_passAct"></span>
       </div>
       <div class="form-group">
       	<label for="permiso">Permiso:</label>
       	<select class="form-control" name="permiso" id="permiso_u">
         <option value="user">Usuario</option>
          <option value="objetivos">Objetivos</option>
          <option value="jefe-area">Jefe de Area</option>
       		<option value="admin">Administrador</option>
         </select>
         <span class="help-block" id="text_user_perAct"></span>
       </div>
       <div class="form-check">
       <label class="form-check-label" for="nomina_u">Acceso a nomina</label><br>
       <input type="checkbox" class="form-check-input" id="nomina_u" value="activado">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_usuario">Actualizar</button>
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