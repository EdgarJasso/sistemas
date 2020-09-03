<?php
include('php/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>
      Bitacora
    </title>
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
    
    <link rel="stylesheet" href="css/style-index.css">
    <link rel="stylesheet" href="css/fonts/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <script src="package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="package/dist/sweetalert2.min.css">
   
</head>
<body>
  <div class="gradient">
<div class="conteiner-fluid" id="all">
  <div class="logo">
    <center> 
      <a href="php/index.php">
      <img src="img/new logo.png" alt="logo">
      </a>
    </center>
  </div>
  <div class="desc">
    <h3>
      Sistema de Ticket 
    </h3>
  </div>
  <div class="form">
    <form action="#" method="POST">

     <div class="form-group" id="seccion-empleado">
       <h4>Datos del Empleado</h4>

      <div class="form-group">
        <label for="area">Area:</label>
        <select  class="form-control" name="area" id="area">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_area";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["id_area"]?>"><?php echo $row["nombre"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_area"></span>
      </div>


      <div class="form-group" id="generar_empleados">
        <label for="empleado">Nombre:</label>
        <select class="form-control" name="empleado" id="empleado">
          <option value="null">Seleccione opcion</option>
        </select>
        <span class="help-block" id="text_help_empleado"></span>
      </div>

      </div>

      <div class="form-group" id="seccion-problema">
       <h4>Datos del Problema</h4>

      <div class="form-group">
        <label for="servicio">Servicio:</label>
        <select  class="form-control" name="servicio" id="servicio">
          <option value="null">Seleccione opcion</option>
          <?php 
          try {
          $database = new Connection();
           $db = $database->open();
              $query="select * from tkd_servicios";
             foreach ($db->query($query) as $row) {?>
              <option value="<?php echo $row["descripcion"]?>"><?php echo $row["descripcion"]?></option>
              <?php
             }
          } catch (PDOException $e) {
             echo "Error: ".$e->getMessage()." !<br>"; 
           }?>
        </select>
        <span class="help-block" id="text_help_servicio"></span>
      </div>


      <div class="form-group">
        <label for="comentarios">Comentarios:</label>
        <textarea  class="form-control" name="comentarios" id="comentarios" rows="5" placeholder="Opcional"></textarea>
      </div>
      </div>
      <a href="../index.html" class="btn btn-warning"> Regresar</a>
      <button class="btn btn-default" type="reset">Cancelar</button>
      <button class="btn btn-success" type="button" id="btn-send">Enviar</button>
    </form>
  </div>
</div>
</div>
</body>


<script src="js/jquery-3.3.1.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<script src="js/functiones-index.js"></script>
</html>