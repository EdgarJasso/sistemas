<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
    
    $periodo = $_POST['periodo'];
    $usuario = $_POST['id'];
    $database = new Connection();
		$db = $database->open();
		try{
            $sql="SELECT COUNT(*) as total FROM ecsnts_validacion, ecsnts_usuario WHERE ecsnts_validacion.Calificador = ecsnts_usuario.id_usuario AND ecsnts_validacion.periodo = '".$periodo."' AND ecsnts_validacion.Calificador = ecsnts_usuario.id_usuario AND ecsnts_validacion.Calificador =".$usuario;
            $stmt = $db->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $total = $stmt->fetch();
            if($total['total'] > 0){
                try {
                    $sql="SELECT COUNT(*) as hechas FROM ecsnts_validacion, ecsnts_usuario WHERE ecsnts_validacion.Calificador = ecsnts_usuario.id_usuario AND ecsnts_validacion.periodo = '".$periodo."' AND ecsnts_validacion.Calificador = ecsnts_usuario.id_usuario AND ecsnts_validacion.Calificador =".$usuario." AND ecsnts_validacion.Validacion = 'hecho' ";
                    $stmt = $db->prepare($sql);
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->execute();
                    $hechas = $stmt->fetch();
                    $restantes = $total['total'] - $hechas['hechas'];
                    $hecho = intval($hechas['hechas']);

                    $out = array($restantes, $hecho, 0);
                    echo json_encode($out);

                    }catch(PDOException $e){
                        $result = $e->getMessage();
                        echo $result;
                    }
            }else{
                echo 'error esto esta vacio!';
            }

	       
		}catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
    
    
    
    
    }else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		include '../../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
	}
?> 
 