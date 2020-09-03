<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
            $ide = $_POST['ide'];
			$clave = $_POST['clave'];
            $permiso = $_POST['permiso'];

			$sql = "UPDATE hrm_usuario SET id_empleado='$ide',clave ='$clave',  permiso = '$permiso' WHERE id_usuario = '$id'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			
			echo $result;
            
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }
?> 