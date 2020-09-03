<?php  
	session_start();
	if (isset($_SESSION['log']) && $_SESSION['log'] == true){

	include('../../../php/connection.php');

		$database = new Connection();
		$db = $database->open();
		try{
			$idb = $_POST['idBit'];
            $idp = $_POST['idPet'];
            $encragado = $_POST['encargado'];
            $fecha = $_POST['fecha'];
            $estado = $_POST['estado'];
            $comentarios = $_POST['comentarios'];
    
			$sql = "UPDATE tkd_bitacora SET 
            id_peticion='$idp', 
            encargado='$encragado', 
            fecha='$fecha', 
            estado='$estado', 
            comentarios ='$comentarios' 
            WHERE id_bitacora = '$idb'";
        
            $result = ( $db->exec($sql) ) ? '1' : '0';

            if($result == '1'){
				try{
					$idpe = $_POST['idPet'];
					$estado_bitacora = $_POST['estado'];

					if($estado_bitacora == "Pendiente"){
						$estado_peticion = "Asignado";
					}elseif($estado_bitacora == "Realizado"){
						$estado_peticion = "Finalizado";
					}elseif($estado_bitacora == "Cancelado"){
						$estado_peticion = "Finalizado";
					}else{
						$estado_peticion = "Registrado";
					}
					
					$sql = "UPDATE tkd_peticiones SET 
					estado = '$estado_peticion'
					WHERE id_peticion = '$idpe'";
					$result = ( $db->exec($sql) ) ? '1' : '0';
				   echo $result;
					
				}catch(PDOException $e){
					$result = $e->getMessage();
					echo $result;
				}
			}


           //echo $result;
            
		}
		catch(PDOException $e){
            $result = $e->getMessage();
            echo $result;
		}
	}else{
		echo "Inicia Sesion para acceder a este contenido.<br>";
		echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/BITACORA";</script>';
	}
?> 