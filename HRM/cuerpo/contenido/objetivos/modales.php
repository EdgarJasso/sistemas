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
                     <td width="30%"><label>Titulo</label></td>  
                     <td width="70%" id="view_obj_tit"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_obj_desc"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha</label></td>  
                     <td width="70%" id="view_obj_f"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Cumplio</label></td>  
                     <td width="70%" id="view_obj_cum"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Porcentaje</label></td>  
                     <td width="70%" id="view_obj_pot"></td>  
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
         <label for="titulo"  class="control-label">
           Titulo
          </label>
         <input id="Obj_tit" class="form-control" type="text" name="Obj_tit"  placeholder="Titulo">
         <span class="help-block" id="text_help_obj_tit"></span>
       </div>
       <div class="form-group">
          <label for="descripcion" class="control-label">
            Descripcion:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Obj_descripcion" name="descripcion" placeholder="Descripcion" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_obj_desc"></span>
          </div>
         
        </div>

        <div class="form-group">
         <label >Fecha Limite:</label>
         <input type="date" name="Obj_ff" id="Obj_ff" max="2030-12-31" min="2000-01-01" class="form-control">
         <span class="help-block" id="text_help_obj_f"></span>
        </div>
      
       <div class="form-group">
         <label for="">Cumplio:</label><br>
         <center>
         <label class="radio-inline">
          <input type="radio" name="Obj_cumplio" id="Obj_cumplio"  value="no" checked >No
         </label>
         <label class="radio-inline">
          <input type="radio" name="Obj_cumplio" id="Obj_cumplio" value="si">Si
         </label>
         </center>
       </div>
       <div class="form-group">
         <label >Porcentaje: <span id="porcentaje_salida"></span></label>
         <input type="range" id="Obj_por" name="Obj_por" min="0" max="100">
       </div>
         <script>
             $(document).ready(function(){
                $('#Obj_por').change(function(){
                  $('#porcentaje_salida').html($(this).val());  
                })
             });
         </script>
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
    <div class="form-group">
        <input type="hidden" name="Obj_id_e" id="Obj_id_e">
       	<label for="idempleado">Puesto:</label>
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
       	<label for="idempleado">Empleado:</label>
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
         <label for="titulo"  class="control-label">
           Titulo
          </label>
         <input id="Obj_tit_e" class="form-control" type="text" name="Obj_tit_e" placeholder="Titulo">
         <span class="help-block" id="text_help_obj_tit_e"></span>
       </div>
       <div class="form-group">
          <label for="descripcion" class="control-label">
            Descripcion:
          </label>
         <div class="">
            <textarea class="form-control" rows="3" id="Obj_descripcion_e" name="descripcion_e" placeholder="Descripcion" style="resize:none;" required></textarea>
            <span class="help-block" id="text_help_obj_desc_e"></span>
          </div>
        </div>

        <div class="form-group">
         <label >Fecha Limite:</label>
         <input type="date" name="Obj_ff_e" id="Obj_ff_e" max="2030-12-31" min="2000-01-01" class="form-control">
         <span class="help-block" id="text_help_obj_f_e"></span>
        </div>
      
       <div class="form-group">
         <label for="">Cumplio:</label><br>
         <center>
         <label class="radio-inline">
          <input type="radio" name="Obj_cumplio_e" id="Obj_cumplio_e"  value="no" >No
         </label>
         <label class="radio-inline">
          <input type="radio" name="Obj_cumplio_e" id="Obj_cumplio_e" value="si">Si
         </label>
         </center>
       </div>
       <div class="form-group">
         <label >Porcentaje: <span id="porcentaje_salida_e"></span></label>
         <input type="range" id="Obj_por_e" name="Obj_por_e" min="0" max="100">
       </div>
         <script>
             $(document).ready(function(){
                $('#Obj_por_e').change(function(){
                  $('#porcentaje_salida_e').html($(this).val());  
                })
             });
         </script>
    
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