<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_Empleado" tabindex="-1" role="dialog" 
aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <td width="30%"><label>Id Empleado</label></td>  
                     <td width="70%" id="view_empleado_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_empleado_nombre"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Apellido Paterno</label></td>  
                     <td width="70%" id="view_empleado_ap"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Apellido Materno</label></td>  
                     <td width="70%" id="view_empleado_am"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha Nacimiento</label></td>  
                     <td width="70%" id="view_empleado_fn"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>CURP</label></td>  
                     <td width="70%" id="view_empleado_curp"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>RFC</label></td>  
                     <td width="70%" id="view_empleado_rfc"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>NSS</label></td>  
                     <td width="70%" id="view_empleado_tel"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Celular</label></td>  
                     <td width="70%" id="view_empleado_cel"></td>  
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
 <div class="modal fade" id="Agregar_Empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Empleado:</h4></center>
      </div>
      <div class="modal-body">
      
       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="Empleado_nombre" placeholder="Ingrese Nombre" >
         <span class="help-block" id="text_help_nom"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Apellido Paterno:</label>
       	<input type="text" class="form-control" id="Empleado_ap" placeholder="Ingrese Apellido Paterno">
         <span class="help-block" id="text_help_ap"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Apellido Materno:</label>
       	<input type="text" class="form-control" id="Empleado_am" placeholder="Ingrese Apellido Materno">
         <span class="help-block" id="text_help_am"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Fecha Nacimiento:</label>
         <input type="date" name="Empleado_fn" id="Empleado_fn" max="2020-12-31" min="1940-01-01" class="form-control">
        <span class="help-block" id="text_help_fn"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Curp:</label>
       	<input type="text" class="form-control" id="Empleado_curp" placeholder="Ingrese CURP">
         <span class="help-block" id="text_help_curp"></span>
       </div>
       
       <div class="form-group">
       	<label for="">RFC:</label>
       	<input type="text" class="form-control" id="Empleado_rfc" placeholder="Ingrese RFC">
         <span class="help-block" id="text_help_rfc"></span>
       </div>
       
       <div class="form-group">
       	<label for="">NSS:</label>
       	<input type="text" class="form-control" id="Empleado_tel" placeholder="Ingrese Telefono">
        <span class="help-block"  id="text_help_tel"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Celular:</label>
       	<input type="text" class="form-control" id="Empleado_cel" placeholder="Ingrese Celular">
         <span class="help-block"  id="text_help_cel"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_empleado">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar -->  
<div class="modal fade" id="Editar_Empleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Empleado:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="idempleadoAct">
      </div>
       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="Empleado_nombreAct" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_help_nomAct"></span>
       </div>
       
        <div class="form-group">
       	<label for="">Apellido Paterno:</label>
         <input type="text" class="form-control" id="Empleado_apAct" placeholder="Ingrese Apellido Paterno">
         <span class="help-block" id="text_help_apAct"></span>
       </div>
        
       <div class="form-group">
       	<label for="">Apellido Materno:</label>
         <input type="text" class="form-control" id="Empleado_amAct" placeholder="Ingrese Apellido Materno">
         <span class="help-block" id="text_help_amAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Fecha Nacimiento:</label>
         <input type="date" name="Empleado_fn" id="Empleado_fnAct" max="2020-12-31" min="1940-01-01" class="form-control">
        <span class="help-block" id="text_help_fnAct"></span>
       </div>
       
       <div class="form-group">
       	<label for="">Curp:</label>
       	<input type="text" class="form-control" id="Empleado_curpAct" placeholder="Ingrese CURP">
        <span class="help-block" id="text_help_curpAct"></span>
      </div>
       
       <div class="form-group">
       	<label for="">RFC:</label>
       	<input type="text" class="form-control" id="Empleado_rfcAct" placeholder="Ingrese RFC">
         <span class="help-block" id="text_help_rfcAct"></span>
      </div>
       
       <div class="form-group">
       	<label for="">NSS:</label>
       	<input type="text" class="form-control" id="Empleado_telAct" placeholder="Ingrese Telefono">
         <span class="help-block" id="text_help_telAct"></span> 
      </div>
       
       <div class="form-group">
       	<label for="">Celular:</label>
       	<input type="text" class="form-control" id="Empleado_celAct" placeholder="Ingrese Celular">
         <span class="help-block" id="text_help_celAct"></span>
      </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_empleado">Actualizar</button>
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