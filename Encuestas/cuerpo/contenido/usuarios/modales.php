<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Usu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           <table class="table table-bordered"
                 <tr>  
                     <td width="30%"><label>Id Usuario</label></td>  
                     <td width="70%" id="view_usu_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_usu_area"></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_usu_nombre"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Clave</label></td>  
                     <td width="70%" id="view_usu_clave"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Permiso</label></td>  
                     <td width="70%" id="view_usu_permiso"></td>  
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
 <div class="modal fade" id="Agregar_Usu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Usuario:</h4></center>
      </div>
      <div class="modal-body">

      <div class="form-group">
       	<label for="">Area:</label>
         <select name="usu_area" id="usu_area" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_area";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_area'].'">'.$row['id_area'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_usu_area"></span>
       </div>

      <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="usu_nombre" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_usu_nombre"></span>
       </div>

       <div class="form-group">
       	<label for="">Contraseña:</label>
         <input type="text" class="form-control" id="usu_pass" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_usu_pass"></span>
       </div>

       <div class="form-group">
       	<label for="">Permiso:</label>
         <select name="usu_permiso" id="usu_permiso" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <option value="user">Usuario</option>
           <option value="root">Administrador</option>
         </select>
         <span class="help-block" id="text_usu_permiso"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_usu">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Usu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idusu_e">
      </div>

      <div class="form-group">
       	<label for="">Area:</label>
         <select name="usu_area_e" id="usu_area_e" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_area";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_area'].'">'.$row['id_area'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_usu_area_e"></span>
       </div>

      <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="usu_nombre_e" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_usu_nombre_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Contraseña:</label>
         <input type="text" class="form-control" id="usu_pass_e" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_usu_pass_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Permiso:</label>
         <select name="usu_permiso" id="usu_permiso_e" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <option value="user">Usuario</option>
           <option value="root">Administrador</option>
         </select>
         <span class="help-block" id="text_usu_permiso_e"></span>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_usu">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>