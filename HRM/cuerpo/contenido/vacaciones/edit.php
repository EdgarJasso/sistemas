<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');

		$database = new Connection();
		$db = $database->open();

		$id_jefe = "";
		$color = "";

		if(isset($_POST['jefe']) && isset($_POST['color'])){
			$id_jefe = $_POST['jefe'];
			$color = $_POST['color'];
		}else{
			try {
				$database = new Connection();
				 $db = $database->open();
				 $query="SELECT jefe_directo, color FROM hrm_antiguedad WHERE id_empleado =".$_POST['ide'];
				 $stmt = $db->prepare($query);        
				 $stmt->setFetchMode(PDO::FETCH_ASSOC);
				 $stmt->execute();
				 $result = $stmt->fetch();
				 $color = $result['color'];
				 $jefe = $result['jefe_directo'];
				 $_jefe = explode(" -", $jefe);
				 $id_jefe = $_jefe[0];
				} catch (PDOException $e) {
				   echo "Error: ".$e->getMessage()." !<br>"; 
				 }
		}
		try{
			$idv = $_POST['idv'];
            $ide = $_POST['ide'];
			$fecha = $_POST['fecha'];
			$dia = $_POST['dia'];
            $estado= $_POST['estado'];
			
			$sql = "UPDATE hrm_vacaciones SET 
			id_empleado='$ide', 
			id_jefe = '$id_jefe',
			fecha = '$fecha',
			dia ='$dia', 
			color = '$color', 
			estado = '$estado' 
			WHERE id_vacaciones = '$idv'";
        
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