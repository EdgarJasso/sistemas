<?php 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

include_once('../../../php/connection.php');
                 try {
                  $database = new Connection();
                   $dbe = $database->open();
                   $query="SELECT * from hrm_objetivos WHERE estado = 'pendiente' AND id_empleado=".$_SESSION['idempleado'];
                   foreach ($dbe->query($query) as $result_notifi){?>
                    <tr>
                    <td><?php echo $result_notifi['titulo'];?></td>
                    <td><?php echo $result_notifi['f_limite'];?></td>
                    <td>
                      <center>
                        <button class="btn btn-default" onclick="actualizaNotificacion('<?php echo $result_notifi['id_objetivo'];?>')" >Descartar</button>
                      </center>
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