<?php 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ) {
  try {
       $database_cal = new Connection();
            $db_c = $database_cal->open();
            $sql_calendario = "SELECT hrm_vacaciones.id_vacaciones as id_vacaiones, hrm_vacaciones.id_empleado as id_empleado, 
            hrm_empleado.nombre as nombre, hrm_empleado.ape_p as ape, hrm_vacaciones.dia as dia, hrm_vacaciones.color as color 
            FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Aprobado'";  
            $stmt = $db_c->prepare($sql_calendario);            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
           // echo json_encode($result);
           var_dump($result);
           $db_c = null;                 
           } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>";
  }
  
} else {
    echo "Inicia Sesion para acceder a este contenido.<br>";
    echo '<script type="text/javascript">window.location = "http://remittent-crowd.000webhostapp.com/HRM";</script>';
  exit;
  }?>
  //$('#').fullCalendar('refetchEvents');