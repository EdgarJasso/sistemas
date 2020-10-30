<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO ecsnts_validacion(Calificador, Calificado, Nombre, Validacion, Area, Categoria, tipo, periodo)
													    VALUES (:Calificador, :Calificado, :Nombre, :Validacion, :Area, :Categoria, :tipo, :periodo)");
			$result= ( $stmt->execute(array(
				':Calificador' => $_POST['Calificador'],
				':Calificado' => $_POST['Calificado'],
				':Nombre' => $_POST['Nombre'],
				':Validacion' => $_POST['Validacion'],
				':Area' => $_POST['Area'],
				':Categoria' => $_POST['Categoria'],
				':tipo' => $_POST['tipo'],
				':periodo' => $_POST['periodo']
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 
 