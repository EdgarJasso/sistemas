<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Res" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Respuesta:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered"
                 <tr>  
                     <td width="30%"><label>Id Respuesta</label></td>  
                     <td width="70%" id="view_res_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>No Registro</label></td>  
                     <td width="70%" id="view_res_registro"></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Id Pregunta</label></td>  
                     <td width="70%" id="view_res_pregunta"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Respuesta</label></td>  
                     <td width="70%" id="view_res_respuesta"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Justificacion</label></td>  
                     <td width="70%" id="view_res_justificacion"></td>  
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
 <div class="modal fade" id="Agregar_Res" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Respuesta:</h4></center>
      </div>
      <div class="modal-body">
      
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
            <input type="text" class="form-control" id="res_registro" placeholder="No. Registro siguiente:<?=$nrn?>">
            <span class="help-block" id="text_res_registro"></span>
              </div>
              <?php  $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 

      <div class="form-group">
       	<label for="">Id Pregunta:</label>
         <select name="pre_competencia" id="res_pregunta" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_pregunta";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_pregunta'].'">'.$row['id_pregunta'].' - '.$row['descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_res_pregunta"></span>
       </div>

       <div class="form-group">
       	<label for="">Respuesta:</label>
         <select name="res_respuesta" id="res_respuesta" class="form-control">
          <option value="null" > -Seleccione una respuesta- </option>
              <option value="Completamente_en_desacuerdo">Completamente en desacuerdo</option>
                <option value="No_estoy_de_acuerdo">No estoy de acuerdo</option>
                <option value="Ni_acuerdo_ni_en_desacuerdo" selected>Ni acuerdo- ni en desacuerdo</option>
                <option value="De_acuerdo">De acuerdo</option>
                <option value="Completamente_de_acuerdo">Completamente de acuerdo</option>
         </select>
         <span class="help-block" id="text_res_respuesta"></span>
       </div>

       <div class="form-group">
       	<label for="">Justificacion:</label>
         <input type="text" class="form-control" id="res_justificacion" placeholder="Ingrese Justificacion">
         <span class="help-block" id="text_res_justificacion"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_res">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Res" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Respuesta:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="idres_e">
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
            <input type="text" class="form-control" id="res_registro_e" placeholder="No. Registro siguiente:<?=$nrn?>">
            <span class="help-block" id="text_res_registro_e"></span>
              </div>
              <?php  $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 

      <div class="form-group">
       	<label for="">Id Pregunta:</label>
         <select name="pre_competencia" id="res_pregunta_e" class="form-control">
          <option value="null" > -Seleccione una pregunta- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_pregunta";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['id_pregunta'].'">'.$row['id_pregunta'].' - '.$row['descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_res_pregunta_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Respuesta:</label>
         <select name="res_respuesta_e" id="res_respuesta_e" class="form-control">
          <option value="null" > -Seleccione una respuesta- </option>
              <option value="Completamente_en_desacuerdo">Completamente en desacuerdo</option>
                <option value="No_estoy_de_acuerdo">No estoy de acuerdo</option>
                <option value="Ni_acuerdo_ni_en_desacuerdo" selected>Ni acuerdo- ni en desacuerdo</option>
                <option value="De_acuerdo">De acuerdo</option>
                <option value="Completamente_de_acuerdo">Completamente de acuerdo</option>
         </select>
         <span class="help-block" id="text_res_respuesta_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Justificacion:</label>
         <input type="text" class="form-control" id="res_justificacion_e" placeholder="Ingrese Justificacion">
         <span class="help-block" id="text_res_justificacion_e"></span>
       </div>
       

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_res">Actualizar</button>
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