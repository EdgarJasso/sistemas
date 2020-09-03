<?php  
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_servicios (descripcion) VALUES (:descripcion)");
			$result= ( $stmt->execute(array(
                ':descripcion' => $_POST['descripcion']
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
 