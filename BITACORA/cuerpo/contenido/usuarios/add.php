<?php   
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_usuarios (nombre, pass, permiso) VALUES (:ide,:clave, :permiso)");
			$result= ( $stmt->execute(array(
                ':ide' => $_POST['ide'],
                ':clave' => $_POST['clave'] ,
                ':permiso' => $_POST['permiso']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
	}
?>
 