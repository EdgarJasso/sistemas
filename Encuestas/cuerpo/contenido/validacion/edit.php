<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$Calificador = $_POST['Calificador'];
			$Calificado = $_POST['Calificado'];
			$Nombre = $_POST['Nombre'];
			$Validacion = $_POST['Validacion'];
			$Area = $_POST['Area'];
			$Categoria = $_POST['Categoria'];
			$tipo  = $_POST['tipo'];
			$periodo  = $_POST['periodo'];

			$sql = "UPDATE ecsnts_validacion SET 
             Calificador ='$Calificador',
			 Calificado ='$Calificado',
			 Nombre ='$Nombre',
			 Validacion  ='$Validacion',
			 Area ='$Area',
			 Categoria ='$Categoria',
			 tipo ='$tipo'
            WHERE Id_validacion = '$id'";
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