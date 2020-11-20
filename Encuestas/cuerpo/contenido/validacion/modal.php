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

 <!-- Modal de  Evaluacion-->
 <div class="modal fade" id="Contestar_s" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Evaluacion:</h4></center>
      </div>
      <div class="modal-body">
      <form id="evaluacion_datos_s">
        <div id="evaluacion_cuerpo_s" class="">
          
        </div>
        <br>
        <center><button type="submit" class="btn btn-primary" id="evaluacion_datos_s"><span class="icon-mail2"></span> Enviar</button></center>
      </form>
      </div>
      <div class="modal-footer">
        <center><span><b>Nota:</b> Si tocas afuera de la ventana o cierras la misma, el proceso se perdera!</span></center>
      </div>
    </div>
  </div>
</div>
<!-- Generar Comprobante -->  
<div class="modal fade" id="GeneraComprobanteIndividual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <center><h4 class="modal-title">Generador Comprobante:</h4></center>
      </div>
      <div class="modal-body">
       <!-- imprimir registro inicio-->
       <div class="form-group">
            <form action="../../reporte/comprobante.php" method="post">
                 <div class="form-group">
                     <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
                     <select name="periodo" id="" class="form-control" style="max-width:100px;">
                            <?php for ($i=20; $i <=30 ; $i++) { 
                            echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
                            echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
                            }?>
                     </select>
                 </div>
                     
                <button class="btn btn-info" type="submit"><span class="icon-download2"></span>Generar</button>
            </form>
            </div>
            <!-- imprimir registro fin-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" id="">Cerrar</button>
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