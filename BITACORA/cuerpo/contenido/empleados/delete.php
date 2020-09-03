<?php   
	session_start();
	if (isset($_SESSION['log']) && $_SESSION['log'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
	$db = $database->open();
	
	$_id_empleado = $_POST['id'];
//empleado
try{
	$sql = "DELETE FROM tkd_empleado WHERE id_empleado = '".$_id_empleado."'";
	// declaración if-else en la ejecución de nuestra consulta
	$empleado = ( $db->exec($sql) ) ? '1' : '0';
	echo $empleado;
}catch(PDOException $e){
	$empleado = $e->getMessage();
	echo $empleado;
}

$database->close();	
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
	echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
}
?> 