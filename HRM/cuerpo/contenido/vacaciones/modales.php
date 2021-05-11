<?php 
//session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
?>
<!-- View -->  
<div class="modal fade" id="Ver_vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                     <td width="30%"><label>Id Vacacion</label></td>  
                     <td width="70%" id="view_vac_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_vac_emp"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Fecha de registro</label></td>  
                     <td width="70%" id="view_vac_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Dia solicitado</label></td>  
                     <td width="70%" id="view_vac_dia"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Color</label></td>  
                     <td width="70%" id="view_color_dia"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado</label></td>  
                     <td width="70%" id="view_vac_estado"></td>  
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




 <!-- Modal de  Add-->
 <div class="modal fade" id="Agregar_vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Vacacion:</h4></center>
      </div>
      <div class="modal-body">
      <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Vac_idempleado" id="Vac_idempleado">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query="";

         if($_SESSION['permiso']=='admin'){
          $query="select * from hrm_empleado";
        }else{}

        if($_SESSION['permiso']=='gerente'){
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
         <label >Fecha:</label>
         <input type="date" name="vac_dia" id="vac_dia" max="2030-12-31" min="2020-05-01" class="form-control">
         <span class="help-block" id="text_help_vac_f"></span>
        </div>

       <div class="form-group">
       	<label for="idempleado">Estado:</label>
       	<select class="form-control" name="vac_estado" id="vac_estado">
        <option value="Pendiente">Pendiente</option>
        <option value="Aprobado">Aprobado</option>
        <option value="Denegado">Denegado</option>
       	</select>
       </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_vacacion">Guardar</button>
      </div>
    </div>
  </div>
</div>


 <!-- Modal de  Add Usuario-->
 <div class="modal fade" id="Agregar_vacaciones_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Agregar Vacacion:</h4></center>
      </div>
      <div class="modal-body">
    
       <div class="form-group">
         <label >Fecha:</label>
         <input type="date" name="vac_dia_u" id="vac_dia_u" max="2030-12-31" min="2020-05-01" class="form-control">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="guardar_vacacion_user">Guardar</button>
      </div>
    </div>
  </div>
</div>
</div>
 <!-- Modal de  Add Usuario-->

<!-- Editar -->  
<div class="modal fade" id="Editar_vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Vacacion:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Vac_idvacaciones_e" id="Vac_idvacaciones_e">
        <div class="form-group">
       	<label for="idempleado">Empleado:</label>
       	<select class="form-control" name="Vac_idempleado_e" id="Vac_idempleado_e">
       	<?php 
        try {
        $database = new Connection();
         $db = $database->open();
         $query="";

         if($_SESSION['permiso']=='admin'){
          $query="select * from hrm_empleado";
        }else{}

        if($_SESSION['permiso']=='gerente'){
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
       <input type="hidden" name="vac_fecha_e" id="vac_fecha_e">
       <div class="form-group">
         <label >Fecha:</label>
         <input type="date" name="vac_dia_e" id="vac_dia_e" max="2030-12-31" min="2020-05-01" class="form-control">
         <span class="help-block" id="text_help_vac_f_e"></span>
        
        </div>

       <div class="form-group">
       	<label for="idempleado">Estado:</label>
       	<select class="form-control" name="vac_estado_e" id="vac_estado_e">
        <option value="Pendiente">Pendiente</option>
        <option value="Aprobado">Aprobado</option>
        <option value="Denegado">Denegado</option>
       	</select>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_vacaciones">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!-- Editar Usuario-->  
<div class="modal fade" id="Editar_vacacionesUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Editar Vacacion:</h4></center>
      </div>
    <div class="modal-body">
        <input type="hidden" name="Vac_idvacaciones_eu" id="Vac_idvacaciones_eu">
        <input type="hidden" name="Vac_idempleado_eu" id="Vac_idempleado_eu">
        <input type="hidden" name="Vac_idjefe_eu" id="Vac_idjefe_eu">
        <input type="hidden" name="Vac_fecha_eu" id="Vac_fecha_eu">
      
       <div class="form-group">
         <label >Fecha:</label>
         <input type="date" name="vac_dia_eu" id="vac_dia_eu" max="2030-12-31" min="2020-05-01" class="form-control">
        </div>
        <input type="hidden" name="Vac_color_eu" id="Vac_color_eu">
        <input type="hidden" name="Vac_estado_eu" id="Vac_estado_eu">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="actualizar_vacacionesU">Actualizar</button>
      </div>
    </div>
  </div>
</div>
 <!-- Modal de Revision Vacaciones equipo-->
 <div class="modal fade" id="Revicion_de_Vacaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Revicion de Vacaciones:</h4></center>
      </div>
      <div class="modal-body">
         <div id="tabla_calificar_jefe"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal" id="">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
 <!-- Modal de  Add Usuario SELECT * FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_jefe = 28 AND hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Pendiente' -->
<?php 
}else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../../dominio.php';
    	echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
  exit;
}
?>