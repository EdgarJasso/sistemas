<?php  
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){

include('../../../php/connection.php');
$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_empleado ( id_area, nombre, apellido_p, apellido_m) 
			VALUES (:id_area,:nombre, :ape_p, :ape_m)");
			$result= ( $stmt->execute(array(
				':id_area' => $_POST['area'],
                ':nombre' => $_POST['nombre'],
                ':ape_p'=> $_POST['apep'] ,
                ':ape_m'=> $_POST['apem'] 
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
			$result = $e->getMessage();
			echo $result;
		}
	}else{
			echo "Inicia Sesion para acceder a este contenido.<br>";
			echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
		}
?>
 