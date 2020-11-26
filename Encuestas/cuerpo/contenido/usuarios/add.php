<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO ecsnts_usuario(id_area, nombre, clave, permiso) VALUES (:id_area, :nombre, :clave, :permiso)");
			$result= ( $stmt->execute(array(
				':id_area' => $_POST['id_area'],
				':nombre' => $_POST['nombre'],
				':clave' => $_POST['clave'],
				':permiso' => $_POST['permiso']
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 
 