<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	//if(isset($_POST['add'])){ 
		$database = new Connection();
		$db = $database->open();
        
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('m-d-Y h:i:s a', time()); 
		try{
			$stmt = $db->prepare("INSERT INTO hrm_bajas (id_empleado, nombre_completo, fecha) VALUES (:id_empleado, :nombre_completo, :fecha)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['id_empleado'],
                ':nombre_completo' => $_POST['nombre_completo'],
                ':fecha' => $DateAndTime,
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
 