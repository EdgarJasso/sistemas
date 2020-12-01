<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
$r= $_POST['id'];
require_once('../../vendor/autoload.php');
//datos desde php
require_once('../php/registro.php');
//plantilla html
require_once('plantilla/reporte/p_registro.php');
//codigo css de la plantilla 
$css = file_get_contents('plantilla/reporte/style_registro.css');


$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 10,
	'margin_left' => 10,
	'margin_right' => 10,
	'mirrorMargins' => true
]);

$_Arreglo = array(); 
$_Arreglo = getArreglo($r);
$_usuario =  getUsuario($r);
$_evaluado =  getEvaluado($r);
$_fecha = getfecha($r);
$_periodo = getPeriodo($r);
//var_dump($_periodo);die();

    

$plantilla =getPlantilla($_Arreglo, $_usuario, $_evaluado, $_fecha, $_periodo);

$mpdf->writeHtml( $css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml( $plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf -> Output("Reporte_del_Registro(".$r.").pdf","D");
} else {
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
 exit;
 }
?>
