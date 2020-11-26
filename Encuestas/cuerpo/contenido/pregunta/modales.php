<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Pre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Pregunta:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Pregunta</label></td>  
                     <td width="70%" id="view_pre_id"></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Competencia</label></td>  
                     <td width="70%" id="view_pre_competencia"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_pre_area"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Categoria</label></td>  
                     <td width="70%" id="view_pre_categoria"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_pre_descripcion"></td>  
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
 <div class="modal fade" id="Agregar_Pre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Pregunta:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
       	<label for="">Competencia:</label>
         <select name="pre_competencia" id="pre_competencia" class="form-control">
          <option value="null" > -Seleccione una competencia- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_competencias";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_competencia"></span>
       </div>

       <div class="form-group">
       	<label for="">Id Area:</label>
         <select name="pre_area" id="pre_area" class="form-control">
          <option value="null" > -Seleccione un area- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_area";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_area'].'">'.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_area"></span>
       </div>

       <div class="form-group">
       	<label for="">Categoria:</label>
         <select name="pre_categoria" id="pre_categoria" class="form-control">
          <option value="null" > -Seleccione una categoria- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_categoria";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Descripcion'].'">'.$row['Id_categoria'].' - '.$row['Descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_categoria"></span>
       </div>

       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="pre_descripcion" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_pre_descripcion"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_pre">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Pre" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Pregunta:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="idpre_e">
      </div>
      
      <div class="form-group">
       	<label for="">Competencia:</label>
         <select name="pre_competencia_e" id="pre_competencia_e" class="form-control">
          <option value="null" > -Seleccione una competencia- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_competencias";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['codigo'].'">'.$row['codigo'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_competencia_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Id Area:</label>
         <select name="pre_area_e" id="pre_area_e" class="form-control">
          <option value="null" > -Seleccione un area- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_area";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_area'].'">'.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_area_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Categoria:</label>
         <select name="pre_categoria_e" id="pre_categoria_e" class="form-control">
          <option value="null" > -Seleccione una categoria- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_categoria";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Descripcion'].'">'.$row['Id_categoria'].' - '.$row['Descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_pre_categoria_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="pre_descripcion_e" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_pre_descripcion_e"></span>
       </div> 
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_pre">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>