<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
	$db = $database->open();
	
	$_id_empleado = $_POST['id'];

	
try {
	$sql_select_path = "SELECT * FROM hrm_documentos WHERE id_empleado =".$_id_empleado;
	foreach ($db->query($sql_select_path) as $row) {
		$ruta_path = "../".$row["ruta"];
		unlink("".$ruta_path."");
		//echo "borrado contenido de carpeta".$_id_empleado;
	}
} catch (PDOException $e) {
	$path_de = $e->getMessage();
echo "Error al borrar contenido de carpeta -> ".$path_de;
}

//documentos
try{
	$sql = "DELETE FROM hrm_documentos WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$documentos = ( $db->exec($sql) ) ? '1' : '0';
	//echo $documentos;
}
catch(PDOException $e){
	$documentos = $e->getMessage();
	echo $documentos;
}
//empleado
try{
	$sql = "DELETE FROM hrm_empleado WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$empleado = ( $db->exec($sql) ) ? '1' : '0';
	//echo $empleado;
}
catch(PDOException $e){
	$empleado = $e->getMessage();
	echo $empleado;
}


if ( $documentos == 1 && $empleado == 1) {
	//echo 'Exito';
$ruta = "../Archivos/".$_id_empleado;
	rmdir("".$ruta."");
	echo '1';
} else if ( $documentos == 0) {
	echo '1';
}


	
$database->close();
}else {
	echo "Inicia Sesion para acceder a este contenido.<br>";
	echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
	exit;
  }

?> 