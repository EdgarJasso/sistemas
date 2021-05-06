<?php
include_once('../../php/connection.php');
$selectArea = "";
try {
   $database = new Connection();
    $db = $database->open();
     $query="select * from hrm_area";
     $selectArea = "<select class='select_area'><option value='0'>Todas</option>";
      foreach ($db->query($query) as $regristro) {
        $selectArea .="<option value=/'".$regristro['id_area']."/'>".$regristro['nombre']."</option>";
      }
      $selectArea .="</select>";
      echo $selectArea;
      $db = null;                 
      } catch (PDOException $e) {
         echo "Error: ".$e->getMessage()." !<br>";
      }
?>
$(".fc-left").append('<select class="select_are"><option value="0">Todas</option><option value="1">Administracion</option><option value="2">Direccion</option><option value="3">Marketing</option><option value="4">Ventas</option><option value="5">Operaciones</option><option value="6">Seguridad</option></select>');
 