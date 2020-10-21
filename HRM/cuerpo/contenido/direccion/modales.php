<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Direccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <td width="30%"><label>Id Direccion</label></td>  
                     <td width="70%" id="view_id_direccion"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_id_empleado"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Pais</label></td>  
                     <td width="70%" id="view_pais"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado</label></td>  
                     <td width="70%" id="view_estado"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Municipio</label></td>  
                     <td width="70%" id="view_municipio"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Colonia</label></td>  
                     <td width="70%" id="view_colonia"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Calle</label></td>  
                     <td width="70%" id="view_calle"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Numero</label></td>  
                     <td width="70%" id="view_numero"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Entre Calles</label></td>  
                     <td width="70%" id="view_entre_calles"></td>  
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
 <div class="modal fade" id="Agregar_Direccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Direccion:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="dir_idempleado" id="dir_idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_dir_emp"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Pais:</label>
         <input type="text" class="form-control" id="dir_pais" placeholder="Ingrese Pais">
         <span class="help-block" id="text_dir_pais"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Estado:</label>
         <input type="text" class="form-control" id="dir_estado" placeholder="Ingrese Estado">
         <span class="help-block" id="text_dir_estado"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Municipio:</label>
         <input type="text" class="form-control" id="dir_municipio" placeholder="Ingrese Municipio">
         <span class="help-block" id="text_dir_municipio"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Colonia:</label>
         <input type="text" class="form-control" id="dir_colonia" placeholder="Ingrese Colonia">
         <span class="help-block" id="text_dir_colonia"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Calle:</label>
         <input type="text" class="form-control" id="dir_calle" placeholder="Ingrese Calle">
         <span class="help-block" id="text_dir_calle"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Numero:</label>
         <input type="text" class="form-control" id="dir_numero" placeholder="Ingrese Numero">
         <span class="help-block" id="text_dir_num"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Entre Calles:</label>
         <input type="text" class="form-control" id="dir_entre" placeholder="Ingrese Entre Calles">
         <span class="help-block" id="text_dir_enc"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_direccion">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Direccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Direccion:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="iddirAct">
      </div>
      <div class="form-group">
       	<label for="idempleadodir">Empleado:</label>
       	<select class="form-control" name="dir_idempleadoAct" id="dir_idempleadoAct">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
            $query="select * from hrm_empleado";
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
         </select>
         <span class="help-block" id="text_dir_empAct"></span>
       </div>
       <div class="form-group">
       	<label for="">Pais:</label>
         <input type="text" class="form-control" id="dir_paisAct" placeholder="Ingrese Pais">
         <span class="help-block" id="text_dir_paisAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Estado:</label>
         <input type="text" class="form-control" id="dir_estadoAct" placeholder="Ingrese Estado">
         <span class="help-block" id="text_dir_estadoAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Municipio:</label>
         <input type="text" class="form-control" id="dir_municipioAct" placeholder="Ingrese Municipio">
         <span class="help-block" id="text_dir_municipioAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Colonia:</label>
         <input type="text" class="form-control" id="dir_coloniaAct" placeholder="Ingrese Colonia">
         <span class="help-block" id="text_dir_coloniaAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Calle:</label>
         <input type="text" class="form-control" id="dir_calleAct" placeholder="Ingrese Calle">
         <span class="help-block" id="text_dir_calleAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Numero:</label>
         <input type="text" class="form-control" id="dir_numeroAct" placeholder="Ingrese Numero">
         <span class="help-block" id="text_dir_numAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Entre Calles:</label>
         <input type="text" class="form-control" id="dir_entreAct" placeholder="Ingrese Entre Calles">
         <span class="help-block" id="text_dir_encAct"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_direccion">Actualizar</button>
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