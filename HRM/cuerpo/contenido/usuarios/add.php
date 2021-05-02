<?php   
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		$clave = rtrim ($_POST['clave']);
		
		try{
			$stmt = $db->prepare("INSERT INTO hrm_usuario (id_empleado, clave, permiso, nomina) VALUES (:ide,:clave, :permiso, :nomina)");
			$result= ( $stmt->execute(array(
                ':ide' => $_POST['ide'],
                ':clave' => $clave,
                ':permiso' => $_POST['permiso'],
				':nomina' => $_POST['nomina']
            )) ) ? '1' : '0';	
	    echo $result;
		} 
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?>
 