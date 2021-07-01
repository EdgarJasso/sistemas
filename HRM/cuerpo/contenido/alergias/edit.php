<?php 
	session_start(); 
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include('../../../php/connection.php');

	$database = new Connection();
		$db = $database->open();
		try{
			$idal = $_POST['idal'];
            $ide=$_POST['ide'];
            $descripcion=$_POST['descripcion'];
            $tipo_sangre=$_POST['tipo_sangre'];
            $nombre_contacto=$_POST['nombre_contacto'];
            $tel_contacto=$_POST['tel_contacto'];
            $par_contacto=$_POST['par_contacto'];
            $nombre_contacto_ex=$_POST['nombre_contacto_ex'];
            $tel_contacto_ex=$_POST['tel_contacto_ex'];
			$par_contacto_ex=$_POST['par_contacto_ex'];

			$sql = "UPDATE hrm_alergias SET 
            id_empleado ='$ide',  
            descripcion = '$descripcion',
            tipo_sangre = '$tipo_sangre',
            nombre_contacto = '$nombre_contacto',
            tel_contacto = '$tel_contacto',
            parentesto_contacto = '$par_contacto',
            nombre_contacto_extra = '$nombre_contacto_ex',
			tel_contacto_extra = '$tel_contacto_ex',
            parentesco_contacto_extra = '$par_contacto_ex'
            
            WHERE id_alergia  = '$idal'";
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