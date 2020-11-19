<?php 

function getPlantilla($r, $_evaluado, $_Fecha){
    
    date_default_timezone_set('America/Mexico_City');
   $hoy = getdate();
   $fechaActual=time();
    
    
    $plantilla='
      <h1><div class="logo">
     
      <div class="logo-1"><img src="img/cryoo.jpg" style=" width:80%;"></div>
      <div class="logo-2"><img src="img/360.png" ></div>
      
      </div></h1>
      
      <div id="company">
        <div>Grupo Cryo</div>
        <div>Circuito Economistas 31A,<br /> Edo. México 54085, MX</div>
      </div>
      <br>
      <div id="project">
        <div><span>Datos de la impresion: </span></div>';
        $plantilla.='
        <div><span>Fecha: </span>"'; 
        $plantilla.= date("d-m-Y"); 
        $plantilla.='"</div>
        <div><span>Hora: </span>"'; 
        $plantilla.= $hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
        $plantilla.='"</div>
     </div><br><br><br><br>
     <br><br><br><br>
     <div id="comprobante">
        <center><h2>Encuesta Realizada Correctamente</h2></center>';
        foreach( $_evaluado as $cambio){
         $plantilla.=' <h3>Area : '.$cambio["Area"].'</h3>    <h3> Categoria: '.$cambio["Categoria"].'</h3><br> ';
    }  foreach( $_Fecha as $remplazo){
       $plantilla.='<center><h3>Fecha / Hora de realizacion : '.$remplazo["fecha"].'</h3></center>'; 
    }
       $plantilla.='<center><h2>Numero de registro : '.$r.'</h2></center>
     </div>
     ';  
return $plantilla;
}

?>
           