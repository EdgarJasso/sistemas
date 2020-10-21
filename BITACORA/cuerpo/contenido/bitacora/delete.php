<?php   
	session_start();
	if (isset($_SESSION['log']) && $_SESSION['log'] == true){

	include('../../../php/connection.php');
     $database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM tkd_bitacora WHERE id_bitacora = '".$_POST['id']."'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}

		$database->close();
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
	}
?> 