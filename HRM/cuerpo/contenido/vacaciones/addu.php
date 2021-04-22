<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
        $db = $database->open();
        $_ide = $_SESSION['idempleado'];
        $_estado = "Pendiente";
		$id_jefe = explode(" -", $_SESSION['jefe']);
		$fecha = date("d/m/Y");
		try{
			$stmt = $db->prepare("INSERT INTO hrm_vacaciones ( id_empleado,id_jefe, fecha, dia, color, estado) 
            VALUES (:id_empleado, :id_jefe, :fecha, :dia, :color,  :estado)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_ide,
				':id_jefe' => $id_jefe[0],
				':fecha' => $fecha,
				':dia' => $_POST['dia'],
				':color' => $_SESSION['color'],
                ':estado' => $_estado
            
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
 