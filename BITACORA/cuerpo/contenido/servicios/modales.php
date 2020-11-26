<?php
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_Servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Servicio:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Servicio</label></td>  
                     <td width="70%" id="view_servicio_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Descricion</label></td>  
                     <td width="70%" id="view_servicio_descripcion"></td>  
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
 <div class="modal fade" id="Agregar_Servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nuevo Servicio:</h4></center>
      </div>
      <div class="modal-body">
      
       <div class="form-group">
       	<label for="">Descricion:</label>
         <input type="text" class="form-control" id="servicio_descripcion" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_servicio_descripcion"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_servicio">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_Servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Servicio:</h4></center>
      </div>
      <div class="modal-body">
      
      <div class="form-group">
      	<input type="hidden" id="idservicio">
      </div>
       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="servicio_descripcion_e" placeholder="Ingrese Descripcion">
         <span class="help-block" id="text_servicio_descripcion_e"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_servicio">Actualizar</button>
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