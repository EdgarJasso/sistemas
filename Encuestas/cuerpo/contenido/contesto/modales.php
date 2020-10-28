<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Contesto:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Contesto</label></td>  
                     <td width="70%" id="view_con_id"></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Id Usuario</label></td>  
                     <td width="70%" id="view_con_usuario"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Id Validacion</label></td>  
                     <td width="70%" id="view_con_validacion"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Id Registro</label></td>  
                     <td width="70%" id="view_con_registro"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha</label></td>  
                     <td width="70%" id="view_con_fecha"></td>  
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
 <div class="modal fade" id="Agregar_Con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Contesto:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
       	<label for="">Contesto:</label>
         <select name="con_usuario" id="con_usuario" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_usuario";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_usuario'].'">'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_con_usuario"></span>
       </div>

       <div class="form-group">
       	<label for="">Id Encuesta:</label>
         <select name="con_validacion" id="con_validacion" class="form-control">
          <option value="null" > -Seleccione una Encuesta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_validacion";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Id_validacion'].'"> Califica'.$row['Calificador'].' - Evaluado '.$row['Calificado'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_con_validacion"></span>
       </div>

      
            <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT id_registro FROM ecsnts_respuestas ORDER BY id_registro DESC LIMIT 1";
                $stmt = $db->prepare($query);              
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $result = $stmt->fetch();
                $nrn = $result['id_registro'];
                $nrn++;
            ?>
            <div class="form-group">
       	    <label for="">No Registro:</label>
            <input type="text" class="form-control" id="con_registro" placeholder="No. Registro siguiente:<?=$nrn?>">
            <span class="help-block" id="text_con_registro"></span>
              </div>
              <?php  $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
      
       <div class="form-group">
       	<label for="">Fecha:</label>
         <input type="text" class="form-control" id="con_fecha" placeholder="Ingrese Fecha">
         <span class="help-block" id="text_con_fecha"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_con">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Con" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idcon_e">
      </div>
      <div class="form-group">
       	<label for="">Contesto:</label>
         <select name="con_usuario_e" id="con_usuario_e" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_usuario";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_usuario'].'">'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_con_usuario_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Id Encuesta:</label>
         <select name="con_validacion_e" id="con_validacion_e" class="form-control">
          <option value="null" > -Seleccione una Encuesta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_validacion";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Id_validacion'].'"> Califica'.$row['Calificador'].' - Evaluado '.$row['Calificado'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_con_validacion_e"></span>
       </div>

      
            <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT id_registro FROM ecsnts_respuestas ORDER BY id_registro DESC LIMIT 1";
                $stmt = $db->prepare($query);              
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $result = $stmt->fetch();
                $nrn = $result['id_registro'];
                $nrn++;
            ?>
            <div class="form-group">
       	    <label for="">No Registro:</label>
            <input type="text" class="form-control" id="con_registro_e" placeholder="No. Registro siguiente:<?=$nrn?>">
            <span class="help-block" id="text_con_registro_e"></span>
              </div>
              <?php  $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
      
       <div class="form-group">
       	<label for="">Fecha:</label>
         <input type="text" class="form-control" id="con_fecha_e" placeholder="Ingrese Fecha">
         <span class="help-block" id="text_con_fecha_e"></span>
       </div>
       
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_con">Actualizar</button>
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