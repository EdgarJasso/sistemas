<?php
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Peticion" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Peticion:</h4></center>
      </div> 
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Peticion</label></td>  
                     <td width="70%" id="view_peticion_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_peticion_empleado"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_peticion_area"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha</label></td>  
                     <td width="70%" id="view_peticion_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Servicio</label></td>  
                     <td width="70%" id="view_peticion_servicio"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="view_peticion_comentarios"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado</label></td>  
                     <td width="70%" id="view_peticion_estado"></td>  
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
 <div class="modal fade" id="Agregar_Peticion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Peticion:</h4></center>
      </div>
      <div class="modal-body">

      <div class="form-group">
        <label for="area">Area:</label>
        <select  class="form-control" name="pet_area" id="pet_area">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_area";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["id_area"]?>"><?php echo $row["nombre"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_pet_area"></span>
      </div>

      <div class="form-group" id="generar_empleados_a">
        <label for="empleado">Empleado:</label>
        <select class="form-control" name="pet_empleado" id="pet_empleado">
          <option value="null">Seleccione opcion</option>
        </select>
        <span class="help-block" id="text_help_pet_empleado"></span>
      </div>
       
      <div class="form-group">
      <label for="empleado">Hora:</label>
                <div class='input-group date form-group'>
                    <input type='text' class="form-control" id='pet_fecha'>
                    <span class="input-group-addon">
                        <span class="icon-calendar"></span>
                    </span>
                </div>
        <span class="help-block" id="text_help_pet_fecha"></span>
        </div>

      <div class="form-group">
        <label for="servicio">Servicio:</label>
        <select  class="form-control" name="pet_servicio" id="pet_servicio">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_servicios";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["descripcion"]?>"><?php echo $row["descripcion"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_pet_servicio"></span>
      </div>


      <div class="form-group">
        <label for="comentarios">Comentarios:</label>
        <textarea id="pet_comentarios" class="form-control" name="pet_comentarios" id="pet_comentarios" rows="5" placeholder="Opcional" style="resize:none;"></textarea>
      </div>

      <div class="form-group">
        <label for="estado">Estado:</label>
        <select class="form-control" name="pet_estado" id="pet_estado">
          <option value="null">Seleccione opcion</option>
          <option value="Registrado">Registrado</option>
          <option value="Asignado">Asignado</option>
          <option value="Finalizado">Finalizado</option>
        </select>
        <span class="help-block" id="text_help_pet_estado"></span>
      </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_peticion">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_Peticion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Empleado:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      <input type="hidden" name="id_peticion_e" id="id_peticion_e">
        <label for="area">Area:</label>
        <select  class="form-control" name="pet_area_e" id="pet_area_e">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_area";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["id_area"]?>"><?php echo $row["nombre"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_pet_area_e"></span>
      </div>

      <div class="form-group" id="generar_empleados_e">
        <label for="empleado">Empleado:</label>
        <select class="form-control" name="pet_empleado_e" id="pet_empleado_e">
          <option value="null">Seleccione opcion</option>
        </select>
        <span class="help-block" id="text_help_pet_empleado_e"></span>
      </div>
       
      <div class="form-group">
      <label for="empleado">Hora:</label>
                <div class='input-group date form-group'>
                    <input type='text' class="form-control" id='pet_fecha_e'>
                    <span class="input-group-addon">
                        <span class="icon-calendar"></span>
                    </span>
                </div>
        <span class="help-block" id="text_help_pet_fecha_e"></span>
        </div>
 
      <div class="form-group">
        <label for="servicio">Servicio:</label>
        <select  class="form-control" name="pet_servicio_e" id="pet_servicio_e">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_servicios";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["descripcion"]?>"><?php echo $row["descripcion"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_pet_servicio_e"></span>
      </div>


      <div class="form-group">
        <label for="comentarios">Comentarios:</label>
        <textarea id="pet_comentarios_e" class="form-control" name="pet_comentarios" id="pet_comentarios" rows="5" placeholder="Opcional" style="resize:none;"></textarea>
      </div>

      <div class="form-group">
        <label for="estado">Estado:</label>
        <select class="form-control" name="pet_estado_e" id="pet_estado_e">
          <option value="null">Seleccione opcion</option>
          <option value="Registrado">Registrado</option>
          <option value="Asignado">Asignado</option>
          <option value="Finalizado">Finalizado</option>
        </select>
        <span class="help-block" id="text_help_pet_estado_e"></span>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_peticion">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
}
?>