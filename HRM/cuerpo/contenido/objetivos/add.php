<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	//if(isset($_POST['add'])){ 
		$database = new Connection();
		$db = $database->open();
		try{
			$estado = "pendiente";
			$stmt = $db->prepare("INSERT INTO hrm_objetivos (id_puesto, id_empleado, objetivo, tema, subtema, periodo, fecha_asignacion, estado, realizado, comentarios) 
            VALUES (:id_puesto, :id_empleado, :objetivo, :tema, :subtema, :periodo, :fecha_asignacion, :estado, :realizado, :comentarios)");
			$result= ( $stmt->execute(array(
                ':id_puesto'  => $_POST['idp'],
				':id_empleado'  => $_POST['ide'],
				':objetivo'  => $_POST['objetivo'],
                ':tema'  => $_POST['tema'],
                ':subtema'  => $_POST['subtema'],
                ':periodo'  => $_POST['periodo'],
				':fecha_asignacion'  => $_POST['fecha_asignacion'],
				':estado' => $estado,
				':realizado' => $estado,
				':comentarios'  => $_POST['comentarios']
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
 