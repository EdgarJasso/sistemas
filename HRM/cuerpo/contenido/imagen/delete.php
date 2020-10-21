<?php
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
$ruta = "../".$_GET['path'];
$id = $_GET['id']; 
//$path = "../".$_GET['path'];
echo $ruta;
chmod("../Archivos/", 0755);
	if(!unlink("".$ruta."")){
		echo "Error al eliminar";
	}else{
		echo "Eliminado con exito";
		
		include('../../../php/connection.php');
     	$database = new Connection();
		$db = $database->open();
		try{
			$sql = "DELETE FROM hrm_documentos WHERE id_documento =".$id;
			$result = ( $db->exec($sql) ) ? 'Registro Eliminado' : 'Error en el fichero';
			echo $result;
			
			$_SESSION['message'] = '<script>alertify.error('.$result.')</script>';
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
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