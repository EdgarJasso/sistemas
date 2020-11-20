<?php 

function getPlantilla($_evaluados){
    
    date_default_timezone_set('America/Mexico_City');
   $hoy = getdate();
   $fechaActual=time();
    
    
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
             <div><span>Periodo: </span>'.$_evaluados[0]['periodo'].'
           </div>
         </div>
       </div>
     </div>
     ';
     
     
     $plantilla.='<div id="comprobante">
        <center><h2>Encuestas Realizadas Correctamente</h2></center>
    <center><h4>Numeros de Registro:</h4></center>';
    $i=1;
        foreach( $_evaluados as $cambio){
         $plantilla.=' 
         <div class="texto">
         Encuesta No.'.$i.' -                                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <b class="espacio">No.Registro:</b><span>'.$cambio["idr"].'</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <b class="espacio">Area:</b><span>'.$cambio['area'].'</span>       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <b class="espacio">Categoria:</b><span>'.$cambio['categoria'].'</span>
         </div> ';
            $i++;
    }  
      
       $plantilla.='</div>';  
return $plantilla;
}

?>
           