<?php  
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
            $ide = $_POST['ide'];
			$pais = $_POST['pais'];
            $estado = $_POST['estado'];
            $municipio= $_POST['municipio'];
            $colonia= $_POST['colonia'];
            $calle= $_POST['calle'];
            $numero= $_POST['numero'];
            $entre= $_POST['entre'];

			$sql = "UPDATE hrm_direccion SET id_empleado='$ide',pais ='$pais',  estado = '$estado', municipio = '$municipio', colonia ='$colonia', calle ='$calle', numero =' $numero', entre_calles='$entre' WHERE id_direccion = '$id'";
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