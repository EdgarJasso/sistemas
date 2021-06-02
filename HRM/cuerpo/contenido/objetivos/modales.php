<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Objetivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Objetivos:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Objetivo</label></td>  
                     <td width="70%" id="view_obj_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Puesto</label></td>  
                     <td width="70%" id="view_obj_puesto"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_obj_emp"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Objetivo</label></td>  
                     <td width="70%" id="view_obj_objetivo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Tema</label></td>  
                     <td width="70%" id="view_obj_tema"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Subtema</label></td>  
                     <td width="70%" id="view_obj_subtema"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Periodo</label></td>  
                     <td width="70%" id="view_obj_periodo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha de Asignacion</label></td>  
                     <td width="70%" id="view_obj_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado de Revicion</label></td>  
                     <td width="70%" id="view_obj_estado"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Cumplio</label></td>  
                     <td width="70%" id="view_obj_cumplio"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="view_obj_comentarios"></td>  
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
<!-- View Usuario-->  
<div class="modal fade" id="Ver_Objetivos_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Objetivos:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Objetivo</label></td>  
                     <td width="70%" id="view_obj_id_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Puesto</label></td>  
                     <td width="70%" id="view_obj_puesto_u"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_obj_emp_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Objetivo</label></td>  
                     <td width="70%" id="view_obj_objetivo_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Tema</label></td>  
                     <td width="70%" id="view_obj_tema_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Subtema</label></td>  
                     <td width="70%" id="view_obj_subtema_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Periodo</label></td>  
                     <td width="70%" id="view_obj_periodo_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha de Asignacion</label></td>  
                     <td width="70%" id="view_obj_fecha_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado de Revicion</label></td>  
                     <td width="70%" id="view_obj_estado_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Cumplio</label></td>  
                     <td width="70%" id="view_obj_cumplio_u"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="view_obj_comentarios_u"></td>  
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
 <div class="modal fade" id="Agregar_Objetivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Objetivo:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Obj_idempleado" id="Obj_idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      <div class="form-group">
       	<label for="idempleado">Puesto:</label>
       	<select class="form-control" name="Obj_idpuesto" id="Obj_idpuesto">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_puesto";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_puesto"]?>"><?php echo $row["id_puesto"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      
       <div class="form-group">
         <label for="objetivo"  class="control-label">
           Objetivo
          </label>
         <input id="Obj_objetivo" class="form-control" type="text" name="Obj_objetivo"  placeholder="Objetivo">
         <span class="help-block" id="text_help_obj_objetivo"></span>
       </div>
       <div class="form-group">
         <label for="tema"  class="control-label">
           Tema
          </label>
         <input id="Obj_tema" class="form-control" type="text" name="Obj_tema"  placeholder="Tema">
         <span class="help-block" id="text_help_obj_tema"></span>
       </div>
       <div class="form-group">
         <label for="subtema"  class="control-label">
           Subtema
          </label>
         <input id="Obj_subtema" class="form-control" type="text" name="Obj_objetivo"  placeholder="Subtema">
         <span class="help-block" id="text_help_obj_subtema"></span>
       </div>
       <div class="form-group">
       	<label for="periodo">Periodo:</label>
       	<select class="form-control" name="Obj_periodo" id="Obj_periodo">
         <option value="Mensual">Mensual</option>
         <option value="Bimestral">Bimestral</option> 
         <option value="Trimestal">Trimestral</option>
         <option value="Semestral">Semestral</option>
         <option value="Anual">Anual</option>
       	</select>
       </div>

        <div class="form-group">
         <label >Fecha Asignacion:</label>
         <input type="date" name="Obj_ff" id="Obj_ff" max="2030-12-31" min="2021-01-01" class="form-control">
         <span class="help-block" id="text_help_obj_f"></span>
        </div>

       <div class="form-group">
          <label for="comentarios" class="control-label">
            Comentarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Obj_comentarios" name="coemntarios" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_obj_comentarios"></span>
          </div>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_objetivos">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Objetivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Objetivo:</h4></center>
      </div>
    <div class="modal-body">
      <!-- -->
      <div class="form-group">
      <input type="hidden" name="Obj_id_e" id="Obj_id_e">
       	<label for="idempleado_e">Empleado:</label>
       	<select class="form-control" name="Obj_idempleado_e" id="Obj_idempleado_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      <div class="form-group">
       	<label for="idempleado_e">Puesto:</label>
       	<select class="form-control" name="Obj_idpuesto_e" id="Obj_idpuesto_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_puesto";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_puesto"]?>"><?php echo $row["id_puesto"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
      
       <div class="form-group">
         <label for="objetivo_e"  class="control-label">
           Objetivo
          </label>
         <input id="Obj_objetivo_e" class="form-control" type="text" name="Obj_objetivo_e"  placeholder="Objetivo">
         <span class="help-block" id="text_help_obj_objetivo"></span>
       </div>
       <div class="form-group">
         <label for="tema"  class="control-label">
           Tema
          </label>
         <input id="Obj_tema_e" class="form-control" type="text" name="Obj_tema_e"  placeholder="Tema">
         <span class="help-block" id="text_help_obj_tema_e"></span>
       </div>
       <div class="form-group">
         <label for="subtema_e"  class="control-label">
           Subtema
          </label>
         <input id="Obj_subtema_e" class="form-control" type="text" name="Obj_objetivo_e"  placeholder="Subtema">
         <span class="help-block" id="text_help_obj_subtema_e"></span>
       </div>
       <div class="form-group">
       	<label for="periodo">Periodo:</label>
       	<select class="form-control" name="Obj_periodo_e" id="Obj_periodo_e">
         <option value="Mensual">Mensual</option>
         <option value="Bimestral">Bimestral</option> 
         <option value="Trimestal">Trimestral</option>
         <option value="Semestral">Semestral</option>
         <option value="Anual">Anual</option>
       	</select>
       </div>
        <div class="form-group">
         <label >Fecha Asignacion:</label>
         <input type="date" name="Obj_ff_e" id="Obj_ff_e" max="2030-12-31" min="2021-01-01" class="form-control">
         <span class="help-block" id="text_help_obj_f_e"></span>
        </div>
        <div class="form-group">
        <label>Realizado:</label>
        <center><div class="form-check">
          <input class="form-check-input" type="radio" name="Obj_realizado_e" id="Obj_realizado_e" value="no" checked>
          <label class="form-check-label" for="Obj_realizado_e">
            No
          </label>
          <input class="form-check-input" type="radio" name="Obj_realizado_e" id="Obj_realizado_e" value="si">
          <label class="form-check-label" for="Obj_realizado_e">
           Si
          </label>
        </div></center>
        </div>

       <div class="form-group">
          <label for="comentarios_e" class="control-label">
            Comentarios:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Obj_comentarios_e" name="coemntarios_e" placeholder="Comentarios" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_obj_comentarios_e"></span>
          </div>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_objetivo">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>