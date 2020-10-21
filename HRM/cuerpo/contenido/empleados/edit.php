<?php 
	session_start(); 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../../php/connection.php');

	$database = new Connection();
		$db = $database->open();
		try{
			$id = $_POST['id'];
            $nombre=$_POST['nombre'];
            $ap=$_POST['ap'];
            $am=$_POST['am'];
            $fn=$_POST['fn'];
            $curp=$_POST['curp'];
            $rfc=$_POST['rfc'];
            $nss=$_POST['nss'];
            $cel=$_POST['cel'];

			$sql = "UPDATE hrm_empleado SET 
            nombre ='$nombre',  
            ape_p = '$ap',
            ape_m = '$am',
            fecha_nac = '$fn',
            curp = '$curp',
            rfc = '$rfc',
            nss = '$nss',
            celular = '$cel'
            
            WHERE id_empleado = '$id'";
			// declaración if-else en la ejecución de nuestra consulta
			$result = ( $db->exec($sql) ) ? '1' : '0';
			
			echo $result;
            
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}
    }else {
        echo "Inicia Sesion para acceder a este contenido.<br>";
        include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
        exit;
      }
	

?> 