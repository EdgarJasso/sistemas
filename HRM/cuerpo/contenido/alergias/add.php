<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO hrm_alergias ( id_empleado, descripcion, tipo_sangre, tel_contacto) 
            VALUES (:id_empleado, :descripcion, :tipo_sangre, :tel_contacto)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['id_empleado'],
				':descripcion' => $_POST['descripcion'],
				':tipo_sangre' => $_POST['tipo_sangre'],
				':tel_contacto' => $_POST['tel_contacto']
            
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
 