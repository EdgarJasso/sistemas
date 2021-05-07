<?php    
include '../../../dominio.php'; 
session_start(); 
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
 ob_start();
include('../../php/connection.php');
date_default_timezone_set('America/Mexico_City');
$now = time();
if($now > $_SESSION['expire']) {
  $msj="<script>
  Swal.fire({
      title: finalMessage,
      icon: 'warning',
      timer: 2000,
      timerProgressBar: true,
      showCancelButton: false,
      showConfirmButton: false
  });
  setTimeout(
      function(){
        location.href='<?php echo URL;?>/HRM/php/root/logout.php';
  }, 2000);
</script>";
echo $msj;
session_destroy();
}
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HRM(Usuario)</title> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="../../img/icono.png" type="image/x-icon">
  
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/fonts/style.css">
  <link rel="stylesheet" href="../../css/alertify.css">
  <link rel="stylesheet" href="../../css/themes/default.css">
  <link rel="stylesheet" href="../../css/stile-usuario.css">
  <link rel="stylesheet" href="../../css/carga.css">
  
  <!-- inicio librerias calendario -->

  <link rel="stylesheet" href="../../packages/core/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/daygrid/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/timegrid/main.css" rel="stylesheet">
  <link rel="stylesheet" href="../../packages/list/main.css" rel="stylesheet">
  
  <script src="../../packages/core/main.js"></script>
  <script src="../../packages/interaction/main.js"></script>
  <script src="../../packages/daygrid/main.js"></script>
  <script src="../../packages/timegrid/main.js"></script>
  <script src="../../packages/list/main.js"></script>
  <script src="../../packages/core/locales-all.js"></script>

  <!-- libreia sweet-->
  <link rel="stylesheet" href="../../package/dist/sweetalert2.min.css">
  <script src="../../package/dist/sweetalert2.all.min.js"></script>

  
<script>
function fecha() {
  var f = new Date();
  
  var meses = new Array ("01","02","03","04","05","06","07","08","09","10","11","12");
  
  var dia = new Array ("01","02","03","04","05","06","07","08","09","10",
  					   "11","12","13","14","15","16","17","18","19","20",
  					   "21","22","23","24","25","26","27","28","29","30",
                       "31");
var out = "'" + f.getFullYear() + "-" + meses[f.getMonth()]+ "-" +dia[f.getDate()-1] + "'";
return out;
}

</script>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      height: 'parent',
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,listYear'
      },
      defaultView: 'dayGridMonth',
      defaultDate: '<?php echo $_SESSION['fecha'] ?>',
      navLinks: true, 
      editable: false,
      eventLimit: true,
      locale : 'es',
      events: [
        <?php 
  try {
    $database_cal = new Connection();
    $db_c = $database_cal->open();
    $sql_calendario = "SELECT hrm_vacaciones.id_vacaciones as id_vacaiones, hrm_vacaciones.id_empleado as id_empleado, hrm_empleado.nombre as nombre, hrm_empleado.ape_p as ape, hrm_vacaciones.dia as dia, hrm_vacaciones.color as color FROM hrm_vacaciones, hrm_empleado WHERE hrm_vacaciones.id_empleado = hrm_empleado.id_empleado AND hrm_vacaciones.estado = 'Aprobado'";  
           foreach ($db_c->query($sql_calendario) as $row_c) {
          ?>
        
        {
          id:'<?php echo $row_c["id_vacaiones"]?>',
          title:'<?php echo $row_c["nombre"]." ".$row_c["ape"]?>',
          start:'<?php echo $row_c["dia"]?>',
          color: '<?php echo $row_c["color"]?>',
        },
        <?php 
           }
           $db_c = null;                 
           } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>";
  }?>

      ]
    });

    calendar.render();
  });

</script>

 

  <!-- fin librerias calendario -->
     
</head>
<body  id="contenido_general">
<div id="contenedor_carga">
 <div id="carga"></div>
</div>
<script>
 window.onload = function(){
   var contenedor = document.getElementById('contenedor_carga');
   contenedor.style.visibility = 'hidden';
   conenedor.style.opacity = '0'
 }
