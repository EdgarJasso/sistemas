<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_asignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Datos Asignacion:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Asignacion</label></td>  
                     <td width="70%" id="view_asi_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_asi_emp"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Periodo</label></td>  
                     <td width="70%" id="view_asi_periodo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Dias</label></td>  
                     <td width="70%" id="view_asi_dias"></td>  
                </tr>
           </table>  
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- View -->  
<div class="modal fade" id="Ver_DiasDisponibles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Dias Disponibles:</h4></center>
      </div>
      <div class="modal-body">
       <div id="dias_disponibles">
       	<div class="table-responsive">
           <table class="table table-bordered" id="table_dias_disponibles">
                <thead>
                <tr>
                <th>Empleado</th>
                <th>Dias Disponibles</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                
                include_once('../../../php/connection.php');
               // session_start(); 
                try {
                  $databased = new Connection();
                  $dbd = $databased->open();
                  $sql_lista ="";
                  
                  if($_SESSION['permiso']=='admin'){
                    $sql_lista ="SELECT id_empleado, nombre from hrm_empleado";
                  }else{}

                 /*if($_SESSION['permiso']=='jefe-area'){
                    $sql_lista ="SELECT 
                    hrm_empleado.id_empleado as id_empleado, 
                    hrm_empleado.nombre as nombre,
                     hrm_area.nombre as area, 
                     hrm_puesto.nombre as puesto 
                     FROM hrm_empleado, 
                     hrm_antiguedad, hrm_area, hrm_puesto 
                     WHERE hrm_empleado.id_empleado = hrm_antiguedad.id_empleado
                      AND hrm_area.id_area = hrm_puesto.id_area 
                      AND hrm_puesto.id_puesto = hrm_antiguedad.id_puesto 
                      AND hrm_area.nombre = '".$_SESSION['area']."'";
                  }else{}*/

                  foreach ($dbd->query($sql_lista) as $row_lista) {
                  $databasedias = new Connection();
                  $dbddias = $databasedias->open();
                   $sql_contador_d = "SELECT SUM(hrm_asignacion.dias_habilies) as dias FROM hrm_asignacion, hrm_empleado 
                      WHERE hrm_asignacion.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$row_lista['id_empleado'];

                      $stmtn_vd = $dbddias->prepare($sql_contador_d);

                      $stmtn_vd->setFetchMode(PDO::FETCH_ASSOC);
                      $stmtn_vd->execute();
                      $result_total = $stmtn_vd->fetch();
                      //dias ocupados
                      $sql_ocupados_d = "SELECT COUNT(*) as ocupo  FROM hrm_vacaciones, hrm_empleado 
                      WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_empleado.id_empleado =".$row_lista['id_empleado']." AND hrm_vacaciones.estado NOT LIKE '%Denegado%'";
                      $stmtn_od = $dbddias->prepare($sql_ocupados_d);
                      $stmtn_od->setFetchMode(PDO::FETCH_ASSOC);
                      $stmtn_od->execute();
                      $result_ocupados = $stmtn_od->fetch();
                      $dbd = null;      
                      //var_dump($result_v);   
                      $dias_habiles = $result_total['dias'] - $result_ocupados['ocupo'];
                      $out = '
                      <tr>
                        <td>'.$row_lista['nombre'].'</td>
                        <td>'.$dias_habiles.'</td>
                      </tr>
                      ';
                      echo $out;
                  }
                } catch (PDOException $e) {
                  $result_d = $e->getMessage();
                  echo $result_d;
                }
               
                ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Empleado</th>
                <th>Dias Disponibles</th>
                </tr>
                </tfoot>
           </table>  
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="">Cerrar</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal de  Add-->
 <div class="modal fade" id="Agregar_asignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Dias Habiles:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Asi_idempleado" id="Asi_idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query=" ";
       
            if($_SESSION['permiso']=='admin'){
              $query="select * from hrm_empleado";
            }else{}

            if($_SESSION['permiso']=='jefe-area'){
              $query  = "SELECT 
                hrm_empleado.id_empleado as id_empleado, 
                hrm_empleado.nombre as nombre,
                hrm_empleado.ape_p as ape_p,
                 hrm_area.nombre as area, 
                 hrm_puesto.nombre as puesto 
                 FROM hrm_empleado, 
                 hrm_antiguedad, hrm_area, hrm_puesto 
                 WHERE hrm_empleado.id_empleado = hrm_antiguedad.id_empleado
                  AND hrm_area.id_area = hrm_puesto.id_area 
                  AND hrm_puesto.id_puesto = hrm_antiguedad.id_puesto 
                  AND hrm_area.nombre = '".$_SESSION['area']."'";
            }else{}

           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>

       <div class="form-group">
       	<label for="">Periodo(cuatrimestre):</label>
         <select name="Asi_periodo" id="Asi_periodo" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
         <?php for ($i=21; $i <=30 ; $i++) { 
          echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
          echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
          echo ' <option value="20'.$i.'-3">20'.$i.'-3</option>';
          echo ' <option value="20'.$i.'-4">20'.$i.'-4</option>';
         }?>
         </select>
         <span class="help-block" id="text_asi_periodo"></span>
       </div>

       <div class="form-group">
       	<label for="idempleado">Dias:</label>
       	<select class="form-control" name="Asi_dias" id="Asi_dias">
         <?php for($i = 1; $i<=10 ; $i++){?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
         <?php }?>
       	</select>
       </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_asignacion">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Editar -->  
<div class="modal fade" id="Editar_asignacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Antigüedad:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Asi_idasignacion_e" id="Asi_idasignacion_e">
        <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Asi_idempleado_e" id="Asi_idempleado_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query="";

         if($_SESSION['permiso']=='admin'){
          $query="select * from hrm_empleado";
        }else{}

        if($_SESSION['permiso']=='jefe-area'){
          $query ="SELECT 
          hrm_empleado.id_empleado as id_empleado, 
          hrm_empleado.nombre as nombre,
          hrm_empleado.ape_p as ape_p,
           hrm_area.nombre as area, 
           hrm_puesto.nombre as puesto 
           FROM hrm_empleado, 
           hrm_antiguedad, hrm_area, hrm_puesto 
           WHERE hrm_empleado.id_empleado = hrm_antiguedad.id_empleado
            AND hrm_area.id_area = hrm_puesto.id_area 
            AND hrm_puesto.id_puesto = hrm_antiguedad.id_puesto 
            AND hrm_area.nombre = '".$_SESSION['area']."'";
        }else{}
           foreach ($db->query($query) as $row) {?>
            <option value="<?php echo $row["id_empleado"]?>"><?php echo $row["id_empleado"]."  -  ".$row["nombre"]."  ".$row["ape_p"]?></option><?php
           }
        } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>"; 
         }?>
       	</select>
       </div>
       <div class="form-group">
       	<label for="">Periodo(cuatrimestre):</label>
         <select name="Asi_periodo_e" id="Asi_periodo_e" class="form-control">
          <option value="null" > -Seleccione un tipo- </option>
         <?php for ($i=21; $i <=30 ; $i++) { 
          echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
          echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
          echo ' <option value="20'.$i.'-3">20'.$i.'-3</option>';
          echo ' <option value="20'.$i.'-4">20'.$i.'-4</option>';
         }?>
         </select>
         <span class="help-block" id="text_asi_periodo_e"></span>
       </div>
       <div class="form-group">
       	<label for="idempleado">Dias:</label>
       	<select class="form-control" name="Asi_dias_e" id="Asi_dias_e">
         <?php for($i = 1; $i<=10 ; $i++){?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
         <?php }?>
       	</select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_asignacion">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>