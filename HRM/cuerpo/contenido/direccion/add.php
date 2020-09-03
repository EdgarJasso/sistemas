<?php   
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_direccion (id_empleado, pais, estado, municipio, colonia, calle, numero, entre_calles) 
            VALUES (:id_empleado, :pais, :estado, :municipio, :colonia, :calle, :numero, :entre_calles)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['idempleado'],
                ':pais' => $_POST['pais'],
                ':estado' => $_POST['estado'], 
                ':municipio' => $_POST['municipio'],
                ':colonia'=> $_POST['colonia'],
                ':calle' => $_POST['calle'],
                ':numero' => $_POST['numero'],
                ':entre_calles' => $_POST['entre']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }
?>
 