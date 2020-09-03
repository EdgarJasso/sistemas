<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
        try {
         $id = $_POST['id'];
          $databasePA = new Connection();
          $dbPA = $databasePA->open();
           $queryfp="select * from hrm_empleado where id_empleado=".$id;
           $genpass = $dbPA->prepare($queryfp);
           $genpass->setFetchMode(PDO::FETCH_ASSOC);
           $genpass->execute();
           $datosfp = $genpass->fetch();
           //$rest = substr("abcdef", -3, 1);
           echo $datosfp['nombre'];
           //$string = preg_replace("/[\s]/", "-", $outpass);
           //echo $string;
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }
      }else {
         echo "Inicia Sesion para acceder a este contenido.<br>";
         echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
         exit;
       }?>
         