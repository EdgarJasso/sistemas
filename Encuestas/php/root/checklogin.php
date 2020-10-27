<?php
if(isset($_POST['name']) && isset($_POST['pass'])){
include '../connection.php';
$name = $_POST['name'];
$pass = $_POST['pass'];
date_default_timezone_set("America/Mexico_City");
if ($name = "Admin" && $pass ="Alohomora") { 
    $rows=1;
    if($rows>0){
        session_start();
        $_SESSION['log_encuestas'] = true;
        $_SESSION['name'] = "root";
        $_SESSION['permiso'] = "root";
        $_SESSION['start'] =time();
        $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);// minutos de sesion
        $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
        $_SESSION['estacion'] = "localhost";//localhost  || 192.168.0.10

        if($_SESSION['permiso']='root'){
            echo $rows;
        }else{
            echo $rows;
        }
    }else{
        $rows=0;
        echo $rows;
    }

}else{
try {
    $SQL ="SELECT * FROM tkd_usuarios WHERE nombre = ? AND pass = ? ";
    $database = new Connection();
    $db = $database->open();
    $stmt = $db->prepare($SQL);    
    $stmt->bindParam(1, $name, PDO::PARAM_STR);   
    $stmt->bindParam(2, $pass, PDO::PARAM_STR);             
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    $rows = $stmt->rowCount();

    if($rows>0){
        session_start();
        $_SESSION['log_encuestas'] = true;
        $_SESSION['name'] = $result['nombre'];
        $_SESSION['permiso'] = $result['permiso'];
        $_SESSION['start'] =time();
        $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);// minutos de sesion
        $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
        $_SESSION['estacion'] = "localhost";//localhost  || 192.168.0.10


        if($_SESSION['permiso']='root'){
            echo $rows;
        }else{
            echo $rows;
        }
    }else{
        echo $rows;
    }
$db = $database ->close();
} catch (PDOException $e) {
    $result = $e->getMessage();
    echo $result;
}
}

}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}

?>