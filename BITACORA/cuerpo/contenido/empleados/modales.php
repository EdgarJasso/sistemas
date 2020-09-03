<?php
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Empleado" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Empleado:</h4></center>
      </div> 
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Empleado</label></td>  
                     <td width="70%" id="view_empleado_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_empleado_area"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_empleado_nombre"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apellido Paterno</label></td>  
                     <td width="70%" id="view_empleado_ap"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Apellido Materno</label></td>  
                     <td width="70%" id="view_empleado_am"></td>  
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
 <div class="modal fade" id="Agregar_Empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Empleado:</h4></center>
      </div>
      <div class="modal-body">

      <div class="form-group">
        <label for="area">Area:</label>
        <select  class="form-control" name="Empleado_area" id="Empleado_area">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_area";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["id_area"]?>"><?php echo $row["id_area"]." - ".$row["nombre"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_area"></span>
      </div>

       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="Empleado_nombre" placeholder="Ingrese Nombre" >
         <span class="help-block" id="text_help_nom"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Apellido Paterno:</label>
       	<input type="text" class="form-control" id="Empleado_ap" placeholder="Ingrese Apellido Paterno">
         <span class="help-block" id="text_help_ap"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Apellido Materno:</label>
       	<input type="text" class="form-control" id="Empleado_am" placeholder="Ingrese Apellido Materno">
         <span class="help-block" id="text_help_am"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_empleado">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_Empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idempleadoAct">
      </div>

      <div class="form-group">
        <label for="area">Area:</label>
        <select  class="form-control" name="Empleado_areaAct" id="Empleado_areaAct">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_area";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["id_area"]?>"><?php echo $row["id_area"]." - ".$row["nombre"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_areaAct"></span>
      </div>

       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="Empleado_nombreAct" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_help_nomAct"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Apellido Paterno:</label>
         <input type="text" class="form-control" id="Empleado_apAct" placeholder="Ingrese Apellido Paterno">
         <span class="help-block" id="text_help_apAct"></span>
       </div>
        
       <div class="form-group">
       	<label for="">Apellido Materno:</label>
         <input type="text" class="form-control" id="Empleado_amAct" placeholder="Ingrese Apellido Materno">
         <span class="help-block" id="text_help_amAct"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_empleado">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
?>