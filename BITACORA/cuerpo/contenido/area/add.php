<?php  
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_area ( nombre) VALUES (:nombre)");
			$result= ( $stmt->execute(array(
                ':nombre' => $_POST['nombre']
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
?>
 