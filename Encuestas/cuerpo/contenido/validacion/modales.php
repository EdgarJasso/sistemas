<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Validacion:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                 <tr>  
                     <td width="30%"><label>Id Validacion</label></td>  
                     <td width="70%" id="view_val_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Calificador</label></td>  
                     <td width="70%" id="view_val_cali"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Calificado</label></td>  
                     <td width="70%" id="view_val_eval"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_val_nom"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Validacion </label></td>  
                     <td width="70%" id="view_val_val"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Area</label></td>  
                     <td width="70%" id="view_val_area"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Categoria</label></td>  
                     <td width="70%" id="view_val_cat"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Tipo</label></td>  
                     <td width="70%" id="view_val_tipo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Periodo</label></td>  
                     <td width="70%" id="view_val_per"></td>  
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
 <div class="modal fade" id="Agregar_Val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Validacion:</h4></center>
      </div>
      <div class="modal-body">

      <div class="form-group">
       	<label for="">Calificador:</label>
         <select name="val_cali" id="val_cali" class="form-control">
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
         <span class="help-block" id="text_val_cali"></span>
       </div>

       <div class="form-group">
       	<label for="">Evaluado:</label>
         <select name="val_eval" id="val_eval" class="form-control">
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
         <span class="help-block" id="text_val_eval"></span>
       </div>

       <div class="form-group">
       	<label for="">Nombre:</label>
         <select name="val_nombre" id="val_nombre" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_usuario";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['nombre'].'">'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_val_nombre"></span>
       </div>

       <div class="form-group">
       	<label for="">Estado:</label>
         <select name="val_estado" id="val_estado" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
          <option value="pendiente">Pendiente</option>
          <option value="hecho">Hecho</option>
         </select>
         <span class="help-block" id="text_val_estado"></span>
       </div>

       <div class="form-group">
       	<label for="">Area:</label>
         <select name="val_area" id="val_area" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
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
         <span class="help-block" id="text_val_area"></span>
       </div>

       <div class="form-group">
       	<label for="">Categoria:</label>
         <select name="val_categoria" id="val_categoria" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_categoria";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Id_categoria'].'">'.$row['Id_categoria'].' - '.$row['Descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_val_categoria"></span>
       </div>

       <div class="form-group">
       	<label for="">Tipo:</label>
         <select name="val_tipo" id="val_tipo" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
          <option value="Autoevaluacion">Autoevaluacion</option>
          <option value="Cliente">Cliente</option>
          <option value="Subordinado">Subordinado</option>
          <option value="Compañero">Compañero</option>
          <option value="Jefe">Jefe</option>
         </select>
         <span class="help-block" id="text_val_tipo"></span>
       </div>

       <div class="form-group">
       	<label for="">Periodo(semestre):</label>
         <select name="val_periodo" id="val_periodo" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
         <?php for ($i=20; $i <=30 ; $i++) { 
          echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
          echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
         }?>
         </select>
         <span class="help-block" id="text_val_periodo"></span>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_val">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Val" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idval_e">
      </div>

      
      <div class="form-group">
       	<label for="">Calificador:</label>
         <select name="val_cali_e" id="val_cali_e" class="form-control">
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
         <span class="help-block" id="text_val_cali_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Evaluado:</label>
         <select name="val_eval_e" id="val_eval_e" class="form-control">
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
         <span class="help-block" id="text_val_eval_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Nombre:</label>
         <select name="val_nombre_e" id="val_nombre_e" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_usuario";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['nombre'].'">'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_val_nombre_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Estado:</label>
         <select name="val_estado_e" id="val_estado_e" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
          <option value="pendiente">Pendiente</option>
          <option value="hecho">Hecho</option>
         </select>
         <span class="help-block" id="text_val_estado_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Area:</label>
         <select name="val_area_e" id="val_area_e" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
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
         <span class="help-block" id="text_val_area_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Categoria:</label>
         <select name="val_categoria_e" id="val_categoria_e" class="form-control">
          <option value="null" > -Seleccione un usuario- </option>
           <?php  
           try {
             $database = new Connection();
              $db = $database->open();
               $query="SELECT * FROM ecsnts_categoria";
                foreach ($db->query($query) as $row) {
                    echo '<option value="'.$row['Id_categoria'].'">'.$row['Id_categoria'].' - '.$row['Descripcion'].'</option>';
                }
                $db = null;                 
          } catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>";
          }?> 
         </select>
         <span class="help-block" id="text_val_categoria_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Tipo:</label>
         <select name="val_tipo_e" id="val_tipo_e" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
          <option value="Autoevaluacion">Autoevaluacion</option>
          <option value="Cliente">Cliente</option>
          <option value="Subordinado">Subordinado</option>
          <option value="Compañero">Compañero</option>
          <option value="Jefe">Jefe</option>
         </select>
         <span class="help-block" id="text_val_tipo_e"></span>
       </div>

       <div class="form-group">
       	<label for="">Periodo(semestre):</label>
         <select name="val_periodo_e" id="val_periodo_e" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
         <?php for ($i=20; $i <=30 ; $i++) { 
          echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
          echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
         }?>
         </select>
         <span class="help-block" id="text_val_periodo_e"></span>
       </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_val">Actualizar</button>
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