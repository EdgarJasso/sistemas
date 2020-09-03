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
			$tit = $_POST['tit'];
            $desc = $_POST['desc'];
            $ff = $_POST['ff'];
            $cum = $_POST['cum'];
            $por = $_POST['por'];
			$sql = "UPDATE hrm_objetivos SET id_puesto='$idp', id_empleado ='$ide', titulo = '$tit', descripcion = '$desc', f_limite = '$ff', cumplio ='$cum', porcentaje = '$por' WHERE id_objetivo = '$ido'";
        
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