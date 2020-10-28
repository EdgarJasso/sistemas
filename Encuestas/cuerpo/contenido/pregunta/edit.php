<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$competencia = $_POST['competencia'];
			$id_area = $_POST['id_area'];
			$categoria = $_POST['categoria'];
			$descripcion = $_POST['descripcion'];

			$sql = "UPDATE ecsnts_pregunta SET 
             competencia ='$competencia',
			 id_area ='$id_area',
			 categoria ='$categoria',
			 descripcion ='$descripcion'
            WHERE id_pregunta = '$id'";
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