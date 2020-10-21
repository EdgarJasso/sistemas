<?php  
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$ida = $_POST['ida'];
            $ide = $_POST['ide'];
			$idp = $_POST['idp'];
			$act = $_POST['activo'];
            $fi = $_POST['fi'];
            $ff = $_POST['ff'];
			$aum = $_POST['aum'];
			$com = $_POST['com'];
			$sql = "UPDATE hrm_antiguedad SET id_empleado='$ide', id_puesto ='$idp', activo= '$act', fecha_inicio = '$fi', fecha_fin = '$ff', aumento ='$aum' , comentarios ='$com' WHERE id_antiguedad = '$ida'";
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