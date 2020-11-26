<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
function getUsuario($valor){
    require_once("cn.php"); $con = conectar();
    $_usuario = array();
    $SQL_u="SELECT ecsnts_usuario.id_usuario as idu, ecsnts_usuario.nombre as nombre, ecsnts_area.nombre as area FROM  ecsnts_usuario, ecsnts_area WHERE ecsnts_usuario.id_usuario = ".$valor." AND  ecsnts_usuario.id_area = ecsnts_area.id_area";
    $execute=mysqli_query($con,$SQL_u);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_usuario[] = $row;
          }
    return $_usuario;
}
function getcategoria($r,$p){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario
    $SQL="SELECT 
    ecsnts_categoria.Descripcion as categoria
    from ecsnts_validacion, ecsnts_usuario, ecsnts_categoria
    where ecsnts_validacion.Calificado = ".$r."
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado
    and ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria
    and ecsnts_validacion.periodo = '".$p."' LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
    return $_categoria;
}
function getConteo($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}
function getConteoJefe($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.tipo='Jefe'  and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}
function getConteoCliente($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.tipo='Cliente' and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}
function getConteoCompañero($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.tipo='Compañero' and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}
function getConteoSubordinado($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.tipo='Subordinado' and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}
function getConteoAutoevaluacion($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo FROM ecsnts_validacion WHERE ecsnts_validacion.Calificado = ".$valor." and ecsnts_validacion.Validacion = 'hecho' and ecsnts_validacion.tipo='Autoevaluacion' and ecsnts_validacion.periodo = '".$periodo."'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}

