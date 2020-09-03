<?php  
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){

	include('../../../php/connection.php');
	$database = new Connection();
		$db = $database->open();
		try{
			$stmt = $db->prepare("INSERT INTO tkd_bitacora ( id_peticion, encargado, fecha, estado, comentarios)
             VALUES (:id_peticion, :encargado, :fecha, :estado, :comentarios)");
			$result= ( $stmt->execute(array(
				':id_peticion'  => $_POST['idpeticion'],
                ':encargado'  => $_POST['encargado'],
                ':fecha'  => $_POST['fecha'],
                ':estado'  => $_POST['estado'],
                ':comentarios'  => $_POST['comentarios'],
			)) ) ? '1' : '0';	
			
			if($result == '1'){
				try{
					$idp = $_POST['idpeticion'];
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
					WHERE id_peticion = '$idp'";
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
 