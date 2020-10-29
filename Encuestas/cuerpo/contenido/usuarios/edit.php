<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$id_area = $_POST['id_area'];
			$nombre = $_POST['nombre'];
			$clave = $_POST['clave'];
			$permiso = $_POST['permiso'];

			$sql = "UPDATE ecsnts_usuario SET 
             id_area ='$id_area',
			 nombre ='$nombre',
			 clave ='$clave',
			 permiso ='$permiso'
            WHERE id_usuario = '$id'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			
			echo $result;
            
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 