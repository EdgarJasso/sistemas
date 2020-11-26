<?php  
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_peticiones ( id_empleado, area, fecha, servicio, comentarios, estado)VALUES (:id_empleado, :area, :fecha, :servicio, :comentarios, :estado)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['info_empleado'],
                ':area' => $_POST['info_area'],
                ':fecha' => $_POST['fecha'],
				':servicio' => $_POST['info_servicio'], 
				':comentarios' => $_POST['comentarios'],
				':estado' => $_POST['estado']
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
	}
?>
 