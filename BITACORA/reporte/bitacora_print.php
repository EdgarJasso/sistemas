<?php 
session_start();
if(isset($_SESSION['log']) && $_SESSION['log'] == true){
ob_start();
$id= $_GET['id'];
require_once('vendor/autoload.php');
//plantilla html
require_once('plantilla/reporte/bitacora_p.php');
//plantilla php
require_once('../php/bitacora.php');
//codigo css de la plantilla 
$css = file_get_contents('plantilla/reporte/style.css');


$info = getInfoBitacora($id);

$mpdf = new \Mpdf\Mpdf([
    'margin_top' => 20,
	'margin_left' => 10,
	'margin_right' => 10,
	'mirrorMargins' => true
]);

$plantilla =getPlantilla($info);

$mpdf->writeHtml( $css, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->writeHtml( $plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf -> Output("bitacora.pdf","D");

}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    header('Location: http://localhost/bitacora/');
}
?>
