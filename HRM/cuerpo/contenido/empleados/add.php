<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	//if(isset($_POST['add'])){ 
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_empleado ( nombre, ape_p, ape_m, fecha_nac, curp, rfc, nss, celular) 
			VALUES (:nombre, :ape_p, :ape_m, :fecha_nac, :curp, :rfc, :nss, :celular)");
			$result= ( $stmt->execute(array(
                ':nombre' => $_POST['nombre'],
                ':ape_p'=> $_POST['apep'] ,
                ':ape_m'=> $_POST['apem'] ,
                ':fecha_nac'=> $_POST['fn'],
                ':curp'=> $_POST['curp'],
                ':rfc'=> $_POST['rfc'] ,
                ':nss'=> $_POST['nss'] ,
                ':celular'=> $_POST['cel']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
		exit;
	  }	
?>
 