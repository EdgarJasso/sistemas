<?php  
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
        
        $id = $_SESSION['idempleado'];
        $old = $_POST['old'];
        $nueva = $_POST['nueva']; 
        if( $_SESSION['clave'] == $old){
            $database = new Connection();
            $db = $database->open();
            try{
                $sql = "UPDATE hrm_usuario SET clave = '$nueva' WHERE id_empleado = '$id'";
                $result = ( $db->exec($sql) ) ? '1' : '0';
               echo $result;
                
            }catch(PDOException $e){
                $result = $e->getMessage();
                echo $result;
            }

        }else{
            echo 'La clave es incorrecta';
        }
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }
?> 