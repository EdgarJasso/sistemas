<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$registro = $_POST['resgistro'];
			$id_pregunta = $_POST['id_pregunta'];
			$respuesta = $_POST['respuesta'];
			$justificacion = $_POST['justificacion'];

			$sql = "UPDATE ecsnts_respuestas SET 
             id_registro ='$registro',
			 id_pregunta ='$id_pregunta',
			 respuesta ='$respuesta',
			 justificacion ='$justificacion'
            WHERE id_respuesta = '$id'";
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