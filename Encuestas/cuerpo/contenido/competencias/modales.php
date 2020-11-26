<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<!-- View -->  
<div class="modal fade" id="Ver_com" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Competecia:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Competencia</label></td>  
                     <td width="70%" id="view_com_id"></td>  
                </tr>
                 <tr>  
                     <td width="30%"><label>Codigo</label></td>  
                     <td width="70%" id="view_com_codigo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Nombre</label></td>  
                     <td width="70%" id="view_com_nombre"></td>  
                </tr> 
                <tr>  
                     <td width="30%"><label>Descripcion</label></td>  
                     <td width="70%" id="view_com_desc"></td>  
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
 <div class="modal fade" id="Agregar_Competencias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Nueva Competencia:</h4></center>
      </div>
      <div class="modal-body">
      
       <div class="form-group">
       	<label for="">Codigo:</label>
         <input type="text" class="form-control" id="com_codigo" placeholder="Ingrese Codigo">
         <span class="help-block" id="text_com_codigo"></span>
       </div>
       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="com_nombre" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_com_nombre"></span>
       </div>
       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="com_desc" placeholder="Ingrese Descricion">
         <span class="help-block" id="text_com_desc"></span>
       </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_com">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_com" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      	<input type="hidden" id="idcom_e">
      </div>      
      <div class="form-group">
       	<label for="">Codigo:</label>
         <input type="text" class="form-control" id="com_codigo_e" placeholder="Ingrese Codigo">
         <span class="help-block" id="text_com_codigo_e"></span>
       </div>
       <div class="form-group">
       	<label for="">Nombre:</label>
         <input type="text" class="form-control" id="com_nombre_e" placeholder="Ingrese Nombre">
         <span class="help-block" id="text_com_nombre_e"></span>
       </div>
       <div class="form-group">
       	<label for="">Descripcion:</label>
         <input type="text" class="form-control" id="com_desc_e" placeholder="Ingrese Descricion">
         <span class="help-block" id="text_com_desc_e"></span>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_com">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<?php
}else{
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>