<?php  
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_antiguedad ( id_empleado, id_puesto, activo, fecha_inicio, fecha_fin, Aumento, comentarios) 
            VALUES (:id_empleado, :id_puesto, :activo, :fecha_inicio, :fecha_fin, :Aumento, :comentarios)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['ide'],
				':id_puesto' => $_POST['idp'],
				':activo' => $_POST['activo'],
                ':fecha_inicio' => $_POST['fi'], 
                ':fecha_fin' => $_POST['ff'],
				':Aumento' => $_POST['aum'],
				':comentarios' => $_POST['com']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }
	  ?>
 