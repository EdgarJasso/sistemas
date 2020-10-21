<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include_once('../../../php/connection.php');

           try {
            $database = new Connection();
            $dbe = $database->open();
             $sql_notificacion = "SELECT COUNT(*) as noti from hrm_objetivos WHERE estado = 'pendiente' AND id_empleado=".$_SESSION['idempleado'];
           
            $stmtn = $dbe->prepare($sql_notificacion);            
           
            $stmtn->setFetchMode(PDO::FETCH_ASSOC);
            $stmtn->execute();
            $result_not = $stmtn->fetch();

            $out = '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Ver_nofificaciones" id="boton_notificaciones">
            Notificationes&nbsp';
            if($result_not['noti'] > 0){
                $badge = '<span class="badge badge-light">'.$result_not["noti"].'</span></button>';
            }else{
                $badge = ' </button>';
            }
            echo $out.$badge;

            }catch(PDOException $e){
              $result_not = $e->getMessage();
              echo $result_not;
            }
          }else {
            echo "Inicia Sesion para acceder a este contenido.<br>";
            include '../../../../dominio.php';
            echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
            exit;
          }
          ?>