</script>
<!-- <div id="clock"></div> -->
<header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span>Menú</a>
		</div>

		<nav>
			<ul>
      <li>   
         <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" 
         role="tab" aria-controls="pills-home" aria-selected="false">Home
          <span class="icon-home"></span>
         </a>
        </li>
				<li>   
         <a class="nav-link" id="pills-perfil-tab" data-toggle="pill" href="#pills-perfil" 
         role="tab" aria-controls="pills-perfil" aria-selected="false">Perfil
          <span class="icon-user-tie"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-puesto-tab" data-toggle="pill" href="#pills-puesto" 
         role="tab" aria-controls="pills-puesto" aria-selected="false">Puesto
          <span class="icon-office"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-objetivos-tab" data-toggle="pill" href="#pills-objetivos" 
         role="tab" aria-controls="pills-objetivos" aria-selected="false">Objetivos
          <span class="icon-flag"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-vacaciones-tab" data-toggle="pill" href="#pills-vacaciones" 
         role="tab" aria-controls="pills-vacaciones" aria-selected="false">Vacaciones
          <span class="icon-airplane"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-documentos-tab" data-toggle="pill" href="#pills-documentos" 
         role="tab" aria-controls="pills-documentos" aria-selected="false">Documentos
          <span class="icon-file-text"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-nosotros-tab" data-toggle="pill" href="#pills-nosotros" 
         role="tab" aria-controls="pills-nosotros" aria-selected="false">Nosotros
          <span class="icon-briefcase"></span>
         </a>
        </li>
        <li>   
         <a class="nav-link" id="pills-calendario-tab" data-toggle="pill" href="#pills-calendario" 
         role="tab" aria-controls="pills-calendario" aria-selected="false">Calendario
          <span class="icon-calendar"></span>
         </a>
        </li>
        <li>   
         <div id="clock"></div>
        </li>
			</ul>
		</nav>
	</header>
<div class="container-fluid">
<div class="tab-content" id="pills-tabContent" >
  <div class="tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <div class="container-fluid">
      <div class="jumbotron jumbotron-fluid" id="home-f">

        <center>  

         <h2 class="display-4">Bienvenido <?php echo $_SESSION['name'];?>!</h2>

        <div id="bt-noti"></div>
        <hr class="my-4">
          <p class="lead">Mantente Informado!</p>
          <?php
          if($_SESSION['permiso']=='admin'){
            $modo='<a href="../contenido/index.php" class="btn btn-info">Modo Administrador</a>';
            $num = '30';
          }elseif($_SESSION['permiso']=='jefe-area'){
            $modo='<a href="../contenido/jefe-area.php" class="btn btn-info">Modo Jefe Area</a>';
            $num = '20';
          }elseif($_SESSION['permiso']=='objetivos'){
            $modo='<a href="../contenido/objetivos.php" class="btn btn-info">Modo Objetivos</a>';
            $num = '20';
          }elseif($_SESSION['permiso']=='user'){
            $modo='<span class="icon-user"></span>';
            $num = '5';
          }else{}
          ?>
          <p class="lead">Se tendrá un máximo de <?php echo $num;?> minutos dentro de esta plataforma, despúes de eso se saldrá automáticamente.</p>
          <hr class="my-4">
          
          <a href="../../php/root/logout.php" class="btn btn-danger">Cerrar Sesión</a>
          <br><br>
          
          <?php
            echo $modo;
          ?>

        </center>
      </div>
     </div> 
  </div>

  <div class="tab-pane fade " id="pills-perfil" role="tabpanel" aria-labelledby="pills-perfil-tab">
    <div class="col-sm-12">
     <div class="row">    
       <center>
        <div class="container-fluid">
          <h2>Perfil</h2>
          <?php 
           try {
            $database = new Connection();
            $db = $database->open();
            $sql_perfil = "select * from hrm_empleado where id_empleado = ".$_SESSION['idempleado'];
            $stmt = $db->prepare($sql_perfil);            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $result = $stmt->fetch();
            //var_dump($result);
            }catch(PDOException $e){
              $result = $e->getMessage();
              echo $result;
            }
          ?>
           <?php 
           try {
            $database = new Connection();
            $db = $database->open();
            $sql_perfil_img = 
            'SELECT * FROM hrm_documentos WHERE id_empleado ='.$_SESSION['idempleado'].' AND titulo = "Imagen de Perfil"';
            
            $stmt_i = $db->prepare($sql_perfil_img);            
            $stmt_i->setFetchMode(PDO::FETCH_ASSOC);
            $stmt_i->execute();
            $result_i = $stmt_i->fetch();
            //var_dump($result);
            }catch(PDOException $e){
              $result_i = $e->getMessage();
              echo $result_i;
            }
          ?>
            <button type="button" class="btn btn-primary bt-perfil" data-toggle="collapse" data-target="#datos">Perfil <span class="icon-magic-wand"></span></button>
              <div id="datos" class="collapse">
                <div class="container-fluid perfil">
                  <div class="titulo_perfil">
                    <h2><?php echo $result['nombre'].' '.$result['ape_p'].' '.$result['ape_m']?></h2>
                  </div>
                  <div class="foto_perfil">
                    <img src="../contenido/<?php echo $result_i['ruta']?>" alt="avatar">
                  </div>
                  <div class="informacion_perfil">
                    <div class="fecha_perfil">
                      <h5>Fecha de Nacimiento</h5>
                         <p><?php echo $result['fecha_nac']?></p>
                    </div>
                    <div class="datos_perfil">
                        <h5>CURP</h5>
                         <p><?php echo $result['curp']?></p>
                        <h5>RFC</h5>
                         <p><?php echo $result['rfc']?></p>
                    </div>
                    <div class="numeros_perfil">
                        <h5>NSS</h5>
                         <p><?php echo $result['nss']?></p>
                        <h5>Celular</h5>
                         <p><?php echo $result['celular']?></p>
                    </div>
                  </div>
              </div>
            </div>
            <br>
    <button type="button" class="btn btn-primary bt-direccion" data-toggle="collapse" data-target="#alergias">Alergias <span class="icon-magic-wand"></span></button>
    <div id="alergias" class="collapse">
      <div class="container-fluid perfil">

      <?php 
       try {
        $database = new Connection();
         $db = $database->open();
          $query="select * from hrm_alergias where hrm_alergias.id_empleado = ".$_SESSION['idempleado'];
           foreach ($db->query($query) as $row) {
      ?>
      <div class="direccion_perfil">
                    <div class="fecha_perfil">
                      <h5>Descripcion</h5>
                         <p><?php echo $row['descripcion']?></p>
                    </div>
                    <div class="fecha_perfil">
                      <h5>Tipo de Sangre</h5>
                         <p><?php echo $row['tipo_sangre']?></p>
                    </div>
                    <div class="fecha_perfil">
                      <h5>Telefono de Contacto</h5>
                         <p><?php echo $row['tel_contacto']?></p>
                    </div>
                    
          </div>
          <?php 
           }
           $db = null;                 
           } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>";
          }?>
      </div>
    </div>
