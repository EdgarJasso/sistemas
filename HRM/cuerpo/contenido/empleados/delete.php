<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
	$db = $database->open();
	
	$_id_empleado = $_POST['id'];

	//antiguedad
	try{
		$sql = "DELETE FROM hrm_antiguedad WHERE id_empleado = '".$_id_empleado."'";
		// declaración if-else en la ejecución de nuestra consulta
		$antiguedad = ( $db->exec($sql) ) ? '1' : '0';
		//echo $antiguedad;
	}
	catch(PDOException $e){
		$antiguedad = $e->getMessage();
		echo $antiguedad;
	}
	//asignacion
	try{
		$sql = "DELETE FROM hrm_asignacion WHERE id_empleado = '".$_id_empleado."'";
		// declaración if-else en la ejecución de nuestra consulta
		$asignacion = ( $db->exec($sql) ) ? '1' : '0';
		//echo $asignacion;
	}
	catch(PDOException $e){
		$asignacion = $e->getMessage();
		echo $asignacion;
	}
//direccion
try{
	$sql = "DELETE FROM hrm_direccion WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$direccion = ( $db->exec($sql) ) ? '1' : '0';
	//echo $direccion;
}
catch(PDOException $e){
	$direccion = $e->getMessage();
	echo $direccion;
}

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
//objetivos
try{
	$sql = "DELETE FROM hrm_objetivos WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$objetivos = ( $db->exec($sql) ) ? '1' : '0';
	//echo $objetivos;
}
catch(PDOException $e){
	$objetivos = $e->getMessage();
	echo $objetivos;
}
//usuario
try{
	$sql = "DELETE FROM hrm_usuario WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$usuario = ( $db->exec($sql) ) ? '1' : '0';
	//echo $usuario;
}
catch(PDOException $e){
	$usuario = $e->getMessage();
	echo $usuario;
}
//vacaciones
try{
	$sql = "DELETE FROM hrm_vacaciones WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$vacaciones = ( $db->exec($sql) ) ? '1' : '0';
	//echo $vacaciones;
}
catch(PDOException $e){
	$vacaciones = $e->getMessage();
	echo $vacaciones;
}



if ( $documentos == 1 && $empleado == 1) {
	//echo 'Exito';
$ruta = "../Archivos/".$_id_empleado;
	rmdir("".$ruta."");
	echo '1';
} else {
	echo 'Error en:'.$antiguedad;
	echo 'Error en:'.$asignacion;
	echo 'Error en:'.$direccion;

	echo 'Error en:'.$documentos;
	echo 'Error en:'.$empleado;

	echo 'Error en:'.$objetivos;
	echo 'Error en:'.$usuario;
	echo 'Error en:'.$vacaciones;
}


	
$database->close();
}else {
	echo "Inicia Sesion para acceder a este contenido.<br>";
	echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
	exit;
  }

?> 