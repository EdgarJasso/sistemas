<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
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
                     <td width="30%"><label>Id Area</label></td>  
                     <td width="70%" id="view_cat_area"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_cat_desc"></td>  
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
        <center><h4 class="modal-title">Agregar Nueva Categoria:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
       	<label for="">Area:</label>
         <select name="cat_area" id="cat_area" class="form-control">
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
         <span class="help-block" id="text_cat_area"></span>
       </div>

       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="cat_desc" placeholder="Ingrese Descricion">
         <span class="help-block" id="text_cat_desc"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_cat">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_cat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idcat_e">
      </div>
      <div class="form-group">
       	<label for="">Area:</label>
         <select name="cat_area_e" id="cat_area_e" class="form-control">
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
         <span class="help-block" id="text_cat_area_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="cat_desc_e" placeholder="Ingrese Descricion">
         <span class="help-block" id="text_cat_desc_e"></span>
       </div>
      
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_cat">Actualizar</button>
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