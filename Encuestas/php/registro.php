<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
function getArreglo($valor){
    require_once("cn.php"); $con = conectar();

   $_registr = array();
    $SQL_R="select ecsnts_respuestas.id_respuesta as idrespuesta, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as pregunta, ecsnts_pregunta.categoria as categoria, ecsnts_pregunta.descripcion as descripcion, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta where ecsnts_respuestas.id_registro=". $valor ." AND ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta";
         $execute=mysqli_query($con,$SQL_R);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
            $_registr[] = $row;
         }
    return $_registr;
}
 
function getUsuario($valor){
    require_once("cn.php"); $con = conectar();
    $_usuario = array();
    
    $SQL_R="select * from ecsnts_contesto where id_registro =".$valor;
         $execute=mysqli_query($con,$SQL_R);
        $mostrar=mysqli_fetch_assoc($execute);
    
      $_id_u = $mostrar['id_usuario'];
    
      $SQL_u="SELECT ecsnts_usuario.id_usuario as id_u, ecsnts_area.nombre as area, ecsnts_usuario.nombre as nombre from ecsnts_usuario, ecsnts_area WHERE ecsnts_usuario.id_usuario = ".$_id_u." AND ecsnts_usuario.id_area = ecsnts_area.id_area";
         $exe=mysqli_query($con,$SQL_u);
         while($row = $resultado=mysqli_fetch_assoc($exe)){
         $_usuario[] = $row;
          }
    return $_usuario;
    
} 
function getEvaluado($valor){
    require_once("cn.php"); $con = conectar();
    $_evaluado = array();
    
    $SQL_R="select * from ecsnts_contesto where id_registro =".$valor;
         $execute=mysqli_query($con,$SQL_R);
        $mostrar=mysqli_fetch_assoc($execute);
    
      $_id_encu = $mostrar['id_validacion'];
    
    $SQL_V="select * from ecsnts_validacion where Id_validacion =".$_id_encu;
         $execute=mysqli_query($con,$SQL_V);
        $mostrar=mysqli_fetch_assoc($execute);
    
      $_id_evaluado = $mostrar['Calificado'];
    
      $SQL_u="SELECT ecsnts_usuario.id_usuario as id_u, ecsnts_area.nombre as area, ecsnts_usuario.nombre as nombre from ecsnts_usuario, ecsnts_area WHERE ecsnts_usuario.id_usuario = ".$_id_evaluado." AND ecsnts_usuario.id_area = ecsnts_area.id_area";
         $exe=mysqli_query($con,$SQL_u);
         while($row = $resultado=mysqli_fetch_assoc($exe)){
         $_evaluado[] = $row;
          }
    return $_evaluado;
    
}
function getPeriodo($valor){
  require_once("cn.php"); $con = conectar();
    $_periodo = array();
    $SQL_P="select * from ecsnts_validacion, ecsnts_contesto where ecsnts_validacion.Id_validacion = ecsnts_contesto.id_validacion and ecsnts_contesto.id_registro =".$valor;
         $execute=mysqli_query($con,$SQL_P);
      while($row = $mostrar=mysqli_fetch_assoc($execute)){
         $_periodo[] = $row;
          }
    return $_periodo;
}

function getDatos($valor){
    require_once("cn.php"); $con = conectar();
    $_Datos = array();
    
    $SQL_R="select * from ecsnts_contesto where id_registro =".$valor;
         $execute=mysqli_query($con,$SQL_R);
        $mostrar=mysqli_fetch_assoc($execute);
    
      $_id_encu = $mostrar['id_validacion'];
    
    $SQL_V="select * from ecsnts_validacion where Id_validacion =".$_id_encu;
         $execute=mysqli_query($con,$SQL_V);
       while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_Datos[] = $row;
          }
    return $_Datos;
    
}
function getfecha($valor){
    require_once("cn.php"); $con = conectar();
    $_fecha = array();
    
    $SQL_R="select * from ecsnts_contesto where id_registro =".$valor;
         $execute=mysqli_query($con,$SQL_R);
      while($row = $mostrar=mysqli_fetch_assoc($execute)){
         $_fecha[] = $row;
          }
    return $_fecha;
    
}

function getregistros($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_registros = array();
     $SQL = "SELECT ecsnts_contesto.id_registro as idr, ecsnts_validacion.periodo as periodo, ecsnts_area.nombre as area, ecsnts_categoria.Descripcion as categoria from ecsnts_contesto, ecsnts_validacion, ecsnts_area, ecsnts_categoria WHERE ecsnts_contesto.id_usuario = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion and ecsnts_validacion.Area = ecsnts_area.id_area and ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria and ecsnts_validacion.periodo ='".$periodo."'";
     $execute=mysqli_query($con,$SQL);
      while($row = $mostrar=mysqli_fetch_assoc($execute)){
         $_registros[] = $row;
          }
    return $_registros;
    
}
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
exit;
}