function getPreguntas($valor, $periodo){
    require_once("cn.php"); $con = conectar();
        $SQL = "SELECT ecsnts_validacion.Categoria as categoria from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado  and ecsnts_validacion.periodo = '".$periodo."' LIMIT 1";
        $execute=mysqli_query($con,$SQL);
        $_categoria = $resultado=mysqli_fetch_assoc($execute);
        //Jefe de Sistemas
        $_pregunt = array();
        
    $SQL_p = "SELECT ecsnts_pregunta.id_pregunta as idp, ecsnts_pregunta.competencia as codigo, ecsnts_competencias.nombre as nom_comp, ecsnts_pregunta.id_area as ida, ecsnts_area.nombre as nom_area, ecsnts_pregunta.categoria as categoria, ecsnts_pregunta.descripcion as descri 
    FROM ecsnts_pregunta, ecsnts_area, ecsnts_competencias, ecsnts_categoria
    WHERE ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion
    AND ecsnts_categoria.Id_categoria = '".$_categoria["categoria"]."'
    AND ecsnts_pregunta.id_area = ecsnts_area.id_area 
    AND ecsnts_pregunta.competencia = ecsnts_competencias.codigo";
        $execute=mysqli_query($con,$SQL_p);
          while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_pregunt[] = $row;
          }
    return $_pregunt;
}
function getJusficacionesJefe($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria, ecsnts_usuario.id_area as area from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
    $_justificaiones = array();
    $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_pregunta.id_pregunta = ecsnts_respuestas.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria AND ecsnts_pregunta.id_area = ".$_categoria['area']." AND ecsnts_validacion.Categoria = ".$_categoria['categoria']." AND ecsnts_validacion.tipo = 'Jefe' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
    $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesCliente($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria, ecsnts_usuario.id_area as area from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_pregunta.id_pregunta = ecsnts_respuestas.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria AND ecsnts_pregunta.id_area = ".$_categoria['area']." AND ecsnts_validacion.Categoria = ".$_categoria['categoria']." AND ecsnts_validacion.tipo = 'Cliente' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'"; 
   
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesCompañero($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria, ecsnts_usuario.id_area as area from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_pregunta.id_pregunta = ecsnts_respuestas.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria AND ecsnts_pregunta.id_area = ".$_categoria['area']." AND ecsnts_validacion.Categoria = ".$_categoria['categoria']." AND ecsnts_validacion.tipo = 'Compañero' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";     
   
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesSubordinado($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria, ecsnts_usuario.id_area as area from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
       $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_pregunta.id_pregunta = ecsnts_respuestas.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria AND ecsnts_pregunta.id_area = ".$_categoria['area']." AND ecsnts_validacion.Categoria = ".$_categoria['categoria']." AND ecsnts_validacion.tipo = 'Subordinado' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";
   
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesAutoevaluacion($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria, ecsnts_usuario.id_area as area from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_pregunta.id_pregunta = ecsnts_respuestas.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_validacion.Categoria = ecsnts_categoria.Id_categoria AND ecsnts_pregunta.id_area = ".$_categoria['area']." AND ecsnts_validacion.Categoria = ".$_categoria['categoria']." AND ecsnts_validacion.tipo = 'Autoevaluacion' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";    
   
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}


function getIdPreguntas($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario
    $SQL="SELECT ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado 
    and ecsnts_validacion.periodo = '".$periodo."' LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_preguntas = array();
        $SQL_p="SELECT id_pregunta 
        FROM ecsnts_pregunta, ecsnts_categoria 
        WHERE ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion 
        AND ecsnts_categoria.Id_categoria ='".$_categoria['categoria']."'";
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_preguntas[] = $row;
          }
    return $_preguntas;
}


function getconteoCDJefe($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.tipo = 'Jefe'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDJefe($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No_estoy_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Jefe'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNJefe($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni_acuerdo_ni_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Jefe'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoAJefe($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Jefe'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCAJefe($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Jefe'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}


function getconteoCDCliente($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.tipo = 'Cliente'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDCliente($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No_estoy_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Cliente'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNCliente($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni_acuerdo_ni_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Cliente'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoACliente($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Cliente'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCACliente($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Cliente'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}

function getconteoCDCompañero($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.tipo = 'Compañero'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDCompañero($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No_estoy_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Compañero'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNCompañero($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni_acuerdo_ni_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Compañero'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoACompañero($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Compañero'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCACompañero($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Compañero'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}

function getconteoCDSubordinado($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.tipo = 'Subordinado'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDSubordinado($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No_estoy_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Subordinado'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNSubordinado($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni_acuerdo_ni_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Subordinado'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoASubordinado($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Subordinado'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCASubordinado($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Subordinado'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}

function getconteoCDAutoevaluacion($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta Tronco Común
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.tipo = 'Autoevaluacion'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDAutoevaluacion($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No_estoy_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Autoevaluacion'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNAutoevaluacion($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni_acuerdo_ni_en_desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Autoevaluacion'
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoAAutoevaluacion($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp." 
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.tipo = 'Autoevaluacion' 
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.Calificado = ".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCAAutoevaluacion($idp, $idu, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente_de_acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp." 
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion
   AND ecsnts_validacion.periodo = '".$periodo."'
   AND ecsnts_validacion.tipo = 'Autoevaluacion' 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}


/*aqui empieza las preguntas de Tronco Común*/

function getPreguntasTC($valor){
    require_once("cn.php"); $con = conectar();
    
    $_pregunt = array();
    $SQL_p="SELECT ecsnts_pregunta.id_pregunta as idp, ecsnts_pregunta.competencia as codigo, ecsnts_competencias.nombre as nom_comp, ecsnts_pregunta.id_area as ida, ecsnts_area.nombre as nom_area, ecsnts_pregunta.categoria as categoria, ecsnts_pregunta.descripcion as descri FROM ecsnts_pregunta, ecsnts_area, ecsnts_competencias WHERE ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_pregunta.id_area = ecsnts_area.id_area AND ecsnts_pregunta.competencia = ecsnts_competencias.codigo";
         
    $execute=mysqli_query($con,$SQL_p);
          while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_pregunt[] = $row;
          }
    return $_pregunt;
}

function getJusficacionesJefeTC($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
   
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_validacion.tipo = 'Jefe' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
   
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesClienteTC($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_validacion.tipo = 'Cliente' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
        
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesCompañeroTC($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
   
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_validacion.tipo = 'Compañero' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
        
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesSubordinadoTC($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT ecsnts_validacion.Categoria as categoria from ecsnts_validacion, ecsnts_usuario where ecsnts_validacion.Calificado = ".$valor." and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_validacion.tipo = 'Subordinado' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
        
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}
function getJusficacionesAutoevaluacionTC($valor, $periodo){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
   
    $_justificaiones = array();
        $SQL_p = "SELECT ecsnts_validacion.Calificador as ca, ecsnts_respuestas.id_registro as registro, ecsnts_respuestas.id_pregunta as idp, ecsnts_respuestas.respuesta as respuesta, ecsnts_respuestas.justificacion as justificacion from ecsnts_respuestas, ecsnts_pregunta, ecsnts_contesto, ecsnts_validacion , ecsnts_categoria WHERE ecsnts_respuestas.id_pregunta = ecsnts_pregunta.id_pregunta AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_pregunta.categoria = 'Tronco Común' AND ecsnts_validacion.tipo = 'Autoevaluacion' AND ecsnts_validacion.Calificado =".$valor." AND ecsnts_validacion.periodo = '".$periodo."'";  
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}


function getIdPreguntasTC($valor){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario
  
    $_preguntas = array();
        $SQL_p="SELECT id_pregunta FROM ecsnts_pregunta WHERE categoria = 'Tronco Común'";
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_preguntas[] = $row;
          }
    return $_preguntas;
}


}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}

?>