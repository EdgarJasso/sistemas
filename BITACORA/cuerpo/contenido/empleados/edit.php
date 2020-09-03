<?php 
	session_start();
	if (isset($_SESSION['log']) && $_SESSION['log'] == true){
	include('../../../php/connection.php');

	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
			$id_a=$_POST['id_area'];
            $nombre=$_POST['nombre'];
            $ap=$_POST['ap'];
            $am=$_POST['am'];

			$sql = "UPDATE tkd_empleado SET 
			id_area ='$id_a',
            nombre ='$nombre',  
            apellido_p = '$ap',
            apellido_m = '$am'
            
            WHERE id_empleado = '$id'";
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
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
	}

?> 