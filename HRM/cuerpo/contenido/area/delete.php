<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
     
	//if(isset($_GET['id'])){
		$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM hrm_area WHERE id_area = '".$_POST['id']."'";
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
		//cerrar conexión
		$database->close();
		else {
			echo "Inicia Sesion para acceder a este contenido.<br>";
			echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
			exit;
		  }
		  ?>