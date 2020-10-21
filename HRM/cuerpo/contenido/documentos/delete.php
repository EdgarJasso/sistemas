<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$id = $_POST['id']; 
$ruta = "../".$_POST['path'];
chmod("../Archivos/", 0755);
	if(!unlink("".$ruta."")){
		//echo "Error al eliminar";
	}else{
		//echo "Eliminado con exito";
		
		include('../../../php/connection.php');
     	$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM hrm_documentos WHERE id_documento =".$id;
			$result = ( $db->exec($sql) ) ? '1' : '0';
			echo $result;
			
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}

		$database->close();
	}
}else {
	echo "Inicia Sesion para acceder a este contenido.<br>";
	include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
	exit;
  }
  ?>