<?php
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
 <!-- Modal de  Evaluacion-->
 <div class="modal fade" id="Contestar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Evaluacion:</h4></center>
      </div>
      <div class="modal-body">
      <form id="evaluacion_datos">
        <div id="evaluacion_cuerpo" class="">
          

        </div>
        <br>
        <center><button type="submit" class="btn btn-primary" id="enviar_datos"><span class="icon-mail2"></span> Enviar</button></center>
      </form>
      </div>
      <div class="modal-footer">
        <center><span><b>Nota:</b> Si tocas afuera de la ventana o cierras la misma, el proceso se perdera!</span></center>
      </div>
    </div>
  </div>
</div>
<?php
}else{
  echo "Inicia Sesion para acceder a este contenido.<br>";
  include '../../../dominio.php';
  echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>