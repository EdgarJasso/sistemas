<?php 
session_start();
if (isset($_SESSION['log']) && $_SESSION['log'] == true){

function getPlantilla($info){
  foreach( $info as $cambio){
  $plantilla='<div class="contenedor">

  <div class="logo">
      <img src="../img/new logo.png" alt="logo">
  </div>

  <div class="titulo">
      <h1>
          SOLICITUD DE SOPORTE TÉCNICO
      </h1>
      <h3>
          Area de Sistemas
      </h3>
  </div>

  <div class="datos_previos">
      <h3 class="destacado">
          Datos de solicitud
      </h3>
      <table>
          <tr>
              <td class="destacado"> Area: </td>
              <td> '.$cambio["area"].' </td>
          </tr>
          <tr>
              <td class="destacado"> Nombre del Empleado: </td>
              <td> '.$cambio["nombre"].' '.$cambio["apellido"].' </td>
          </tr>
          <tr>
              <td class="destacado"> Fecha: </td>
              <td> '.$cambio["fecha"].' </td>
          </tr>
          <tr>
              <td class="destacado"> Servicio: </td>
              <td> '.$cambio["servicio"].' </td>
          </tr>
          <tr>
              <td colspan="2" class="destacado">
                  Detalles del incidente previos:
              </td>
          </tr>
          <tr>
              <td colspan="2">
              '.$cambio["comentarios_peticion"].'
              </td>
          </tr>
      </table>
  </div>

  <div class="datos_post">
      <h3  class="referencia">
          Datos del soporte
      </h3>
      <table>
          <tr>
              <td  class="referencia"> Encargado: </td>
              <td> '.$cambio["encargado"].' </td>
          </tr>
          <tr>
              <td  class="referencia"> Estado: </td>
              <td> '.$cambio["estado"].' </td>
          </tr>
          <tr>
              <td  class="referencia"> Fecha: </td>
              <td> '.$cambio["fecha_bit"].' </td>
          </tr>
          <tr>
              <td colspan="2"  class="referencia">
                  Anotaciones:
              </td>
          </tr>
          <tr>
              <td colspan="2">
              '.$cambio["comentarios_bit"].'
              </td>
          </tr>
      </table>
  </div>

  <div class="visto">
      <div class="encargado">
          <span>
              __________________________
          </span><br>
          <span>
          '.$cambio["encargado"].'
          </span>
      </div>
      <div class="empleado">
          <span>
              __________________________
          </span><br>
          <span>
          '.$cambio["nombre"].' '.$cambio["apellido"].'
          </span>
      </div>
  </div>

</div>'; }
return $plantilla;
}
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/BITACORA";</script>';
}
?>
           