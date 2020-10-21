<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- Modal de  Add-->
<div class="modal fade" id="Agregar_Doctonew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Subir Documento:</h4></center>
      </div>

      <div class="modal-body">
      <form action="files.php" method="post" enctype="multipart/form-data" id="filesForm" name="filesForm">
    
<div class="form-group">
     <label for="id_empleado">Id Empleado:</label>
     <select class="form-control" name="id_empleadoND" id="id_empleadoND" required>
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
 </div>

  <div class="form-group">
    <label for="titulo" class="control-label">
    Titulo:
    </label>
    <div class="">
     <input type="text" name="titulo" id="titulo" placeholder="Titulo" class="form-control" required>
    </div>
  </div>

  <div class="form-group">
    <label for="descripcion" class="control-label">
    Descripcion:
    </label>
    <div class="">
     <textarea class="form-control" rows="3" id="descripcion" name="descripcion" placeholder="Descripcion" style="resize:none;" required></textarea>
    </div>
  </div>

<div class="form-group">
<label for="archivo" class="control-label">
    Seleccione Archivo:
    </label>
		<div class="input-group input-file" >
    		<input class="form-control" type="file"  placeholder='Seleccione Archivo...'  name="archivo" id="archivo_doctos">			
		</div>
  </div>
   
  <div class="progress mt-3 bg-secondary">
      <div id="barra" class="progress-bar bg-success"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
         0%
      </div>
  </div>
    
      </div>

      <div class="modal-footer"> 
      <button type="button" onclick="subir()" class="btn btn-primary">Cargar</button>
      </form>
      </div>
      
    </div>
    </div>
  </div>
  <?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
}
?>
