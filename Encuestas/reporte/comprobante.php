<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
ob_start();
$r= $_POST['id'];
$p = $_POST['periodo'];
require_once('vendor/autoload.php');
//plantilla html
require_once('plantilla/reporte/comprobante.php');
//plantilla php
require_once('../php/registro.php');
//codigo css de la plantilla 
$css = file_get_contents('plantilla/reporte/style_comprobante.css');


$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 20,
	'margin_left' => 10,
	'margin_right' => 10,
	'mirrorMargins' => true
]);

$_evaluados = array();
$_evaluados =  getregistros($r, $p); 
$plantilla =getPlantilla($_evaluados);

$mpdf->writeHtml( $css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml( $plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf -> Output("comprobante-final.pdf","I");
}else {
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
 }
?>