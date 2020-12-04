<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
$r= $_POST['id'];
$p = $_POST['periodo'];
require_once('../../vendor/autoload.php');
//consultas
require_once('../php/skils.php');
//plantilla html
require_once('plantilla/reporte/skils.php');
//codigo css de la plantilla 
$css = file_get_contents('plantilla/reporte/estilos.css');

//traemos datos 
$_usuario = array();
$_usuario = getUsuario($r);
$_categoria = array();
$_categoria = getcategoria($r,$p);
$_conteo = array();
$_conteo = getConteo($r,$p);
$_preguntas = array();
$_preguntas = getPreguntas($r,$p);
$_justificaciones = array();
$_justificaciones = getJusficaciones($r,$p);
$_idPreguntas = array();
$_idPreguntas = getIdPreguntas($r,$p);


$_preguntasTC = array();
$_preguntasTC = getPreguntasTC($r);
$_justificacionesTC = array();
$_justificacionesTC = getJusficacionesTC($r,$p);
$_idPreguntasTC = array();
$_idPreguntasTC = getIdPreguntasTC($r,$p);

$_CD = array();$_CDTC = array();
$_D = array();$_DTC = array();
$_NN = array();$_NNTC = array();
$_A = array();$_ATC = array();
$_CA = array();$_CATC = array();

foreach($_idPreguntas as $id_pre){
 
   $_CD[] = getconteoCD( $id_pre['id_pregunta'], $r,$p);
  
   $_D[] = getconteoDJ( $id_pre['id_pregunta'], $r,$p);
   
   $_NN[] = getconteoNN( $id_pre['id_pregunta'], $r,$p);
   
   $_A []= getconteoA( $id_pre['id_pregunta'], $r,$p);
  
   $_CA []= getconteoCA( $id_pre['id_pregunta'], $r,$p);
}
foreach($_idPreguntasTC as $id_pre){
 
   $_CDTC[] = getconteoCD( $id_pre['id_pregunta'], $r,$p);
  
   $_DTC[] = getconteoDJ( $id_pre['id_pregunta'], $r,$p);
   
   $_NNTC[] = getconteoNN( $id_pre['id_pregunta'], $r,$p);
   
   $_ATC []= getconteoA( $id_pre['id_pregunta'], $r,$p);
  
   $_CATC []= getconteoCA( $id_pre['id_pregunta'], $r,$p);
}
//echo "area";echo "<p>datos usuario</p>";var_dump($_usuario); echo "<br><br>";echo "categoria";echo "<p>datos de categoria</p>";var_dump($_categoria); echo "<br><br>";echo "<p>numero de respuestas</p>";var_dump($_conteo); echo "<br><br>";echo "<p>preguntas correspondientes</p>";var_dump($_preguntas); echo "<br><br>";echo "<p>datos de respuestas / justificaciones</p>";var_dump($_justificaciones); echo "<br><br>";echo "<p>preguntas del area</p>";var_dump($_idPreguntas); echo "<br><br>";echo "datos graficos";echo "<p>CD</p>";var_dump($_CD); echo "<br>";echo "<p>D</p>";var_dump($_D); echo "<br>";echo "<p>NN</p>";var_dump($_NN); echo "<br>";echo "<p>A</p>";var_dump($_A); echo "<br>";echo "<p>CA</p>";var_dump($_CA); echo "<br>";
//echo "<br>";
//echo "TC-------";echo "<p>preguntas correspondientes</p>";var_dump($_preguntasTC); echo "<br><br>";echo "<p>datos de respuestas / justificaciones</p>";var_dump($_justificacionesTC); echo "<br><br>";echo "<p>preguntas del area</p>";var_dump($_idPreguntasTC); echo "<br><br>";echo "datos graficos";echo "<p>CD</p>";var_dump($_CDTC); echo "<br>";echo "<p>D</p>";var_dump($_DTC); echo "<br>";echo "<p>NN</p>";var_dump($_NNTC); echo "<br>";echo "<p>A</p>";var_dump($_ATC); echo "<br>";echo "<p>CA</p>";var_dump($_CATC); echo "<br>";die();


$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 20,
	'margin_left' => 10,
	'margin_right' => 10,
	'mirrorMargins' => true
]);


$plantilla =getPlantilla($p, $_usuario, $_categoria, $_conteo, $_preguntas, $_justificaciones, $_idPreguntas, $_CD, $_D, $_NN, $_A, $_CA, $_preguntasTC, $_justificacionesTC, $_idPreguntasTC, $_CDTC, $_DTC, $_NNTC, $_ATC, $_CATC);


//var_dump($plantilla);die();


$mpdf->writeHtml( $css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml( $plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

foreach($_usuario as $usuario){
        $iduser = $usuario['idu'];
        $nombre = $usuario['nombre'];
        $area = $usuario['area'];
    }

$name_doc = 'Evaluacion-('.$nombre.').pdf';
$mpdf -> Output($name_doc,"I");
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>

