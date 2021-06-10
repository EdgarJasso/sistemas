<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$idal= $_POST['idal'];
            $ide = $_POST['ide'];
			$descripcion = $_POST['descripcion'];
			$tipo_sangre = $_POST['tipo_sangre'];
			$nombre_contacto = $_POST['nombre_contacto'];
			$tel_contacto = $_POST['tel_contacto'];
			$sql = "UPDATE hrm_alergias SET 
			id_empleado='$ide', 
			descripcion ='$descripcion', 
			tipo_sangre ='$tipo_sangre', 
			nombre_contacto ='$nombre_contacto', 
			tel_contacto = '$tel_contacto'
			WHERE id_alergia = '$idal'";
        
            $result = ( $db->exec($sql) ) ? '1' : '0';
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