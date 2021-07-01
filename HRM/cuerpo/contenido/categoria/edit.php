<?php 
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');

		$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
            $ida=$_POST['ida'];
            $nombre=$_POST['nombre'];
            $desc=$_POST['desc'];
			$comentarios=$_POST['comentarios'];

			$sql = "UPDATE hrm_puesto SET 
            id_area ='$ida',  
            nombre = '$nombre',
            descripcion = '$desc',
			comentarios = '$comentarios'
            
            WHERE id_puesto = '$id'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			
			echo $result;
            
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?> 