<br>
    <button type="button" class="btn btn-primary bt-direccion" data-toggle="collapse" data-target="#direccion">Direccion <span class="icon-magic-wand"></span></button>
    <div id="direccion" class="collapse">
      <div class="container-fluid perfil">

      <?php 
       try {
        $database = new Connection();
         $db = $database->open();
          $query="select * from hrm_direccion where hrm_direccion.id_empleado = ".$_SESSION['idempleado'];
           foreach ($db->query($query) as $row) {
      ?>
      <div class="direccion_perfil">
                    <div class="fecha_perfil">
                      <h5>Pais</h5>
                         <p><?php echo $row['pais']?></p>
                    </div>
                    <div class="datos_perfil">
                        <h5>Estado</h5>
                         <p><?php echo $row['estado']?></p>
                        <h5>Municipio</h5>
                         <p><?php echo $row['municipio']?></p>
                        <h5>No.</h5>
                         <p> <?php echo $row['colonia']?></p>
                    </div>
                    <div class="numeros_perfil">
                        <h5>Calle</h5>
                         <p><?php echo $row['calle']?></p>
                        <h5>No.</h5>
                         <p> <?php echo $row['numero']?></p>
                        <h5>No.</h5>
                         <p> <?php echo $row['entre_calles']?></p>
                    </div>
          </div>
          <?php 
           }
           $db = null;                 
           } catch (PDOException $e) {
           echo "Error: ".$e->getMessage()." !<br>";
          }?>
      </div>
    </div>
    <br>
    <button  type="button" class="btn btn-success btn-sm boton-add" data-toggle="modal" data-target="#changePassword" id="boton_add"><span class="icon-lock"></span> Cambio de Clave de acceso</button>
 
    </center>
     </div>
    </div>
  </div>

  <div class="tab-pane fade" id="pills-puesto" role="tabpanel" aria-labelledby="pills-puesto-tab">
    
  <div class="container-fluid">
      <div class="puesto">
        <div class="tiulo_puesto">
          <h5>Informacion sobre puesto:</h5>
        </div>
        <?php 
           try {
            $database = new Connection();
            $dbe = $database->open();
            $sql_puesto = "SELECT hrm_area.nombre as nombre_area, hrm_puesto.nombre as nombre_puesto, hrm_puesto.descripcion as descrip, hrm_antiguedad.fecha_inicio as fecha, hrm_puesto.sueldo as sueldo FROM hrm_area, hrm_puesto, hrm_antiguedad WHERE hrm_antiguedad.id_empleado = ".$_SESSION['idempleado']." AND hrm_antiguedad.id_puesto = hrm_puesto.id_puesto AND hrm_area.id_area = hrm_puesto.id_area";
           
            $stmtn = $dbe->prepare($sql_puesto);            
           
            $stmtn->setFetchMode(PDO::FETCH_ASSOC);
            $stmtn->execute();
            $result = $stmtn->fetch();
            //var_dump($result);
            }catch(PDOException $e){
              $result = $e->getMessage();
              echo $result;
            }
          ?>
        <div class="datos_1_puesto">
          <div class="bloque">
          <h5>Area:</h5>
          <p><?php echo $result['nombre_area']?></p>
          </div>
          <div class="bloque">
          <h5>Puesto:</h5>
          <p><?php echo $result['nombre_puesto']?></p>
          </div>
        </div>
        <div class="desc_puesto">
          <h5>Descripcion:</h5>
          <p><?php echo $result['descrip']?></p>
        </div>
        <div class="datos_1_puesto">
        <div class="bloque">
          <h5>Fecha Ingreso:</h5>
          <p><?php echo $result['fecha']?></p>
          </div>
        </div>
      </div>
  </div>

  </div>
  <div class="tab-pane fade " id="pills-objetivos" role="tabpanel" aria-labelledby="pills-objetivos-tab">
    <div id="objetivos_usuario">

    </div>
  </div>
  <div class="tab-pane fade" id="pills-vacaciones" role="tabpanel" aria-labelledby="pills-vacaciones-tab">
    <div id="vacaciones_usuario"></div>
  </div>
  <div class="tab-pane fade " id="pills-documentos" role="tabpanel" aria-labelledby="pills-documentos-tab">
    <div id="documenos_doctos">
    </div>
  </div>
  <div class="tab-pane fade" id="pills-nosotros" role="tabpanel" aria-labelledby="pills-nosotros-tab">
    <div id="vacaciones_nosotros"></div>
  </div>
  <div class="tab-pane fade  " id="pills-calendario" role="tabpanel" aria-labelledby="pills-calendario-tab">

  
  <div id='calendar-container'>
    
    <div id='calendar'></div>
  </div>

  </div>
