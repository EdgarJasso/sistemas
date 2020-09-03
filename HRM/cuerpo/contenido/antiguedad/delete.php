<?php   
	 session_start(); 
	 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	 include('../../../php/connection.php');
     $database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM hrm_antiguedad WHERE id_antiguedad = '".$_POST['id']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
		//cerrar conexión
		$database->close();
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }
?> 