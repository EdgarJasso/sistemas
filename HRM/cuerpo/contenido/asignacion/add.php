<?php
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_asignacion ( id_empleado, dias_habilies) 
            VALUES (:id_empleado, :dias_habiles)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['ide'],
                ':dias_habiles' => $_POST['dias']
            
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