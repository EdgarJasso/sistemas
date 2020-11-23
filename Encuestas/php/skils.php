<?php
ob_start();
function getUsuario($valor){
    require_once("cn.php"); $con = conectar();
    $_usuario = array();
    $SQL_u="SELECT 
    ecsnts_usuario.id_usuario as idu, 
    ecsnts_usuario.nombre as nombre, 
    ecsnts_area.nombre as area
    FROM  ecsnts_usuario, ecsnts_area WHERE ecsnts_usuario.id_usuario = ".$valor." 
    AND  ecsnts_usuario.id_area = ecsnts_area.id_area";
    $execute=mysqli_query($con,$SQL_u);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_usuario[] = $row;
          }
    return $_usuario;
}

function getConteo($valor){
    require_once("cn.php"); $con = conectar();
    $_conteo = array();
    $SQL_c="SELECT COUNT(*) as conteo 
    FROM ecsnts_validacion 
    WHERE ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_validacion.Validacion = 'hecho'";
    $execute=mysqli_query($con,$SQL_c);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_conteo[] = $row;
          }
    return $_conteo;
}

function getPreguntas($valor){
    require_once("cn.php"); $con = conectar();
    $SQL = "SELECT 
    ecsnts_alidacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
    //Jefe de Sistemas
    $_pregunt = array();
    
    $SQL_p="SELECT 
    ecsnts_preguntas.id_pregunta as idp, 
    ecsnts_preguntas.competencia as codigo, 
    ecsnts_competencias.nombre as nom_comp, 
    ecsnts_preguntas.id_area as ida, 
    ecsnts_area.nombre as nom_area, 
    ecsnts_preguntas.categoria as categoria, 
    ecsnts_preguntas.descripcion as descri 
    FROM ecsnts_preguntas, ecsnts_area, ecsnts_competencias 
    WHERE ecsnts_preguntas.categoria = '".$_categoria["categoria"]."' 
    AND ecsnts_preguntas.id_area = ecsnts_area.id_area 
    AND ecsnts_preguntas.competencia = ecsnts_competencias.codigo";

        $execute=mysqli_query($con,$SQL_p);
          while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_pregunt[] = $row;
          }
    return $_pregunt;
}

function getJusficaciones($valor){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT 
    ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p="SELECT 
        ecsnts_validacion.Calificador as ca, 
        ecsnts_respuestas.id_registro as registro, 
        ecsnts_respuestas.id_pregunta as idp, 
        ecsnts_respuestas.respuesta as respuesta, 
        ecsnts_respuestas.justificacion as justificacion 
        from ecsnts_respuestas, ecsnts_preguntas, ecsnts_contesto, ecsnts_validacion 
        WHERE ecsnts_respuestas.id_pregunta = ecsnts_preguntas.id_pregunta 
        AND ecsnts_preguntas.categoria = '".$_categoria['categoria']."' 
        AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
        AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
        AND ecsnts_validacion.Calificado =".$valor;
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}

function getIdPreguntas($valor){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario
    $SQL="SELECT 
    ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_preguntas = array();
        $SQL_p="SELECT id_pregunta FROM ecsnts_preguntas WHERE ecsnts_categoria = '".$_categoria['categoria']."'";
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_preguntas[] = $row;
          }
    return $_preguntas;
}


function getconteoCD($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente en desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoD($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, contesto, validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No estoy de acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNN($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni acuerdo - ni en desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoA($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCA($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente de acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}


function getPreguntasTC($valor){
    require_once("cn.php"); $con = conectar();
    $SQL = "SELECT 
    ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
    //Jefe de Sistemas
    $_pregunt = array();
    
    $SQL_p="SELECT 
    ecsnts_preguntas.id_pregunta as idp, 
    ecsnts_preguntas.competencia as codigo, 
    ecsnts_competencias.nombre as nom_comp, 
    ecsnts_preguntas.id_area as ida, 
    ecsnts_area.nombre as nom_area, 
    ecsnts_preguntas.categoria as categoria, 
    ecsnts_preguntas.descripcion as descri 
    FROM ecsnts_preguntas, ecsnts_area, ecsnts_competencias 
    WHERE ecsnts_preguntas.categoria = 'Tronco Común' 
    AND ecsnts_preguntas.id_area = ecsnts_area.id_area 
    AND ecsnts_preguntas.competencia = ecsnts_competencias.codigo order by idp";

        $execute=mysqli_query($con,$SQL_p);
          while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_pregunt[] = $row;
          }
    return $_pregunt;
}

function getJusficacionesTC($valor){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario 
    $SQL="SELECT 
    ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_justificaiones = array();
        $SQL_p="SELECT 
        ecsnts_validacion.Calificador as ca, 
        ecsnts_respuestas.id_registro as registro, 
        ecsnts_respuestas.id_pregunta as idp, 
        ecsnts_respuestas.respuesta as respuesta, 
        ecsnts_respuestas.justificacion as justificacion 
        from ecsnts_respuestas, ecsnts_preguntas, ecsnts_contesto, ecsnts_validacion 
        WHERE ecsnts_respuestas.id_pregunta = ecsnts_preguntas.id_pregunta 
        AND ecsnts_preguntas.categoria = 'Tronco Común' 
        AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
        AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
        AND ecsnts_validacion.Calificado =".$valor;
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_justificaiones[] = $row;
          }
    return $_justificaiones;
}

function getIdPreguntasTC($valor){
    require_once("cn.php"); $con = conectar();
    // valor = id usuario
    $SQL="SELECT 
    ecsnts_validacion.Categoria as categoria 
    from ecsnts_validacion, ecsnts_usuario 
    where ecsnts_validacion.Calificado = ".$valor." 
    and ecsnts_usuario.id_usuario = ecsnts_validacion.Calificado LIMIT 1";
    $execute=mysqli_query($con,$SQL);
    
    $_categoria = $resultado=mysqli_fetch_assoc($execute);
  
    $_preguntas = array();
        $SQL_p="SELECT id_pregunta FROM ecsnts_preguntas WHERE categoria = 'Tronco Común'";
        $execute=mysqli_query($con,$SQL_p);
         while($row = $resultado=mysqli_fetch_assoc($execute)){
         $_preguntas[] = $row;
          }
    return $_preguntas;
}

function getconteoCDTC($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente en desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoDTC($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'No estoy de acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoNNTC($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Ni acuerdo- ni en desacuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoATC($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'De acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}
function getconteoCATC($idp, $idu){
    require_once("cn.php"); $con = conectar();
    // valor = id pregunta
   $SQL="SELECT COUNT(respuesta) AS 'CD' 
   FROM ecsnts_respuestas, ecsnts_contesto, ecsnts_validacion 
   WHERE ecsnts_respuestas.respuesta LIKE 'Completamente de acuerdo' 
   AND ecsnts_respuestas.id_pregunta =".$idp."
   AND ecsnts_respuestas.id_registro = ecsnts_contesto.id_registro 
   AND ecsnts_contesto.id_validacion = ecsnts_validacion.Id_validacion 
   AND ecsnts_validacion.Calificado =".$idu;
    $exe=mysqli_query($con,$SQL);
     $mostrar=mysqli_fetch_array($exe);
    $r_p_cd=$mostrar["CD"];
    return $r_p_cd;
}

?>