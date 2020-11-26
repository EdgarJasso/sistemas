<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO ecsnts_respuestas (id_registro, id_pregunta, respuesta, justificacion) VALUES (:id_registro, :id_pregunta, :respuesta, :justificacion)");
			$result= ( $stmt->execute(array(
				':id_registro' => $_POST['registro'],
				':id_pregunta' => $_POST['id_pregunta'],
				':respuesta' => $_POST['respuesta'],
				':justificacion' => $_POST['justificacion']
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
 