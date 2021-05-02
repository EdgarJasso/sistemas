<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

include_once('../../../php/connection.php');
                 try {
                  $database = new Connection();
                   $dbe = $database->open();
                   $query = "SELECT 
                   hrm_objetivos.id_objetivo as id_objetivo,
                    hrm_objetivos.id_puesto as id_puesto, 
                    hrm_puesto.nombre as nombre_puesto, 
                    hrm_objetivos.id_empleado as id_empleado, 
                    hrm_empleado.nombre as nombre_empleado, 
                    hrm_objetivos.objetivo as objetivo, 
                    hrm_objetivos.tema as tema, 
                    hrm_objetivos.subtema as subtema, 
                    hrm_objetivos.periodo as periodo, 
                    hrm_objetivos.fecha_asignacion as fecha, 
                    hrm_objetivos.estado as estado, 
                    hrm_objetivos.realizado as realizado, 
                    hrm_objetivos.comentarios as comentarios 
                    FROM hrm_objetivos, hrm_puesto, hrm_empleado
                     WHERE hrm_objetivos.id_puesto = hrm_puesto.id_puesto 
                     AND hrm_objetivos.id_empleado = hrm_empleado.id_empleado
                     AND hrm_objetivos.estado = 'pendiente' 
                     AND hrm_objetivos.id_empleado=".$_SESSION['idempleado'];

                   foreach ($dbe->query($query) as $result_notifi){
                    $datosObjV = $result_notifi['id_objetivo']."||".
                    $result_notifi['id_puesto']."||".
                    $result_notifi['nombre_puesto']."||".
                    $result_notifi['id_empleado'] ."||".
                    $result_notifi['nombre_empleado']."||".
                    $result_notifi['objetivo']."||".
                    $result_notifi['tema']."||".
                    $result_notifi['subtema']."||".
                    $result_notifi['periodo']."||".
                    $result_notifi['fecha']."||".
                    $result_notifi['estado']."||".
                    $result_notifi['realizado']."||".
                    $result_notifi['comentarios'];?>
                    <tr>
                    <td><?php echo $result_notifi['objetivo'];?></td>
                    <td><?php echo $result_notifi['fecha'];?></td>
                    <td> 
                    <center>
                    <button  type="button" class="btn btn-primary btn-sm boton-add" data-toggle="modal" data-target="#RevisarObjetivo" onclick="cargarObjetivoModal('<?php echo $datosObjV;?>')" id="boton_review" data-dismiss="modal"><span class="icon-checkmark"></span> Revisar</button>
                     </center>
                    <!--
                      <center>
                        <button class="btn btn-default" onclick="actualizaNotificacion('<?php //echo $result_notifi['id_objetivo'];?>')" >Revision</button>
                      </center>
                      -->
                    </td>
                  </tr>
                <?php }
                      $dbe = null;                 
                    } catch (PDOException $e) {
                     $result_notifi = $e->getMessage();
                     echo $result_notifi;
                    }
                  }else {
                    echo "Inicia Sesion para acceder a este contenido.<br>";
                    include '../../../../dominio.php';
                    echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
                    exit;
                  }
?>