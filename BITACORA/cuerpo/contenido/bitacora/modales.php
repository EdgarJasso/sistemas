<?php
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?><!-- View -->  
<div class="modal fade" id="Ver_Bitacora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Bitacora:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Bitacora</label></td>  
                     <td width="70%" id="view_id_bitacora"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Id Peticion</label></td>  
                     <td width="70%" id="view_id_peticion"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Encargado</label></td>  
                     <td width="70%" id="view_encargado"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Fecha</label></td>  
                     <td width="70%" id="view_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado</label></td>  
                     <td width="70%" id="view_estado"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="view_comentarios"></td>  
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
 <div class="modal fade" id="Agregar_Bitacora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Bitacora:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
       	<label for="idempleado">Id Peticion:</label>
       	<select class="form-control" name="dir_idempleado" id="bit_peticion">
       	<option value="null">Seleccione un Opcion</option>
        <?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select tkd_peticiones.id_peticion as id_peticion, tkd_area.nombre as area, tkd_empleado.nombre as empleado, tkd_peticiones.servicio as servicio from tkd_peticiones, tkd_empleado, tkd_area where tkd_peticiones.estado = 'Registrado' and tkd_peticiones.id_empleado = tkd_empleado.id_empleado and tkd_empleado.id_area = tkd_area.id_area";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_peticion"]?>"><?php echo $row["id_peticion"]."  -  ".$row["area"]."  -  ".$row["empleado"]."  -  ".$row["servicio"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_bit_peticion"></span>
       </div>
       
       <div class="form-group">
       	<label for="idempleado">Encargado:</label>
       	<select class="form-control" name="bit_encargado" id="bit_encargado">
            <option value="null">Seleccione un Opcion</option>
            <option value="Josue Carreño">Josue Carreño</option>
            <option value="Edgar Jasso">Edgar Jasso</option>
         </select>
         <span class="help-block" id="text_bit_encargado"></span>
       </div>
       
       <div class="form-group">
      <label for="empleado">Hora:</label>
                <div class='input-group date form-group'>
                    <input type='text' class="form-control" id='bit_fecha'>
                    <span class="input-group-addon">
                        <span class="icon-calendar"></span>
                    </span>
                </div> 
        <span class="help-block" id="text_bit_fecha"></span>
        </div>
       
        <div class="form-group">
       	<label for="idempleado">Estado:</label>
       	<select class="form-control" name="bit_estado" id="bit_estado">
           <option value="null">Seleccione un Opcion</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Realizado">Realizado</option>
            <option value="Cancelado">Cancelado</option>
         </select>
         <span class="help-block" id="text_bit_estado"></span>
       </div>
       
       <div class="form-group">
        <label for="comentarios">Comentarios:</label>
        <textarea class="form-control" name="bit_comentarios" id="bit_comentarios" rows="5" placeholder="Opcional" style="resize:none;"></textarea>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_bitacora">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_Bitacora" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Bitacora:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="IdBitacora_e">
      </div>
      <div class="form-group">
       	<label for="idempleado">Id Peticion:</label>
       	<select class="form-control" name="dir_idempleado_e" id="bit_peticion_e">
           <option value="null">Seleccione un Opcion</option>
           <?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select tkd_peticiones.id_peticion as id_peticion, tkd_area.nombre as area, tkd_empleado.nombre as empleado, tkd_peticiones.servicio as servicio from tkd_peticiones, tkd_empleado, tkd_area where tkd_peticiones.id_empleado = tkd_empleado.id_empleado and tkd_empleado.id_area = tkd_area.id_area";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_peticion"]?>"><?php echo $row["id_peticion"]."  -  ".$row["area"]."  -  ".$row["empleado"]."  -  ".$row["servicio"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_bit_peticion_e"></span>
       </div>
       
       <div class="form-group">
       	<label for="idempleado">Encargado:</label>
       	<select class="form-control" name="bit_encargado_e" id="bit_encargado_e">
           <option value="null">Seleccione un Opcion</option>
            <option value="Josue Carreño">Josue Carreño</option>
            <option value="Edgar Jasso">Edgar Jasso</option>
         </select>
         <span class="help-block" id="text_bit_encargado_e"></span>
       </div>
        
       <div class="form-group">
      <label for="empleado">Hora:</label>
                <div class='input-group date form-group'>
                    <input type='text' class="form-control" id='bit_fecha_e'>
                    <span class="input-group-addon">
                        <span class="icon-calendar_e"></span>
                    </span>
                </div>
        <span class="help-block" id="text_bit_fecha_e"></span>
        </div>
       
        <div class="form-group">
       	<label for="idempleado">Estado:</label>
       	<select class="form-control" name="bit_estado_e" id="bit_estado_e">
           <option value="null">Seleccione un Opcion</option>
            <option value="Pendiente">Pendiente</option>
            <option value="Realizado">Realizado</option>
            <option value="Cancelado">Cancelado</option>
         </select>
         <span class="help-block" id="text_bit_estado_e"></span>
       </div>
       
       <div class="form-group">
        <label for="comentarios">Comentarios:</label>
        <textarea class="form-control" name="bit_comentarios_e" id="bit_comentarios_e" rows="5" placeholder="Opcional" style="resize:none;"></textarea>
      </div> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_bitacora">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>