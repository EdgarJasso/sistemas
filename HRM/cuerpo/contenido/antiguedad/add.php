<?php  
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_antiguedad ( id_empleado, id_puesto, jefe_directo, activo, fecha_inicio, fecha_fin, comentarios, color) 
            VALUES (:id_empleado, :id_puesto, :jefe_directo, :activo, :fecha_inicio, :fecha_fin, :comentarios, :color)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['ide'],
				':id_puesto' => $_POST['idp'],
				':jefe_directo' => $_POST['jefe'],
				':activo' => $_POST['activo'],
                ':fecha_inicio' => $_POST['fi'], 
                ':fecha_fin' => $_POST['ff'],
				':comentarios' => $_POST['com'],
				':color' => $_POST['color']
            
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
 