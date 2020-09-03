<?php  
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include_once('../../../php/connection.php');

	//if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
            $ido = $_POST['ido'];
            $estado = "revisado";
			$sql = "UPDATE hrm_objetivos SET estado='$estado' WHERE id_objetivo = '$ido'";
        
            $result = ( $db->exec($sql) ) ? '1' : '0';
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