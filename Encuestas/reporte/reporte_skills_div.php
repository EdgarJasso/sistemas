<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
$r= $_POST['id'];
$p = $_POST['periodo'];
/*
echo '-----------------------------';
echo '<br>';
echo 'id usuario:'.$r;
echo '<br>';
echo 'periodo:'.$p;
echo '<br>';
echo '-----------------------------';
*/
require_once('vendor/autoload.php');
//consultas
require_once('../php/skills_div.php');
//plantilla html
require_once('plantilla/reporte/skills_div.php');
//codigo css de la plantilla 
$css = file_get_contents('plantilla/reporte/estilos.css');

//traemos datos gnerales
$_usuario = array();
$_usuario = getUsuario($r);
$_categoria = array();
$_categoria = getcategoria($r,$p);
$_conteo = array();
$_conteo = getConteo($r,$p);

//conteo de jefe
$_conteo_jefe = array();
$_conteo_jefe = getConteoJefe($r,$p);
//conteo de Cliente
$_conteo_Cliente = array();
$_conteo_Cliente = getConteoCliente($r,$p);
//conteo de Compañero
$_conteo_Companero = array();
$_conteo_Companero = getConteoCompañero($r,$p);
//conteo de Subordinado
$_conteo_Subordinado = array();
$_conteo_Subordinado = getConteoSubordinado($r,$p);
//conteo de Autoevaluacion
$_conteo_Autoevaluacion = array();
$_conteo_Autoevaluacion = getConteoAutoevaluacion($r,$p);

//traemos preguntas de la categoria correspondiente
$_preguntas = array();
$_preguntas = getPreguntas($r,$p);

//traemos justificaciones de jefe
$_justificacionesJefe = array();
$_justificacionesJefe = getJusficacionesJefe($r,$p);
//traemos justificaciones de Cliente
$_justificacionesCliente = array();
$_justificacionesCliente = getJusficacionesCliente($r,$p);
//traemos justificaciones de Compañero
$_justificacionesCompanero = array();
$_justificacionesCompanero = getJusficacionesCompañero($r,$p);
//traemos justificaciones de Subordinado
$_justificacionesSubordinado = array();
$_justificacionesSubordinado = getJusficacionesSubordinado($r,$p);
//traemos justificaciones de Autoevaluacion
$_justificacionesAutoevaluacion = array();
$_justificacionesAutoevaluacion = getJusficacionesAutoevaluacion($r,$p);


$_idPreguntas = array();
$_idPreguntas = getIdPreguntas($r,$p);

 
$_preguntasTC = array();
$_preguntasTC = getPreguntasTC($r);

$_justificacionesJefeTC = array();
$_justificacionesJefeTC = getJusficacionesJefeTC($r,$p);

$_justificacionesClienteTC = array();
$_justificacionesClienteTC = getJusficacionesClienteTC($r,$p);

$_justificacionesCompaneroTC = array();
$_justificacionesCompaneroTC = getJusficacionesCompañeroTC($r,$p);

$_justificacionesSubordinadoTC = array();
$_justificacionesSubordinadoTC = getJusficacionesSubordinadoTC($r,$p);

$_justificacionesAutoevaluacionTC = array();
$_justificacionesAutoevaluacionTC = getJusficacionesAutoevaluacionTC($r,$p);

$_idPreguntasTC = array();
$_idPreguntasTC = getIdPreguntasTC($r);

//arreglos conteos de area
$_CDJefe= array();$_DJefe = array();$_NNJefe = array();$_AJefe = array();$_CAJefe = array();
$_CDCliente= array();$_DCliente = array();$_NNCliente = array();$_ACliente = array();$_CACliente = array();
$_CDCompanero= array();$_DCompanero = array();$_NNCompanero = array();$_ACompanero = array();$_CACompanero = array();
$_CDSubordinado= array();$_DSubordinado = array();$_NNSubordinado = array();$_ASubordinado = array();$_CASubordinado = array();
$_CDAutoevaluacion= array();$_DAutoevaluacion = array();$_NNAutoevaluacion = array();$_AAutoevaluacion = array();$_CAAutoevaluacion = array();

