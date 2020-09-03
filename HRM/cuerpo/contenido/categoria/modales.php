<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Categoria:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Categoria</label></td>  
                     <td width="70%" id="view_cat_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_cat_area"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_cat_nombre"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_cat_desc"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Sueldo:</label></td>  
                     <td width="70%" id="view_cat_sueldo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios:</label></td>  
                     <td width="70%" id="view_cat_comentarios"></td>  
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
 <div class="modal fade" id="Agregar_Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Categoria:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Area:</label>
       	<select class="form-control" name="Cat_idarea" id="Cat_idarea">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_area";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_area"]?>"><?php echo $row["id_area"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      
       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="Cat_nombre" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_help_cat_nom"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Descripcion:</label>
       	<input type="text" class="form-control" id="Cat_descripcion" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_help_cat_desc"></span>
      </div>
       
       <div class="form-group">
       	<label for="">Sueldo:</label>
       	<input type="text" class="form-control" id="Cat_sueldo" placeholder="Ingrese Sueldo">
         <span class="help-block" id="text_help_cat_sueldo"></span>
      </div>

      <div class="form-group">
          <label for="" class="control-label">
            Cometarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Cat_comentarios" name="Cat_comentarios" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_cat_comentarios"></span>
          </div>
         
        </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_categoria">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Categoria:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="idCatact">
      </div>
      <div class="form-group">
       	<label for="idempleado">Area:</label>
       	<select class="form-control" name="Cat_idarea_act" id="Cat_idarea_act">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_area";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_area"]?>"><?php echo $row["id_area"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      
       <div class="form-group">
       	<label for="">Nombre:</label>
       	<input type="text" class="form-control" id="Cat_nombre_act" placeholder="Ingrese Nombre">
        <span class="help-block" id="text_help_cat_nomb_act"></span>
      </div>
       
        <div class="form-group">
       	<label for="">Descripcion:</label>
       	<input type="text" class="form-control" id="Cat_descripcion_act" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_help_cat_desc_act"></span>
      </div>
       
       <div class="form-group">
       	<label for="">Sueldo:</label>
       	<input type="text" class="form-control" id="Cat_sueldo_act" placeholder="Ingrese Sueldo">
         <span class="help-block" id="text_help_cat_sueldo_act"></span>
      </div>

      <div class="form-group">
          <label for="" class="control-label">
            Cometarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Cat_comentarios_act" name="Cat_comentarios_act" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_cat_comentarios_act"></span>
          </div>
         
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_categoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>