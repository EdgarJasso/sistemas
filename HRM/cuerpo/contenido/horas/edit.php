<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$idh = $_POST['idh'];
            $ide = $_POST['ide'];
			$fecha = $_POST['fecha'];
			$horas = $_POST['horas'];
			$sql = "UPDATE hrm_horas SET 
			id_empleado='$ide', 
			fecha ='$fecha', 
			horas = '$horas'
			WHERE id_hora = '$idh'";
        
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