//arreglos conteos del tronco comun
$_CDJefeTC= array();$_DJefeTC = array();$_NNJefeTC = array();$_AJefeTC = array();$_CAJefeTC = array();
$_CDClienteTC= array();$_DClienteTC = array();$_NNClienteTC = array();$_AClienteTC = array();$_CAClienteTC = array();
$_CDCompaneroTC= array();$_DCompaneroTC = array();$_NNCompaneroTC = array();$_ACompaneroTC = array();$_CACompaneroTC = array();
$_CDSubordinadoTC= array();$_DSubordinadoTC = array();$_NNSubordinadoTC = array();$_ASubordinadoTC = array();$_CASubordinadoTC = array();
$_CDAutoevaluacionTC= array();$_DAutoevaluacionTC = array();$_NNAutoevaluacionTC = array();$_AAutoevaluacionTC = array();$_CAAutoevaluacionTC = array();

//Area Jefe
foreach($_idPreguntas as $id_preaj){
 
   $_CDJefe[] = getconteoCDJefe( $id_preaj['id_pregunta'], $r, $p);
   $_DJefe[] = getconteoDJefe( $id_preaj['id_pregunta'], $r, $p);
   $_NNJefe[] = getconteoNNJefe( $id_preaj['id_pregunta'], $r, $p);
   $_AJefe []= getconteoAJefe( $id_preaj['id_pregunta'], $r, $p);
   $_CAJefe []= getconteoCAJefe( $id_preaj['id_pregunta'], $r, $p);
}
//AreaCliente
foreach($_idPreguntas as $id_pre){
   $_CDCliente[] = getconteoCDCliente ($id_pre['id_pregunta'], $r, $p);
   $_DCliente[] = getconteoDCliente( $id_pre['id_pregunta'], $r, $p);
   $_NNCliente[] = getconteoNNCliente( $id_pre['id_pregunta'], $r, $p);
   $_ACliente []= getconteoACliente( $id_pre['id_pregunta'], $r, $p);
   $_CACliente []= getconteoCACliente( $id_pre['id_pregunta'], $r, $p);
}
//Area Compañero
foreach($_idPreguntas as $id_pre){
 
   $_CDCompanero[] = getconteoCDCompañero( $id_pre['id_pregunta'], $r, $p);
   $_DCompanero[] = getconteoDCompañero( $id_pre['id_pregunta'], $r, $p);
   $_NNCompanero[] = getconteoNNCompañero( $id_pre['id_pregunta'], $r, $p);
   $_ACompanero []= getconteoACompañero( $id_pre['id_pregunta'], $r, $p);
   $_CACompanero []= getconteoCACompañero( $id_pre['id_pregunta'], $r, $p);
}
//Area Subordinado
foreach($_idPreguntas as $id_pre){
 
   $_CDSubordinado[] = getconteoCDSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_DSubordinado[] = getconteoDSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_NNSubordinado[] = getconteoNNSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_ASubordinado []= getconteoASubordinado( $id_pre['id_pregunta'], $r, $p);
   $_CASubordinado []= getconteoCASubordinado( $id_pre['id_pregunta'], $r, $p);
}
//Area Autoevaluacion
foreach($_idPreguntas as $id_pre){
 
   $_CDAutoevaluacion[] = getconteoCDAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_DAutoevaluacion[] = getconteoDAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_NNAutoevaluacion[] = getconteoNNAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_AAutoevaluacion[]= getconteoAAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_CAAutoevaluacion []= getconteoCAAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
}


