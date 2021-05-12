<?php
if(isset($_POST['name']) && isset($_POST['pass'])){
    include '../connection.php';
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    date_default_timezone_set("America/Mexico_City");
            if ($name == "Admin" && $pass == "Alohomora") { 
                session_start();
                   $_SESSION['loggedin'] = true;
                   $_SESSION['name'] = "admin";
                   $_SESSION['permiso']='admin';
                   $_SESSION['nomina'] = 'activado';
                   $_SESSION['start'] =time();
                   $_SESSION['expire'] = $_SESSION['start'] + (10 * 60);// minutos de sesion
                   $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
                   $_SESSION['estacion'] = "localhost";//localhost  || 192.168.0.10
                   $_SESSION['fecha'] = date('Y-m-d', $_SESSION['expire'] );
                    echo '1';
    }else{
try {
    $SQL ="SELECT 
    hrm_empleado.id_empleado as id_empleado, 
    hrm_usuario.id_usuario as id_usuario,
    hrm_usuario.clave as clave, 
    hrm_usuario.permiso as permiso,
    hrm_usuario.nomina as nomina,  
    hrm_empleado.nombre as nombre, 
    hrm_area.nombre as area, 
    hrm_antiguedad.jefe_directo as jefe,
    hrm_antiguedad.color as color 
    FROM
    hrm_empleado, hrm_usuario, hrm_antiguedad, hrm_area, hrm_puesto 
    WHERE 
    hrm_empleado.nombre = ? 
    AND hrm_usuario.clave = ? 
    AND hrm_usuario.id_empleado = hrm_empleado.id_empleado 
    AND hrm_puesto.id_area = hrm_area.id_area 
    AND hrm_puesto.id_puesto = hrm_antiguedad.id_puesto 
    AND hrm_empleado.id_empleado = hrm_antiguedad.id_empleado 
    limit 1";

    $database = new Connection();
    $db = $database->open();
    $nameuser = $_POST['name'];
    $password = $_POST['pass'];
    $stmt = $db->prepare($SQL);   
    $stmt->bindParam(1, $nameuser, PDO::PARAM_STR);   
    $stmt->bindParam(2, $password, PDO::PARAM_STR);         
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $result = $stmt->fetch();
    $rows = $stmt->rowCount();

    if($rows>0){
        session_start();
        $idempleado=$result['id_empleado'];
        $iduser=$result['id_usuario']; 
        $_SESSION['loggedin'] = true;
        $_SESSION['id']=$iduser; 
        $_SESSION['idempleado'] = $idempleado;
        $_SESSION['name'] = $result['nombre'];
        $_SESSION['permiso'] = $result['permiso'];
        $_SESSION['area'] = $result['area'];
        $_SESSION['jefe'] = $result['jefe'];
        $_SESSION['color'] = $result['color'];
        $_SESSION['clave'] = $result['clave'];
        $_SESSION['nomina'] = $result['nomina'];
        date_default_timezone_set('America/Mexico_City');
        $_SESSION['start'] =time();
        $_SESSION['estacion'] = "localhost";//localhost  || 192.168.0.10

        if ($_SESSION['permiso']=='admin'){
            $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);// minutos de sesion 30
            $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
            $_SESSION['fecha'] = date('Y-m-d', $_SESSION['expire'] );
       }elseif($_SESSION['permiso']=='user'){
            $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);// minutos de sesion 5
            $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
            $_SESSION['fecha'] = date('Y-m-d', $_SESSION['expire'] );
        }elseif($_SESSION['permiso']=='gerente'){
            $_SESSION['expire'] = $_SESSION['start'] + (20 * 60);// minutos de sesion 20
            $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
            $_SESSION['fecha'] = date('Y-m-d', $_SESSION['expire'] );
        }elseif($_SESSION['permiso']=='objetivos'){
            $_SESSION['expire'] = $_SESSION['start'] + (20* 60);// minutos de sesion 20
            $_SESSION['reloj'] = date('m/d/Y H:i:s', $_SESSION['expire'] );
            $_SESSION['fecha'] = date('Y-m-d', $_SESSION['expire'] );
       }else{ 
             session_destroy();
       }
        echo $rows;
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
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
}

?>