</div>
</div>
<!-- View -->  
<div class="modal fade" id="RevisarObjetivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Revisar Objetivos:</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered">
                <tr>  
                     <td width="30%"><label>Id Objetivo</label></td>  
                     <td width="70%" id="view_user_id"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Puesto</label></td>  
                     <td width="70%" id="view_user_puesto"></td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Empleado</label></td>  
                     <td width="70%" id="view_user_emp"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Objetivo</label></td>  
                     <td width="70%" id="view_user_objetivo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Tema</label></td>  
                     <td width="70%" id="view_user_tema"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Subtema</label></td>  
                     <td width="70%" id="view_user_subtema"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Periodo</label></td>  
                     <td width="70%" id="view_user_periodo"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Fecha de Asignacion</label></td>  
                     <td width="70%" id="view_user_fecha"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Estado de Revicion</label></td>  
                     <td width="70%" id="view_user_estado"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Cumplio</label></td>  
                     <td width="70%" id="view_user_cumplio"></td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Comentarios</label></td>  
                     <td width="70%" id="tabla_calificar_jefe"></td>  
                </tr>
                <input type="hidden" name="view_user_id_objetivo" id="view_user_id_objetivo">
           </table>  
         </div>
       </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-default" onclick="actualizaNotificacion()"data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal view notificaciones-->
<div class="modal fade" id="Ver_nofificaciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Notificaciones</h4></center>
      </div>
      <div class="modal-body">
       <div id="usuarios_detail">
       	<div class="table-responsive">
           <table class="table table-bordered" id="table_notificaciones">
                <thead>
                  <tr>
                    <th>Objetivo</th>
                    <th>Fecha asignacion</th>
                    <th>Accion</th>
                  </tr>
                </thead>
                <tbody id="tableofnotifi">
               
                </tbody>
                <tfoot>
                <tr>
                <th>Objetivo</th>
                    <th>Fecha asignacion</th>
                    <th>Accion</th>
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
<!-- modal view notificaciones-->
<!-- modal change password-->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Cambio de Clave de acceso</h4></center>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="">Clave anterior</label>
          <input type="text" class="form-control" id="passOld" placeholder="Clave Antigua"  pattern="[A-Za-zÑñ0-9.]{1,20}" >
        </div>
        <div class="form-group">
          <label for="formGroupExampleInput2">Clave Nueva</label>
          <input type="text" class="form-control" id="passNew" placeholder="Clave Nueva"  pattern="[A-Za-zÑñ0-9.]{1,20}" >
        </div>
        <p class="font-weight-bold bg-info">El sistema no reconoce los siguientes caracteres: ! " # $ % & ' ( ) * +, - / ^ _ `</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="changePass">Confirmar</button>
      </div>
    </div>
  </div>
