<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- Modal de  Add-->
 <div class="modal fade" id="Agregar_IMG" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Subir Imagen Perfil:</h4></center>
      </div>

      <div class="modal-body">
      <form action="filesIMG.php" method="post" enctype="multipart/form-data" id="filesFormIMG" name="filesFormIMG">
    
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
    <label for="archivo" class="control-label">
        Seleccione Archivo:
        </label>
        <div class="input-group input-file" >
            <input class="form-control" type="file"  placeholder='Seleccione Archivo...'  name="archivo" >			
        </div>
      </div>
      
        </form>
          </div>
    
          <div class="modal-footer"> 
          <button type="button" onclick="subirIMG()" class="btn btn-primary form-control" data-dismiss="modal">Cargar</button>
          </div>
      
    </div>
    </div>
  </div>
</div>

<!-- Editar --> 
<div class="modal fade" id="Editar_Docto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Archivo Aqui:</h4></center>
      </div>
      <div class="modal-body">
       <form action="documentos/edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="iddocto_act" id="iddocto_act">
        <div class="form-group">
          <label for="id_empleado">Id Empleado:</label>
          <select class="form-control" name="id_empleado_act" id="id_empleado_act" required>
            <?php 
            try {
              $database = new Connection();
              $db = $database->open();
              $query="select * from hrm_empleado";
                foreach ($db->query($query) as $row) {?>
                  <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
                }
            }catch (PDOException $e) {
              echo "Error: ".$e->getMessage()." !<br>"; 
            }?>
          </select>
        </div>
  
    <div class="form-group">
     <label for="id_empleado">Empleado:</label>
     <select class="form-control" name="empleado_act" id="empleado_act" required>
     <?php 
      try {
      $database = new Connection();
      $db = $database->open();
      $query="select * from hrm_empleado";
        foreach ($db->query($query) as $row) {?>
          <option value="<?php echo $row["nombre"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]?></option><?php
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
     <input type="text" name="titulo_act" id="titulo_act" placeholder="Titulo" class="form-control" required>
    </div>
  </div>

  <div class="form-group">
    <label for="descripcion" class="control-label">
    Descripcion:
    </label>
    <div class="">
     <textarea class="form-control" rows="3" id="descripcion_act" name="descripcion_act" placeholder="Descripcion" style="resize:none;" required></textarea>
    </div>
  </div>

<div class="form-group">
<label for="archivo" class="control-label">
    Seleccione Archivo:
    </label>
		<div class="input-group input-file" >
    		<input type="file" class="form-control" placeholder='Seleccione Archivo...'  name="archivo_act" id="archivo_act"/>			
            <span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button" disabled>
                    <span class="icon-folder-upload"></span>
                </button>
    		</span>
		</div>
	</div>
  
    <button type="submit" name="" class="btn btn-primary" style="float: right;"><span class="icon-floppy-disk"></span> Actualizar
    </form>
      </div>

      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- Eliminar -->  
<div class="modal fade" id="Eliminar_Docto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Eliminar Archivo:</h4></center>
      </div>
      <div class="modal-body">
      <form action="documentos/delete.php" method="get">
      <div class="form-group">
      	<input type="hidden" id="iddocto" name="iddocto">
        <input type="hidden" id="path" name="path">
      </div>
       <div class="form-group">
       	<center><h3>
         <b>¿Esta seguro de eliminar el archivo de  
          <p id="titulo_delete"></p></b>
         </h3></center>
       </div>
       
      <button type="submit" name="" class="btn btn-danger" style="float: right;"><span class="icon-cross"></span> Eliminar
    </form>
      </div>
      <div class="modal-footer">
        
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