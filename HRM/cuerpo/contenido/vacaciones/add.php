<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
		$id_jefe = "";
		$fecha = date("d/m/Y");
		$color = "";
		try {
			$database = new Connection();
			 $db = $database->open();
			 $query="SELECT jefe_directo, color FROM hrm_antiguedad WHERE id_empleado =".$_POST['ide'];
			 $stmt = $db->prepare($query);        
    		 $stmt->setFetchMode(PDO::FETCH_ASSOC);
    		 $stmt->execute();
    		 $result = $stmt->fetch();
			 $color = $result['color'];
			 $jefe = $result['jefe_directo'];
			 $id_jefe = explode(" -", $jefe);

			} catch (PDOException $e) {
			   echo "Error: ".$e->getMessage()." !<br>"; 
			 }
		try{
			$stmt = $db->prepare("INSERT INTO hrm_vacaciones ( id_empleado,id_jefe, fecha, dia, color, estado) 
            VALUES (:id_empleado, :id_jefe, :fecha, :dia, :color,  :estado)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['ide'],
				':id_jefe' => $id_jefe[0],
				':fecha' => $fecha,
				':dia' => $_POST['dia'],
				':color' => $color,
                ':estado' => $_POST['estado']
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }	
?>
 