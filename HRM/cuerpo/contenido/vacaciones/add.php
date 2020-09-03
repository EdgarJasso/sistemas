<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_vacaciones ( id_empleado, dia, color, estado) 
            VALUES (:id_empleado, :dia, :color,  :estado)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['ide'],
				':dia' => $_POST['dia'],
				':color' => $_POST['color'],
                ':estado' => $_POST['estado']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }	
?>
 