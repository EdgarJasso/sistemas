<?php  
if(isset($_POST['info_empleado']) && isset($_POST['info_area'])  && isset($_POST['info_servicio'])  && isset($_POST['comentarios'])){
    include('connection.php');
    $database = new Connection();
        $db = $database->open();
        date_default_timezone_set('America/Mexico_City');
        $time = time();
        $fecha = date("d/m/Y h:i A", $time);
		try{
            $estado = "Registrado"; 
			$stmt = $db->prepare("INSERT INTO tkd_peticiones 
            (id_empleado, area, fecha, servicio, comentarios, estado) 
            VALUES 
            (:id_empleado, :area, :fecha, :servicio, :comentarios, :estado)");
			$result= ( $stmt->execute(array(
                ':id_empleado' => $_POST['info_empleado'],
                ':area' => $_POST['info_area'],
                ':fecha' => $fecha,
				':servicio' => $_POST['info_servicio'], 
                ':comentarios' => $_POST['comentarios'], 
                ':estado' => $estado
            
            )) ) ? '1' : '0';	
	    echo $result;
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
        }
}else{
        echo "Inicia Sesion para acceder a este contenido.<br>";
        include '../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
    }
?>