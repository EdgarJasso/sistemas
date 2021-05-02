<?php   
	session_start(); 
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
	$database = new Connection();
	$db = $database->open();
	
	$_id_empleado = $_POST['id'];
	$nombre_completo = "";
	$documentos = "";

	try {
		$SQL ="SELECT * from hrm_empleado WHERE id_empleado =".$_id_empleado;
		$database = new Connection();
		$db = $database->open();
		$stmt = $db->prepare($SQL);         
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$stmt->execute();
		$result = $stmt->fetch();
		$nombre_completo = $result['nombre'] ." ".$result['ape_p']." ".$result['ape_m'];

		$db = $database ->close();
}catch (PDOException $e) {
    $result = $e->getMessage();
    echo $result;
}
date_default_timezone_set('America/Mexico_City');
	$DateAndTime = date('m-d-Y h:i:s a', time()); 
		try{
			$database = new Connection();
    		$db = $database->open();
			$stmt = $db->prepare("INSERT INTO hrm_bajas (id_empleado, nombre_completo, fecha) VALUES (:id_empleado, :nombre_completo, :fecha)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_id_empleado,
                ':nombre_completo' => $nombre_completo,
                ':fecha' => $DateAndTime,
            )) ) ? '1' : '0';	
	    //echo $result;
		//echo "error al anadir baja";
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}

try {
	$sql_select_path = "SELECT * FROM hrm_documentos WHERE id_empleado =".$_id_empleado;
	$database = new Connection();
    $db = $database->open();
	$stmt = $db->prepare($sql_select_path);   
	$stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $rows = $stmt->rowCount();
	if($rows >= 1){
	foreach ($db->query($sql_select_path) as $row) {
		$ruta_path = "../".$row["ruta"];
		unlink("".$ruta_path."");
		//echo "borrado contenido de carpeta".$_id_empleado;
	 }
    }else{
		$documentos = '1';
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
	include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
	exit;
  }

?> 