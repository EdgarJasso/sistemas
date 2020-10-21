<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
	//if(isset($_POST['add'])){ 
		$database = new Connection();
		$db = $database->open();
		try{
			$estado = "pendiente";
			$stmt = $db->prepare("INSERT INTO hrm_objetivos (id_puesto, id_empleado, titulo, descripcion, f_limite, cumplio, porcentaje, estado) 
            VALUES (:id_puesto, :id_empleado, :titulo, :descripcion, :f_limite, :cumplio, :porcentaje, :estado)");
			$result= ( $stmt->execute(array(
                ':id_puesto'  => $_POST['idp'],
				':id_empleado'  => $_POST['ide'],
				':titulo'  => $_POST['tit'],
                ':descripcion'  => $_POST['desc'],
                ':f_limite'  => $_POST['fecha'],
                ':cumplio'  => $_POST['cumplio'],
				':porcentaje'  => $_POST['porce'],
				':estado' => $estado
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
 