<?php 
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
function getPlantilla($registro, $_usuario, $_evaluado, $_fecha, $_periodo){
 date_default_timezone_set('America/Mexico_City');
   $fechaActual=time();
    $hoy = getdate();
    foreach($_usuario as $cambio){
      $_IDU = $cambio["id_u"];
      $_NU = $cambio["nombre"];
      $_AU = $cambio["area"];
  }
  foreach($_evaluado as $change){
      $_IDE = $change["id_u"];
      $_NE = $change["nombre"];
      $_AE = $change["area"];
  }
  foreach($_fecha as $_f){
      $_fecha_ = $_f["fecha"];
  }
  foreach($_periodo as $_p){
    $_periodo_ = $_p["periodo"];
}
    $plantilla='
      <div class="logo">
        <center>
          <div class="int_logo">
            <img src="img/logo.png" style=" width:80%;">
          </div>
        </center>
      </div>
      
      <div class="cabeza">

        <div class="izq">
            <div id="project">
            <br>
              <div><span><b>Datos de Impresion:</b> </span> </div>
              <span>Grupo Cryo</span>
              <div>
                Circuito Economistas 31A,<br /> Edo. México 54085, MX</span>
                <br>';
                $plantilla.='
                <div><br><span>Fecha: </span>"'; 
                $plantilla.=date("d-m-Y"); 
                $plantilla.='"</div>
                <div><span>Hora: </span>"'; 
                $plantilla.= $hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
                $plantilla.='"</div>
              </div>
            </div>
          </div>
          <div class="der">
          <h3>Encuesta Realizada:</h3>
          <div class="contesto_c">
            <div class="texto_c">
            <span class="Etiqueta_c">Contesto:</span>&nbsp;'.$_NU.'
            &nbsp; &nbsp;
            <span class="Etiqueta_c">Area:</span>&nbsp;&nbsp;'.$_AU.'</div>
            <div class="texto_c">
            <span class="Etiqueta_c">Evaluado: </span>&nbsp;'.$_NE.'
            &nbsp; &nbsp;
            <span class="Etiqueta_c">Area:</span>&nbsp;&nbsp;'.$_AE.'</div>
            <br>
            <div class="texto_c">
            <span class="Etiqueta_c">Fecha / Hora de realización: </span>&nbsp;&nbsp;&nbsp;&nbsp;'.$_fecha_.'
            </div>
            <div class="texto_c">
            <span class="Etiqueta_c">Periodo: </span>&nbsp;&nbsp;&nbsp;&nbsp;'.$_periodo_.'
            </div>
             </div>
          </div>
        </div>';
    
    $plantilla.= '
    <div class="cuerpo">
      <center><h3>Respuestas Encontradas:</h3></center>

      <div class="contenedor-p">'; 
    $c=0;
    $plantilla.='<div class="centrar">';
    foreach($registro as $remplazo){
        $c++;
     $plantilla.='
     <div class="texto">
       <span class="Etiqueta">No. Respuesta:</span>&nbsp;&nbsp;'.$remplazo["idrespuesta"].' &nbsp; &nbsp;<span class="Etiqueta">No. Registro:</span>&nbsp;&nbsp;'.$remplazo["registro"].' &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<span class="Etiqueta">No. Pregunta:</span>&nbsp;&nbsp;'.$remplazo["pregunta"].' &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <span class="Etiqueta">Categoria:</span>&nbsp;&nbsp;'.$remplazo["categoria"].' &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <br><br>
      
      <span class="Etiqueta">Pregunta:</span>&nbsp;&nbsp;¿'.$remplazo["descripcion"].'? &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <br><br>
      
      <span class="Etiqueta">Respuesta:</span>&nbsp;&nbsp;'.$remplazo["respuesta"].'&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
      <span class="Etiqueta">Justificacion:</span>&nbsp;&nbsp;'.$remplazo["justificacion"].'<br><br></div>';
    } $plantilla.='</div>';
    
    
  $plantilla.='</div>
  <h3>Total de respuetas:'.$c.'</h3>
  </div>';
return $plantilla;
}
} else {
  echo "Inicia Sesion para acceder a este contenido.<br>";
  echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
exit;
}
?>
           