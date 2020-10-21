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
           $pass_nombre = substr($datosfp['nombre'],0,1);
           $pass_letra = strtoupper($pass_nombre);
           $pass_punto = ".";
           $pass_ape = $datosfp['ape_p'];
           $outpass=$pass_letra.$pass_punto.$pass_ape;
           echo $outpass;
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }
      }else {
         echo "Inicia Sesion para acceder a este contenido.<br>";
         include '../../../../dominio.php';
         echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
         exit;
       }
         ?>
         