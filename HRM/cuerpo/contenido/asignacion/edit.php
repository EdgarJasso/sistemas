<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');

	//if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$ida = $_POST['idas'];
            $ide = $_POST['ide'];
			$dias = $_POST['dias'];
			$periodo = $_POST['periodo'];
			$sql = "UPDATE hrm_asignacion SET id_empleado='$ide', dias_habilies ='$dias', periodo = '$periodo' WHERE id_asignacion = '$ida'";
        
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