//Tronco Comun Jefe
foreach($_idPreguntasTC as $id_pre){
 
   $_CDJefeTC[] = getconteoCDJefe( $id_pre['id_pregunta'], $r, $p);
   $_DJefeTC[] = getconteoDJefe( $id_pre['id_pregunta'], $r, $p);
   $_NNJefeTC[] = getconteoNNJefe( $id_pre['id_pregunta'], $r, $p);
   $_AJefeTC []= getconteoAJefe( $id_pre['id_pregunta'], $r, $p);
   $_CAJefeTC []= getconteoCAJefe( $id_pre['id_pregunta'], $r, $p);
}
//Tronco Comun Cliente
foreach($_idPreguntasTC as $id_pre){
 
   $_CDClienteTC[] = getconteoCDCliente ($id_pre['id_pregunta'], $r, $p);
   $_DClienteTC[] = getconteoDCliente( $id_pre['id_pregunta'], $r, $p);
   $_NNClienteTC[] = getconteoNNCliente( $id_pre['id_pregunta'], $r, $p);
   $_AClienteTC []= getconteoACliente( $id_pre['id_pregunta'], $r, $p);
   $_CAClienteTC []= getconteoCACliente( $id_pre['id_pregunta'], $r, $p);
}
//Tronco Comun Compañero
foreach($_idPreguntasTC as $id_pre){
 
   $_CDCompaneroTC[] = getconteoCDCompañero( $id_pre['id_pregunta'], $r, $p);
   $_DCompaneroTC[] = getconteoDCompañero( $id_pre['id_pregunta'], $r, $p);
   $_NNCompaneroTC[] = getconteoNNCompañero( $id_pre['id_pregunta'], $r, $p);
   $_ACompaneroTC []= getconteoACompañero( $id_pre['id_pregunta'], $r, $p);
   $_CACompaneroTC []= getconteoCACompañero( $id_pre['id_pregunta'], $r, $p);
}
//Tronco Comun Subordinado
foreach($_idPreguntasTC as $id_pre){
 
   $_CDSubordinadoTC[] = getconteoCDSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_DSubordinadoTC[] = getconteoDSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_NNSubordinadoTC[] = getconteoNNSubordinado( $id_pre['id_pregunta'], $r, $p);
   $_ASubordinadoTC []= getconteoASubordinado( $id_pre['id_pregunta'], $r, $p);
   $_CASubordinadoTC []= getconteoCASubordinado( $id_pre['id_pregunta'], $r, $p);
}
//Tronco Comun Autoevaluacion
foreach($_idPreguntasTC as $id_pre){
 
   $_CDAutoevaluacionTC[] = getconteoCDAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_DAutoevaluacionTC[] = getconteoDAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_NNAutoevaluacionTC[] = getconteoNNAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_AAutoevaluacionTC []= getconteoAAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
   $_CAAutoevaluacionTC []= getconteoCAAutoevaluacion( $id_pre['id_pregunta'], $r, $p);
}

