<?php   
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
    	$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM hrm_direccion WHERE id_direccion = '".$_POST['id']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
		//cerrar conexión
		$database->close();
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?> 