<?php
if(isset($_POST['id_a']) && isset($_POST['id'])){
include('connection.php');
$id_a = $_POST['id_a'];
$id = $_POST['id'];
$out='
<label for="empleado">Nombre:</label>
<select class="form-control" name="'.$id.'" id="'.$id.'">
  <option value="null">Seleccione opcion</option>';
  try {
  $database = new Connection();
   $db = $database->open();
      $query="select * from tkd_empleado where id_area=".$id_a;
      foreach ($db->query($query) as $row) {
      $out.='<option value="'.$row["id_empleado"].'">'.$row["nombre"].' '.$row["apellido_p"].'</option>';
     }
  } catch (PDOException $e) {
     echo "Error: ".$e->getMessage()." !<br>"; 
   }
   $out.='</select>
<span class="help-block" id="text_help_empleado"></span>';

echo $out;
}else{
   echo "Inicia Sesion para acceder a este contenido.<br>";
   echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
}
?>