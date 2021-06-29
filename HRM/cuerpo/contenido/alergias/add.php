<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		var_dump($_POST);die();
			try{
			$stmt = $db->prepare("INSERT INTO hrm_alergias (id_empleado, descripcion, tipo_sangre, nombre_contacto, tel_contacto, parentesto_contacto, nombre_contacto_extra, tel_contacto_extra, parentesto_contacto_extra) VALUES (:id_empleado, :descripcion, :tipo_sangre, :nombre_contacto, :tel_contacto, :parentesto_contacto, :nombre_contacto_extra, :tel_contacto_extra, :parentesto_contacto_extra)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['id_empleado'],
				':descripcion' => $_POST['descripcion'],
				':tipo_sangre' => $_POST['tipo_sangre'],
				':nombre_contacto' => $_POST['nombre_contacto'],
				':tel_contacto' => $_POST['tel_contacto'],
				':parentesto_contacto' => $_POST['par_contacto'],
				':nombre_contacto_extra' => $_POST['nombre_contacto_ex'],
				':tel_contacto_extra' => $_POST['tel_contacto_ex'],
				':parentesco_contacto_extra' => $_POST['par_contacto_ex']
            )) ) ? '1' : '0';	
			echo 'hola';
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
 