<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_alergias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Alergia:</h4></center>
      </div>
      <div class="modal-body">
       <div id="alergias_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Alergia</label></td>  
                     <td width="70%" id="view_alergia_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_alergia_emp"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_alergia_descripcion"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Tipo de Sangre</label></td>  
                     <td width="70%" id="view_alergia_sangre"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre de Contacto</label></td>  
                     <td width="70%" id="view_alergia_nombre_contacto"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Telefono de Contacto</label></td>  
                     <td width="70%" id="view_alergia_tel_contacto"></td>  
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
 <div class="modal fade" id="Agregar_alergia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Alergia:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Alergias_idempleado" id="Alergias_idempleado">
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
          <label for="comentarios" class="control-label">
            Descripcion:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Alergias_descripcion" name="Alergias_descripcion" placeholder="Descripcion" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_alergias_descripcion"></span>
          </div>
        </div>

       <div class="form-group">
       	<label for="idempleado">Tipo de Sangre:</label>
       	<select class="form-control" name="Alergias_tipo_sangre" id="Alergias_tipo_sangre">
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="RH+">RH+</option>
          <option value="RH-">RH-</option>
       	</select>
       </div>
        
       <div class="form-group">
       	<label for="">Nombre de Contacto:</label>
         <input type="text" class="form-control" id="Alergias_nombre_contacto" placeholder="Ingrese Nombre de contacto">
         <span class="help-block" id="text_alergias_nombre_contacto"></span>
       </div>

       <div class="form-group">
       	<label for="">Telefono de Contacto:</label>
         <input type="text" class="form-control" id="Alergias_tel_contacto" placeholder="Ingrese Telefono">
         <span class="help-block" id="text_alergias_tel_contacto"></span>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_alergias">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_alergias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Alergia:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Alergias_idalergia_e" id="Alergias_idalergia_e">
        <div class="form-group">
       	<label for="idempleado_e">Empleado:</label>
       	<select class="form-control" name="Alergias_idempleado_e" id="Alergias_idempleado_e">
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
          <label for="comentarios_e" class="control-label">
            Descripcion:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Alergias_descripcion_e" name="Alergias_descripcion_e" placeholder="Descripcion" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_alergias_descripcion_e"></span>
          </div>
        </div>

       <div class="form-group">
       	<label for="idempleado">Tipo de Sangre:</label>
       	<select class="form-control" name="Alergias_tipo_sangre_e" id="Alergias_tipo_sangre_e">
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="RH+">RH+</option>
          <option value="RH-">RH-</option>
       	</select>
       </div>

       <div class="form-group">
       	<label for="">Nombre de Contacto:</label>
         <input type="text" class="form-control" id="Alergias_nombre_contacto_e" placeholder="Ingrese Nombre de contacto">
         <span class="help-block" id="text_alergias_nombre_contacto_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Telefono de Contacto:</label>
         <input type="text" class="form-control" id="Alergias_tel_contacto_e" placeholder="Ingrese Telefono">
         <span class="help-block" id="text_alergias_tel_contacto_e"></span>
       </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_alergias">Actualizar</button>
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