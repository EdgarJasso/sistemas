<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include_once('../../../php/connection.php');
$output = " ";
      try {
        $database = new Connection();
         $db = $database->open();
          $query="select * from hrm_usuario where id_usuario =".$_POST["id"];
          $output .='<div class="table-responsive">
           <table class="table table-bordered">';
           foreach ($db->query($query) as $row) {
            $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["clave"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["permiso"].'</td>  
                </tr>  
           ';
            }
            $output .= '  
           </table>  
         </div>';  
        echo $output;
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage()." !<br>";
        }
        }else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
}
?>