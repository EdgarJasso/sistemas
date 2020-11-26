<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$id_usuario = $_POST['id_usuario'];
			$id_validacion = $_POST['id_validacion'];
			$id_registro = $_POST['id_registro'];
			$fecha = $_POST['fecha'];

			$sql = "UPDATE ecsnts_contesto SET 
             id_usuario ='$id_usurio',
			 id_validacion ='$id_validacion',
			 id_registro ='$id_registro',
			 fecha ='$fecha'
            WHERE id_campo = '$id'";
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
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 