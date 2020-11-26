<?php 
	session_start(); 
	if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
	include('../../../php/connection.php');
	$database = new Connection();
        $db = $database->open();
        //registro inicio
            $registro;
            $validacion = $_POST['validacion'];
            try {
                $database = new Connection();
                $db = $database->open();
                $query = 'SELECT id_registro FROM ecsnts_respuestas ORDER by id_registro DESC LIMIT 1';
                $stmt = $db->prepare($query);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $datos = $stmt->fetch();
                $registro = $datos['id_registro'];
                $registro++;
                $db = null;                 
            } catch (PDOException $e) {
                echo "Error: ".$e->getMessage()." !<br>";
            }
                date_default_timezone_set('America/Mexico_City');
                $fecha_actual = date("d-m-Y h:i a");

                try{
                    $database = new Connection();
                    $db = $database->open();
                    $stmt = $db->prepare("INSERT INTO ecsnts_contesto (id_usuario, id_validacion, id_registro, fecha) VALUES (:id_usuario, :id_validacion, :id_registro, :fecha)");
                    $result= ( $stmt->execute(array(
                        ':id_usuario' => $_SESSION['id'],
                        ':id_validacion' => $validacion,
                        ':id_registro' => $registro,
                        ':fecha' => $fecha_actual
                    )) ) ? '1' : '0';	
                    if ($result == '1') {
                        //registro fin
                        //tronco inicio
                        try {
                            $database = new Connection();
                            $db = $database->open();
                            $sql="SELECT * FROM ecsnts_pregunta WHERE id_area = 1 AND categoria ='Tronco Común Seguridad'";
                            $stmt_general = $db->prepare($sql);
                            $stmt_general->setFetchMode(PDO::FETCH_ASSOC);
                            $stmt_general->execute();
                            $row_general = $stmt_general->rowCount();
                            while ($preguntas_general =  $datos_general = $stmt_general->fetch()) {
                                $general[] = $preguntas_general;
                            }
                            $db = null;                 
                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage()." !<br>";
                        }
                        //tronco fin
                        //categoria inicio
                        try {
                            $cat = $_POST['cat'];
                            $database = new Connection();
                            $db = $database->open();
                            $SQL="SELECT * FROM ecsnts_pregunta, ecsnts_categoria, ecsnts_area WHERE ecsnts_area.id_area = ecsnts_pregunta.id_area AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_categoria.Id_categoria ='".$cat."'";
                            $stmt_categoria = $db->prepare($SQL);
                            $stmt_categoria->setFetchMode(PDO::FETCH_ASSOC);
                            $stmt_categoria->execute();
                            $row_categoria = $stmt_categoria->rowCount();
                            while ($preguntas_categoria =  $datos_categoria = $stmt_categoria->fetch()) {
                                $categoria[] = $preguntas_categoria;
                            }
                            //var_dump($categoria); echo '<br>';
                            $db = null;                 
                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage()." !<br>";
                        }
                        //categoria fin
                        //metodo para inertar todo el post
                        foreach($general as $id_p){
                            $r []  = $id_p["id_pregunta"];
                        }
                        foreach($categoria as $id_pa){
                            $r []  = $id_pa["id_pregunta"];
                        }
                        unset($_POST['cat']);
                        unset($_POST['validacion']);
                        
                        $i=0; $agregar=false;
                        $sql = 'insert into ecsnts_respuestas (id_respuesta, id_registro, id_pregunta, respuesta, justificacion) values';
                        foreach($_POST as $nombre_campo => $valor){ 
                            $asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
                            
                            if($valor!='cat'&&$valor!=''){
                            if($agregar==true){
                                //justificacion
                                $sql.=",'".$valor."'),";
                                $agregar=false;
                            }else{
                                //respuesta
                                $sql.="(NULL,".$registro.",".$r[$i].",'$valor'";
                                $agregar=true;
                                $i++;
                            }
                        
                            }else{echo $i;}
                            eval($asignacion);
                            }
                            $ultimo=(strlen($sql)-1); 
                            $SQL=substr($sql, 0,$ultimo);$SQL.=";";

                        try{
                            $database = new Connection();
                            $db = $database->open();
                            $stmt = $db->prepare($SQL);
                            $result= ($stmt->execute()) ? '1' : '0';
                            $lr =  $db->lastInsertId();

                            if ($result == '1') {
                                $database = new Connection();
                                $db = $database->open();
                                    try{
                                        $sql = "UPDATE ecsnts_validacion SET 
                                        Validacion  ='hecho'
                                        WHERE Id_validacion = '$validacion'";
                                        // declaración if-else en la ejecución de nuestra consulta
                                        $result = ( $db->exec($sql) ) ? '1' : '0';
                                        if ($result == '1') {
                                            echo $registro;
                                        }else{
                                            echo $result;
                                        }
                                    

                                    }catch(PDOException $e){
                                        $result = $e->getMessage();
                                        echo $result;
                                    }
                            }else{ echo $result;}
                        }catch(PDOException $e){
                            $result = $e->getMessage();
                            echo $result;
                        }

                }else{
                    echo $result;
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
 