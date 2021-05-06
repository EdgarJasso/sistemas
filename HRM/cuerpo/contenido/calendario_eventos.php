<?php 
  header('Content-Type: application/json');
  include('../../php/connection.php');
  try {
       $database_cal = new Connection();
            $db_c = $database_cal->open();
            $sql_calendario = "SELECT 
            hrm_vacaciones.id_vacaciones as id,
            hrm_empleado.nombre as title, 
            hrm_vacaciones.dia as start, 
            hrm_vacaciones.color as color 
            FROM hrm_vacaciones, hrm_empleado 
            WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado 
            AND hrm_vacaciones.estado = 'Aprobado'";  

            if(isset($_GET)&&isset($_GET['id'])){
              $sql_calendario = "SELECT hrm_vacaciones.id_vacaciones as id, hrm_empleado.nombre as title, hrm_vacaciones.dia as start, hrm_vacaciones.color as color FROM hrm_vacaciones, hrm_empleado, hrm_antiguedad, hrm_puesto, hrm_area WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Aprobado' AND hrm_antiguedad.id_empleado = hrm_vacaciones.id_empleado AND hrm_antiguedad.id_puesto = hrm_puesto.id_puesto AND hrm_puesto.id_area = hrm_area.id_area AND hrm_area.id_area =".$_POST['id'];
            }
            
            $stmt = $db_c->prepare($sql_calendario);            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetchAll();
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
           //var_dump($out);
           $db_c = null;                 
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage()." !<br>";
    }
?>