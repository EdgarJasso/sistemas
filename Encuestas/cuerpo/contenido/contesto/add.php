<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO ecsnts_contesto (id_usuario, id_validacion, id_registro, fecha) VALUES (:id_usuario, :id_validacion, :id_registro, :fecha)");
			$result= ( $stmt->execute(array(
				':id_usuario' => $_POST['id_usuario'],
				':id_validacion' => $_POST['id_validacion'],
				':id_registro' => $_POST['id_registro'],
				':fecha' => $_POST['fecha']
            )) ) ? '1' : '0';	
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
 