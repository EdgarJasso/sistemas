<?php   
	session_start();
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
     $database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM ecsnts_competencias WHERE id_competencia = '".$_POST['id']."'";
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}

		//cerrar conexión
		$database->close();
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 