<?php  
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include('../../../php/connection.php');
		$database = new Connection();
		$db = $database->open();
        $objetivo = $_GET['id'];
        $query = "SELECT hrm_objetivos.id_objetivo as id_objetivo, hrm_objetivos.id_puesto as id_puesto, hrm_puesto.nombre as nombre_puesto, hrm_objetivos.id_empleado as id_empleado, hrm_empleado.nombre as nombre_empleado, hrm_objetivos.objetivo as objetivo, hrm_objetivos.tema as tema, hrm_objetivos.subtema as subtema, hrm_objetivos.periodo as periodo, hrm_objetivos.fecha_asignacion as fecha, hrm_objetivos.estado as estado, hrm_objetivos.realizado as realizado, hrm_objetivos.comentarios as comentarios FROM hrm_objetivos, hrm_puesto, hrm_empleado WHERE hrm_objetivos.id_objetivo = $objetivo AND hrm_objetivos.id_puesto = hrm_puesto.id_puesto AND hrm_objetivos.id_empleado = hrm_empleado.id_empleado";  
        $statement=$db->prepare($query);
        $statement->execute();
                    
        if (!$statement){
            echo 'Error al ejecutar la consulta';
        }else{
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $json = json_encode($results, JSON_UNESCAPED_UNICODE);
        echo $json;
            }                        
	}else {
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
		exit;
	  }	
?>
 