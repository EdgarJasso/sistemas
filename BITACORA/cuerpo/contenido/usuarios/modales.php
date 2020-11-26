<?php
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Usuario</label></td>  
                     <td width="70%" id="view_user_i"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_user_nombre"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Contraseña</label></td>  
                     <td width="70%" id="view_user_clav"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Permiso</label></td>  
                     <td width="70%" id="view_user_permis"></td>  
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
 <div class="modal fade" id="Agregar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> 
        <center><h4 class="modal-title">Agregar nuevo Usuario:</h4></center>
      </div>
      <div class="modal-body">

       <div class="form-group">
         <label for="nombre">Nombre:</label>
         <input type="text" class="form-control" id="empleado" name="empleado" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_emp"></span>
       </div>

       <div class="form-group">
         <label for="clave">Clave:</label>
         <input type="text" class="form-control" id="clave" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_pass"></span>
       </div>
       <div class="form-group">
       	<label for="permiso">Permiso:</label>
       	<select class="form-control" name="permiso" id="permiso">
       		<option value="root">Administrador</option>
         </select>
         <span class="help-block" id="text_user_per"></span>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_usua">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idpersona">
      </div>

       <div class="form-group">
         <label for="nombre">Nombre:</label>
         <input type="text" class="form-control" id="idempleado" name="idempleado" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_empAct"></span>
       </div>

       <div class="form-group">
       	<label for="clave">Contraseña:</label>
         <input type="text" class="form-control" id="clave_u" placeholder="Ingrese Contraseña">
         <span class="help-block" id="text_user_passAct"></span>
       </div>
       <div class="form-group">
       	<label for="permiso">Permiso:</label>
       	<select class="form-control" name="permiso" id="permiso_u">
         	<option value="root">Administrador</option>
         </select>
         <span class="help-block" id="text_user_perAct"></span>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_usuario">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>