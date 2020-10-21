<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	//if(isset($_POST['add'])){ 
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_area ( nombre) VALUES (:nombre)");
			$result= ( $stmt->execute(array(
                ':nombre' => $_POST['nombre']
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?>
 