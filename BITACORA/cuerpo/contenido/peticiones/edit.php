<?php  
	session_start();
    if (isset($_SESSION['log']) && $_SESSION['log'] == true){
    include('../../../php/connection.php');
    $database = new Connection();
		$db = $database->open();
		try{
			$idp = $_POST['id'];
            $area = $_POST['area'];
            $ide = $_POST['id_empleado'];
            $fecha = $_POST['fecha'];
            $servicio = $_POST['servicio'];
            $comentarios = $_POST['comentarios'];
            $estado = $_POST['estado'];
            
			$sql = "UPDATE tkd_peticiones SET 
            id_empleado='$ide', 
            area='$area', 
            fecha='$fecha', 
            servicio='$servicio', 
            comentarios ='$comentarios',
            estado = '$estado'
            WHERE id_peticion = '$idp'";
        
            $result = ( $db->exec($sql) ) ? '1' : '0';
           echo $result;
            
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
    }else{
        echo "Inicia Sesion para acceder a este contenido.<br>";
        include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
    }
?> 