</div>
<!-- modal change password-->
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery-3.4.1.min.js"></script>
<script src="../../js/funciones-usuario.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/popper.min.js"></script>
<script src="../../js/datatables.min.js"></script>
<script src="../../js/alertify.js"></script>
  
<script src="../../js/dataTables.buttons.min.js"></script>
<script src="../../js/jszip.min.js"></script>
<script src="../../js/pdfmake.min.js"></script>
<script src="../../js/vfs_fonts.js"></script>
<script src="../../js/buttons.html5.min.js"></script>
<script src="../../js/reloj.js"></script>

<script>
    reloj('<?php echo  $_SESSION['reloj']; ?>', 'clock', 'Sesion Cerrada', '<?php echo URL?>/HRM/php/root/logout.php');
</script>
<script type="text/javascript">
$(document).ready(function(){
     $('#objetivos_usuario').load('objetivos/tabla_u.php');
     $('#vacaciones_usuario').load('vacaciones/tabla_u.php'); 
     $('#documenos_doctos').load('documentos/tabla_u.php'); 
     $('#tableofnotifi').load('objetivos/notificaciones.php'); 
     $('#vacaciones_nosotros').load('PDF/todo.php'); 
     $('#bt-noti').load('objetivos/badges.php'); 

     $("#changePass").click(changePassword);
     
  });
  
function cargarObjetivoModal(datos){ 
  d = datos.split('||');
 
 nombre_p =" - ".concat(d[2]);
 puesto = d[1].concat(nombre_p);

 nombre_e =" - ".concat(d[4]);
 empleado = d[3].concat(nombre_e);
 $('#view_user_id_objetivo').val(d[0]);
 $('#view_user_id').html(d[0]);
 $('#view_user_puesto').html(puesto);
 $('#view_user_emp').html(empleado);
 $('#view_user_objetivo').html(d[5]);
 $('#view_user_tema').html(d[6]);
 $('#view_user_subtema').html(d[7]);
 $('#view_user_periodo').html(d[8]);
 $('#view_user_fecha').html(d[9]);
$('#view_user_estado').html(d[10]);
$('#view_user_cumplio').html(d[11]);
$('#view_user_comentarios').html(d[12]);
}
  function changePassword(){
    old=$('#passOld').val();
	  nueva=$('#passNew').val();
    cadena=
    "old="+ old +
	  "&nueva=" +nueva;
    $.ajax({
			type:"post",
      url:"usuarios/password.php",
			data:cadena,
			success:function(r){
             if(r==1){
              Swal.fire({
                          title: 'Actualizado Exitosamente!',
                          icon: 'success',
                          timer: 3000,
                          timerProgressBar: true,
                          showCancelButton: false,
                          showConfirmButton: false
                      });
              $('#passOld').val('');
	            $('#passNew').val('');
              }else{
              // alertify.error("fallo en el servidor...");
              console.log(r);
              Swal.fire({
                title: 'Error en el proceso!\n\n'+r,
                icon: 'error',
                confirmButtonText: 'Continuar'
              });
              }
			}
		});
  }
  function actualizaNotificacion(){
    idou=$('#view_user_id_objetivo').val(); 
     cadenanot=
     "ido="+ idou ;
     
     //alert(cadenaObj);
 
            $.ajax({
             type:"post",
             url:"objetivos/descartar.php",
             data:cadenanot,
             success:function(r){
              if(r==1){
                $('#tableofnotifi').load('objetivos/notificaciones.php'); 
                $('#bt-noti').load('objetivos/badges.php'); 
                     alertify.success("Actualizado con exito!");
                   //alert('exito');
               }else{
                // alert(r);
                alertify.error("fallo en el servidor...");
                }
             }
         });
 
 }
 
function CalificarEquipo(id){
    cadena = "id="+id;
    $.ajax({
        type: "post",
        url:"vacaciones/califica_equipo.php",
        data: cadena,
        success: function (response) {
            console.log(response);
            $('#tabla_calificar_jefe').html(response);
            
        }
    });
}

</script>


</body>
</html>
<?php 

} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo "<br><a href='main.html'>Login</a>";
  echo '<script type="text/javascript">window.location = "'.URL.'/HRM";</script>';
exit;
}
?>