<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_puesto ( id_area, nombre, descripcion, sueldo, comentarios) VALUES (:id_area, :nombre, :descripcion, :sueldo, :comentarios)");
			$result= ( $stmt->execute(array(
                ':id_area' => $_POST['id'],
                ':nombre' => $_POST['nombre'],
                ':descripcion' => $_POST['descc'],
				':sueldo' => $_POST['sueldo'], 
				':comentarios' => $_POST['comentaarios']
            
            )) ) ? '1' : '0';	
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
 