<?php  
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');

		$database = new Connection();
		$db = $database->open();
		try{
			$ido = $_POST['ido'];
            $idp = $_POST['idp'];
			$ide = $_POST['ide'];
			$objetivo = $_POST['objetivo'];
            $tema = $_POST['tema'];
            $subtema = $_POST['subtema'];
            $periodo = $_POST['periodo'];
            $fecha = $_POST['fecha_asignacion'];
			$realizado = $_POST['realizado'];
			$comentarios = $_POST['comentarios'];
			
			$sql = "UPDATE hrm_objetivos SET id_puesto='$idp', 
			id_empleado ='$ide', 
			objetivo = '$objetivo', 
			tema = '$tema', 
			subtema = '$subtema', 
			periodo ='$periodo',
			fecha_asignacion ='$fecha',
			realizado ='$realizado', 
			comentarios = '$comentarios' WHERE id_objetivo = '$ido'";
        
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