<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<div class="row"> 
 <div class="col-sm-12 table-responsive">
 <center><h2>Encuestas Faltantes</h2></center>
 <?php 
    include_once('../../../php/connection.php');
    try {
        $database = new Connection();
        $db = $database->open();
        $query = 'SELECT * from ecsnts_validacion, ecsnts_usuario WHERE ecsnts_validacion.Calificador ='.$_SESSION["id"].' AND ecsnts_usuario.id_usuario = ecsnts_validacion.Calificador';
        $stmt = $db->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $row = $stmt->rowCount();
        while ($fila = $dato = $stmt->fetch()) {
            $datos[] = $fila;
        }
        $db = null;                 
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage()." !<br>";
    }
    $html = '';
     if ($row > 0) {
        //var_dump($datos);die();
        $html.='
        <table class="table table-hover table-bordered table-condensed table-striped" id="faltantes">
            <thead>
              <tr> 
                <th>Periodo</th>
                <th>Area</th>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Persona</th>
                <th>Estado</th>
                <th>Accion</th>
              </tr>
            </thead>
            <tbody>';
        $contador = 0; $conta = 0;
        $link = 'encuesta';
        foreach ($datos as $imprimir) {
            $contador++;
            if($imprimir['Validacion']=='pendiente'){
                if($imprimir['Categoria'] == 'Seguridad'){$link="encuesta_v2";}else{$link="encuesta";}
                $html.='
                <tr>
                    <td>'.$imprimir['periodo'].'</td>
                    <td>'.$imprimir['Area'].'</td>
                    <td>'.$imprimir['Categoria'].'</td>
                    <td>'.$imprimir['tipo'].'</td>
                    <td>'.$imprimir['Nombre'].'</td>
                    <td class=" col-12 label label-danger">'.$imprimir['Validacion'].'</td>
                    <td>
                        <center>';
                        if ($imprimir['Categoria'] == 32) {
                            $html.='<button  type="button" id="" class="seguridad btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Contestar_s" data-validacion="'.$imprimir['Id_validacion'].'"><span class="icon-bubble"></span>&nbsp;Contestar</button>'; 
                        }else{
                            $html.='<button  type="button" id="" class="validacion btn btn-primary btn-sm boton-add color-p" data-toggle="modal" data-target="#Contestar" data-validacion="'.$imprimir['Id_validacion'].'"><span class="icon-bubble"></span>&nbsp;Contestar</button>'; 
                        }
                $html.='</center>
                    </td>
                </tr>';
            }else{
                $conta++;
                $html.='
                <tr>
                    <td>'.$imprimir['periodo'].'</td>
                    <td>'.$imprimir['Area'].'</td>
                    <td>'.$imprimir['Categoria'].'</td>
                    <td>'.$imprimir['tipo'].'</td>
                    <td>'.$imprimir['Nombre'].'</td>
                    <td class="col-12 label label-success">'.$imprimir['Validacion'].'</td>
                    <td></td>
                </tr>';   
            }
        }
        if($conta == $contador){ 
            $html.='
            <tr>
                <td colspan="7">
                <center><b><span> Haz concluido tus encuestas, por favor genera tu comprobante!</span></b>  <button  type="button" id="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#GeneraComprobanteIndividual">Ir&nbsp;<span class="icon-flag"></span></button></center>
            </td>
            <tr>';
            }else{
            $html.='';
        }
        $html.='</tbody>
                <tfoot>
                    <tr> 
                        <th>Periodo</th>
                        <th>Area</th>
                        <th>Categoria</th>
                        <th>Tipo</th>
                        <th>Persona</th>
                        <th>Estado</th>
                        <th>Accion</th>
                    </tr>
                </tfoot>
            </table>';
        echo $html;
    }else{
        echo '<div class="alert alert-info text-center text-caption font-weight-bold" role="alert"><h2>Por el momento no cuentas con encuestas asignadas</h2></div>';
    }?>
 </div>
</div>
<?php include('modal.php');?>

<script>
    $(document).ready( function () {
    $('#faltantes').DataTable({
		 dom: 'Bfrtip',
     "buttons":[                	
	   {
		   extend:    'excelHtml5',
		   text:      '<i class="icon-file-excel"></i>',
		   titleAttr: 'Excel'
	   },
	   {
		   extend:    'pdfHtml5',
		   text:      '<i class="icon-file-pdf"></i>',
		   titleAttr: 'PDF'
	   }
   ],
      "info": true,
      "pagingType": "full",
      "lengthMenu": [ 20, 50 ],
        "language":{
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
				"info": "Mostrando pagina _PAGE_ de _PAGES_",
				"infoEmpty": "No hay registros disponibles",
				"infoFiltered": "(filtrada de _MAX_ registros)",
				"loadingRecords": "Cargando...",
				"processing":     "Procesando...",
				"search": "Buscar:",
				"zeroRecords":    "No se encontraron registros coincidentes",
				"paginate": {
					"next":       "Siguiente",
					"previous":   "Anterior",
                     "first": "Inicio",
                     "last":"Fin"
				},					
        }
    });
  });
 </script>
 <script src="../../js/funciones-evaluacion.js"></script>
 <?php
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>