/*
echo "Datos para generar pdf";
echo "<br><br>";
echo "<p>Datos del usuario</p>";
var_dump($_usuario);
echo "<br><br>";
echo "<p>Categoria</p>";
var_dump($_categoria);
echo "<br><br>";
echo "<p>Conteo Total</p>";
var_dump($_conteo);
echo "<br><br>";
echo "---------------------------";
echo "<br><br>";
echo "<p>Conteo  Jefe</p>";
var_dump($_conteo_jefe);
echo "<br><br>";
echo "<p>Conteo  Cliente</p>";
var_dump($_conteo_Cliente);
echo "<br><br>";
echo "<p>Conteo  Compañero</p>";
var_dump($_conteo_Companero);
echo "<br><br>";
echo "<p>Conteo  Subordinado</p>";
var_dump($_conteo_Subordinado);
echo "<br><br>";
echo "<p>Conteo  Autoevaluacion</p>";
var_dump($_conteo_Autoevaluacion);
echo "<br><br>";
echo "---------------------------";
echo "<br><br>";



echo "<br><br>";
echo "<p>IDPreguntas del TC</p>";
var_dump($_idPreguntasTC);
echo "<br><br>";
echo "---------------------------";
echo "<br><br>";
echo "<p>Preguntas del TC</p>";
var_dump($_preguntasTC);
echo "<br><br>";
echo "---------------------------";
echo "<br><br>";
echo "Justificaciones TC";
echo "<br><br>";
echo "<p>Jusfificaciones del JefeTC</p>";
var_dump($_justificacionesJefeTC);
echo "<br><br>";
echo "<p>Jusfificaciones del ClienteTC</p>";
var_dump($_justificacionesClienteTC);
echo "<br><br>";
echo "<p>Jusfificaciones del CompañeroTC</p>";
var_dump($_justificacionesCompaneroTC);
echo "<br><br>";
echo "<p>Jusfificaciones del SubordinadoTC</p>";
var_dump($_justificacionesSubordinadoTC);
echo "<br><br>";
echo "<p>Jusfificaciones del AutoevaluacionTC</p>";
var_dump($_justificacionesAutoevaluacionTC);
echo "<br><br>";
echo "---------------------------";


echo "<p>IDPreguntas del Area</p>";
var_dump($_idPreguntas);
echo "<br><br>";
echo "<br><br>";
echo "---------------------------";
echo "<p>Preguntas del Area</p>";
var_dump($_preguntas);
echo "<br><br>";
echo "---------------------------";
echo "<br><br>";
echo "Justificaciones del area";
echo "---------------------------";
echo "<br><br>";
echo "<p>Jusfificaciones del Jefe</p>";
var_dump($_justificacionesJefe);
echo "<br><br>";
echo "<p>Jusfificaciones del Cliente</p>";
var_dump($_justificacionesCliente);
echo "<br><br>";
echo "<p>Jusfificaciones del Compañero</p>";
var_dump($_justificacionesCompanero);
echo "<br><br>";
echo "<p>Jusfificaciones del Subordinado</p>";
var_dump($_justificacionesSubordinado);
echo "<br><br>";
echo "<p>Jusfificaciones del Autoevaluacion</p>";
var_dump($_justificacionesAutoevaluacion);
echo "<br><br>";


echo"--------------------";
echo "conteo TC jefe";
echo "<br><br>";
var_dump($_CDJefeTC,"<br>",
$_DJefeTC,"<br>",
$_NNJefeTC,"<br>",
$_AJefeTC,"<br>",
$_CAJefeTC );
echo "<br><br>";
echo "conteo tc cliente";
echo "<br><br>";
var_dump($_CDClienteTC,"<br>",
$_DClienteTC,"<br>",
$_NNClienteTC,"<br>",
$_AClienteTC,"<br>",
$_CAClienteTC);
echo "<br><br>";
echo "conteo tc compañero";
echo "<br><br>";
var_dump($_CDCompaneroTC,"<br>",
$_DCompaneroTC,"<br>",
$_NNCompaneroTC,"<br>",
$_ACompaneroTC,"<br>",
$_CACompaneroTC);
echo "<br><br>";
echo "conteo tc subordinado";
echo "<br><br>";
var_dump($_CDSubordinadoTC,"<br>",
$_DSubordinadoTC, "<br>",
$_NNSubordinadoTC,"<br>",
$_ASubordinadoTC, "<br>",
$_CASubordinadoTC);
echo "<br><br>";
echo "conteo tc autoevaluacion";
echo "<br><br>";
var_dump($_CDAutoevaluacionTC,"<br>",
$_DAutoevaluacionTC ,"<br>",
$_NNAutoevaluacionTC,"<br>",
$_AAutoevaluacionTC ,"<br>",
$_CAAutoevaluacionTC);
echo "<br><br>";


echo "---------------------------";
echo "<br><br>";
echo "conteo area jefe";
echo "<br><br>";
var_dump($_CDJefe,"<br>",
$_DJefe,"<br>",
$_NNJefe,"<br>",
$_AJefe,"<br>",
$_CAJefe);
echo "<br><br>";
echo "conteo area cliente";
echo "<br><br>";
var_dump($_CDCliente,"<br>",
$_DCliente,"<br>",
$_NNCliente,"<br>",
$_ACliente,"<br>",
$_CACliente);
echo "<br><br>";
echo "conteo area compañero";
echo "<br><br>";
var_dump($_CDCompanero,"<br>",
$_DCompanero,"<br>",
$_NNCompanero,"<br>",
$_ACompanero,"<br>",
$_CACompanero);
echo "<br><br>";
echo "conteo area subordinado";
echo "<br><br>";
var_dump($_CDSubordinado,"<br>",
$_DSubordinado,"<br>",
$_NNSubordinado,"<br>",
$_ASubordinado, "<br>",
$_CASubordinado);
echo "<br><br>";
echo "conteo area autoevaluacion";
echo "<br><br>";
var_dump($_CDAutoevaluacion,"<br>",
$_DAutoevaluacion ,"<br>",
$_NNAutoevaluacion,"<br>",
$_AAutoevaluacion ,"<br>",
$_CAAutoevaluacion);
echo '<br><br><br>';
echo $_categoria['categoria'];
die();
*/

$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 20,
	'margin_left' => 10,
	'margin_right' => 10,
	'mirrorMargins' => true
]);


$plantilla =getPlantilla($p,$_categoria,$_usuario,$_conteo,$_conteo_jefe,$_conteo_Cliente,$_conteo_Companero,$_conteo_Subordinado,$_conteo_Autoevaluacion,$_preguntas,$_justificacionesJefe,$_justificacionesCliente,$_justificacionesCompanero,$_justificacionesSubordinado,$_justificacionesAutoevaluacion,$_idPreguntas,$_CDJefe,$_DJefe,$_NNJefe,$_AJefe,$_CAJefe,$_CDCliente,$_DCliente,$_NNCliente,$_ACliente,$_CACliente,$_CDCompanero,$_DCompanero,$_NNCompanero,$_ACompanero,$_CACompanero, $_CDSubordinado,$_DSubordinado,$_NNSubordinado,$_ASubordinado, $_CASubordinado, $_CDAutoevaluacion,$_DAutoevaluacion, $_NNAutoevaluacion,$_AAutoevaluacion,$_CAAutoevaluacion,$_preguntasTC,$_justificacionesJefeTC,$_justificacionesClienteTC,$_justificacionesCompaneroTC,$_justificacionesSubordinadoTC,$_justificacionesAutoevaluacionTC,$_idPreguntasTC,$_CDJefeTC,$_DJefeTC,$_NNJefeTC,$_AJefeTC,$_CAJefeTC,$_CDClienteTC,$_DClienteTC,$_NNClienteTC,$_AClienteTC,$_CAClienteTC,$_CDCompaneroTC,$_DCompaneroTC,$_NNCompaneroTC,$_ACompaneroTC,$_CACompaneroTC,$_CDSubordinadoTC,$_DSubordinadoTC, $_NNSubordinadoTC,$_ASubordinadoTC, $_CASubordinadoTC, $_CDAutoevaluacionTC,$_DAutoevaluacionTC, $_NNAutoevaluacionTC,$_AAutoevaluacionTC, $_CAAutoevaluacionTC);


//var_dump($plantilla);die();


$mpdf->writeHtml( $css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml( $plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

foreach($_usuario as $usuario){
        $iduser = $usuario['idu'];
        $nombre = $usuario['nombre'];
        $area = $usuario['area'];
    }

$name_doc = 'Evaluacion-360('.$nombre.').pdf';
$mpdf -> Output($name_doc,"I");

//echo $plantilla;
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>
