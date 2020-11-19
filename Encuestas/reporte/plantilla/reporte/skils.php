<?php  

function getPlantilla($_usuario, $_conteo, $_preguntas, $_justificaciones, $_idPreguntas, $_CD, $_D, $_NN, $_A, $_CA, $_preguntasTC, $_justificacionesTC, $_idPreguntasTC, $_CDTC, $_DTC, $_NNTC, $_ATC, $_CATC){
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
        <div>Circuito Economistas 31A,<br/> Edo. México 54085, MX</div>
      </div>
      <br>
      <div id="project">
        <div><span>Datos de impresion:</span> </div>';
        $plantilla.='
        <div><span>Fecha: </span>"'; 
        $plantilla.= date("d-m-Y"); 
        $plantilla.='"</div>
        <div><span>Hora: </span>"'; 
        $plantilla.= $hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
        $plantilla.='"</div>
     </div><br><br><br><br>';
    
    foreach($_usuario as $usuario){
        $iduser = $usuario['idu'];
        $nombre = $usuario['nombre'];
        $area = $usuario['area'];
    }
    
    foreach($_conteo as $conteo){
        $con = $conteo['conteo'];
    }
    
    $plantilla.='<div class="cabezera">
     <div class="user"> 
       <b>Id Usuario:</b> '.$iduser.' <br>
       <b>Nombre:</b> '.$nombre.' <br>
       <b>Area:</b> '.$area.' <br>
     </div>
     <div class="conteo"> 
       <b>No. veces Evaluado:</b> '.$con.'
     </div>
    </div><br><br>';
    
    $promedio = array();   $promedioTC = array();
  
     $plantilla.='<div class="preguntas-tc">';
      $plantilla.='<div class="centro">Evaluacion Corporativa</div>';
    for($i=0; $i< count($_idPreguntasTC); $i++){
     $plantilla.='
     <div class="enlazado">
       <div class="question">
        <p class="texto-qt">
         <b>Codigo: </b>'.$_preguntasTC[$i]["codigo"].'
         &nbsp;&nbsp;
         <b>Competencia: </b>'.$_preguntasTC[$i]["nom_comp"].'
        </p>
        <p class="texto-qt">
          <b> Area:</b>'.$_preguntasTC[$i]["nom_area"].'
           &nbsp;&nbsp;
          <b>Categoria:</b>'.$_preguntasTC[$i]["categoria"].'</p>
         <p class="texto-qt"><b>Pregunta:</b> '.$_preguntasTC[$i]["descri"].'</p>
       </div>
       
       <div class="estadisticas">
        <table>
          <thead>
           <tr>
            <th>Respuesta</th>
            <th>No.veces</th>
            <th>Escala</th>
            <th>Puntos</th>
           </tr>
          </thead>
          <tbody>
           <tr>
             <td>Completamente en Desacuerdo</td>
             <td>'.$_CDTC[$i].'</td>
             <td>1</td>
             <td>';
       $TOTALTC = 0;
       $localTC= $_CDTC[$i] * 1 ;
       $TOTALTC = $TOTALTC + $localTC;
       $plantilla.=$localTC.'
             </td>
           </tr>
           <tr>
             <td>No estoy de acuerdo</td>
             <td>'.$_DTC[$i].'</td>
             <td>3</td>
             <td>';
       $localTC= $_DTC[$i] * 2 ;
        $TOTALTC = $TOTALTC + $localTC;
       $plantilla.=$localTC.'
             </td>
           </tr>
           <tr>
             <td>Ni acuerdo - Ni en desacuerdo</td>
             <td>'.$_NNTC[$i].'</td>
             <td>3</td>
             <td>';
       $localTC= $_NNTC[$i] * 3 ;
        $TOTALTC = $TOTALTC + $localTC;
       $plantilla.=$localTC.'
             </td>
           </tr>
           <tr>
             <td>De acuerdo</td>
             <td>'.$_ATC[$i].'</td>
             <td>4</td>
             <td>';
       $localTC= $_ATC[$i] * 4 ;
       $TOTALTC = $TOTALTC + $localTC;
        $plantilla.=$localTC.'
             </td>
           </tr>
           <tr>
             <td>Completamente de Acuerdo</td>
             <td>'.$_CATC[$i].'</td>
             <td>5</td>
             <td>';
       $localTC= $_CATC[$i] * 5 ;
        $TOTALTC = $TOTALTC + $localTC;
       $plantilla.=$localTC.'
             </td>
           </tr>
           <tr>
            <td colspan="3"><b>Total</b></td>
            <td><b>'.$TOTALTC.' / ';
            $totalTC = 5 * $con;
       $plantilla.=$totalTC.'
          </b></td>
           </tr>
          </tbody>
         </table>
       </div>
       <div class="justificaciones">
       <p style="font-size:14px;"><b>Justificaciones</b></p>';
       for($j=0; $j < count($_justificacionesTC) ;$j++){
           if($_preguntasTC[$i]["idp"] == $_justificacionesTC[$j]["idp"] ){
        
      // <p class="texto-qt"><b>Registro:</b> '.$_justificaciones[$j]["registro"].'&nbsp;&nbsp;<b>Id Pregunta:</b> '.$_justificaciones[$j]["idp"].'&nbsp;&nbsp; <b>Respuesta:</b> '.$_justificaciones[$j]["respuesta"].'<p><b>Justificacion:</b>
        $plantilla.='
       <div class="texto-j">
           '.$_justificacionesTC[$j]["justificacion"].'</div><br>
       ';}}
        $plantilla.='</div>';
        $proTC = ($TOTALTC * 100) / $totalTC;
        $tempoTC = substr( $proTC, 0, 4);
       $promedioTC[$i]["promedio"] = $tempoTC;
         
     $plantilla.='<div class="promed"><b>Promedio de Cumplimiento de competencia: </b> '.$tempoTC.'%</div></div><br>';
    } 
   
    $NivelTC= array(); $Nivel=array();
    $plantilla.='
     <div class="Resultados">
     <h2>Resultados de competencias</h2>
     <table>
            <thead>
              <tr>
              <th>Competencia</th>
              <th>Nombre</th>
              <th>Resultado</th>
              <th>Nivel</th>
             </tr>
           </thead>
           <tbody>';
              for($i=0; $i< count($_idPreguntasTC); $i++){
    $plantilla.='<tr>
                   <td>'.$_preguntasTC[$i]["codigo"].'</td>
                   <td>'.$_preguntasTC[$i]["nom_comp"].'</td>
                   <td>'.$promedioTC[$i]["promedio"].'%</td>
                   <td>';
                  if($promedioTC[$i]["promedio"] >= 90){
                      $NivelTC[$i]["nivel"] = "E";
                  }elseif($promedioTC[$i]["promedio"] >= 71 && $promedioTC[$i]["promedio"] <=89){
                      $NivelTC[$i]["nivel"] = "N";
                  }elseif($promedioTC[$i]["promedio"] >= 60 && $promedioTC[$i]["promedio"] <=70){
                      $NivelTC[$i]["nivel"] = "S";
                  }elseif($promedioTC[$i]["promedio"] >= 0 && $promedioTC[$i]["promedio"] <=59){
                      $NivelTC[$i]["nivel"] = "D";
                  }
                  
                 $plantilla.=$NivelTC[$i]["nivel"].'</td>
               </tr>';
              }
           $plantilla.='</tbody>
        </table></div>
        <br><br><br>
        <div class="Acotacion">
     <h2>Nivel de desempeño</h2>
     <table>
            <thead>
              <tr>
              <th>Valor</th>
              <th>Rango</th>
              </tr>
           </thead>
           <tbody>
           <tr>
            <td> E = Excelente</td>
            <td> 90-100</td>
          </tr>
          <tr>
            <td> N = Notable</td>
            <td> 71-89</td>
          </tr>
          <tr>
            <td> S = Satisfecho</td>
            <td> 60-70</td>
          </tr>
          <tr>
            <td> D = Deficiente</td>
            <td> 0-59</td>
          </tr>
          </tbody>
        </table></div></div>';
    
     $plantilla.='</div><br><br><br><br>';
    
    $plantilla.='<br><br><br>
    
    <div class="graficos-auto">
    <center><h2>Graficos de competencias</h2></center>
       ';
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        '.$_preguntasTC[$i]["codigo"].'  -  '.$promedioTC[$i]["promedio"].'%
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'. $NivelTC[$i]["nivel"].' " style="width: '.$promedioTC[$i]["promedio"].'%;">'.$_preguntasTC[$i]["nom_comp"].'</div>
         </div><br>';        
    }
    
    $plantilla.='<br>
    <div class="graficos-codigo">
    Competencia
    </div>
    <div class="graficos-cabezera">
        <div class="grafico-cab-1"> D </div>
        <div class="grafico-cab-2"> S </div>
        <div class="grafico-cab-3"> N </div>
        <div class="grafico-cab-4"> E </div>
       </div></div>'; 
    //aqui graficos
    $plantilla.='<br><div class="preguntas-area">';
     $plantilla.='<div class="centro">Evaluacion del desempeño del Cargo</div>';
   for($i=0; $i< count($_idPreguntas); $i++){
     $plantilla.='
     <div class="enlazado">
       <div class="question">
        <p class="texto-qt">
         <b>Codigo: </b>'.$_preguntas[$i]["codigo"].'
         &nbsp;&nbsp;
         <b>Competencia: </b>'.$_preguntas[$i]["nom_comp"].'
        </p>
        <p class="texto-qt">
          <b> Area:</b>'.$_preguntas[$i]["nom_area"].'
           &nbsp;&nbsp;
          <b>Categoria:</b>'.$_preguntas[$i]["categoria"].'</p>
         <p class="texto-qt"><b>Descripcion:</b> '.$_preguntas[$i]["descri"].'</p>
       </div>
       
       <div class="estadisticas">
        <table>
          <thead>
           <tr>
            <th>Respuesta</th>
            <th>No.veces</th>
            <th>Escala</th>
            <th>Puntos</th>
           </tr>
          </thead>
          <tbody>
           <tr>
             <td>Completamente en Desacuerdo</td>
             <td>'.$_CD[$i].'</td>
             <td>1</td>
             <td>';
       $TOTAL = 0;
       $local= $_CD[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
       $plantilla.=$local.'
             </td>
           </tr>
           <tr>
             <td>No estoy de acuerdo</td>
             <td>'.$_D[$i].'</td>
             <td>2</td>
             <td>';
       $local= $_D[$i] * 2 ;
       $TOTAL = $TOTAL + $local;
       $plantilla.=$local.'
             </td>
           </tr>
           <tr>
             <td>Ni acuerdo - Ni en desacuerdo</td>
             <td>'.$_NN[$i].'</td>
             <td>3</td>
             <td>';
       $local= $_NN[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       $plantilla.=$local.'
             </td>
           </tr>
           <tr>
             <td>De acuerdo</td>
             <td>'.$_A[$i].'</td>
             <td>4</td>
             <td>';
       $local= $_A[$i] * 4 ;
       $plantilla.=$local.'
             </td>
           </tr>
           <tr>
             <td>Completamente de Acuerdo</td>
             <td>'.$_CA[$i].'</td>
             <td>5</td>
             <td>';
       $local= $_CA[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       $plantilla.=$local.'
             </td>
           </tr>
           <tr>
            <td colspan="3"><b>Total</b></td>
            <td><b>'.$TOTAL.' / ';
            $total = 5 * $con;
       $plantilla.=$total.'
          </b></td>
           </tr>
          </tbody>
         </table>
       </div>
       <div class="justificaciones">
      <p style="font-size:14px;"><b>Justificaciones</b></p>';
       for($j=0; $j < count($_justificaciones) ;$j++){
           if($_preguntas[$i]["idp"] == $_justificaciones[$j]["idp"] ){
        
      // <p class="texto-qt"><b>Registro:</b> '.$_justificaciones[$j]["registro"].'&nbsp;&nbsp;<b>Id Pregunta:</b> '.$_justificaciones[$j]["idp"].'&nbsp;&nbsp; <b>Respuesta:</b> '.$_justificaciones[$j]["respuesta"].'<p><b>Justificacion:</b>
        $plantilla.='
       <div class="texto-j">
           '.$_justificaciones[$j]["justificacion"].'</div><br>
       ';}}
        $plantilla.='</div>';
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $promedio[$i]["promedio"] = $tempo;
         
     $plantilla.='<div class="promed"><b>Promedio de Cumplimiento de competencia: </b> '.$tempo.'%</div></div><br>';
    }
     
    $plantilla.='
     <div class="Resultados">
     <h2>Resultados de competencias</h2>
     <table>
            <thead>
              <tr>
              <th>Competencia</th>
              <th>Nombre</th>
              <th>Resultado</th>
              <th>Nivel</th>
             </tr>
           </thead>
           <tbody>';
              for($i=0; $i< count($_idPreguntas); $i++){
    $plantilla.='<tr>
                   <td>'.$_preguntas[$i]["codigo"].'</td>
                   <td>'.$_preguntas[$i]["nom_comp"].'</td>
                   <td>'.$promedio[$i]["promedio"].'%</td>
                   <td>';
                  if($promedio[$i]["promedio"] >= 90){
                       $Nivel[$i]["nivel"]= "E";
                  }elseif($promedio[$i]["promedio"] >= 71 && $promedio[$i]["promedio"] <=89){
                      $Nivel[$i]["nivel"] = "N";
                  }elseif($promedio[$i]["promedio"] >= 60 && $promedio[$i]["promedio"] <=70){
                      $Nivel[$i]["nivel"] = "S";
                  }elseif($promedio[$i]["promedio"] >= 0 && $promedio[$i]["promedio"] <=59){
                     $Nivel[$i]["nivel"]= "D";
                  }
                  
                 $plantilla.=$Nivel[$i]["nivel"].'</td>
               </tr>';
              }
           $plantilla.='</tbody>
        </table></div>
        <br><br><br>
        <div class="Acotacion">
     <h2>Nivel de desempeño</h2>
     <table>
            <thead>
              <tr>
              <th>Valor</th>
              <th>Rango</th>
              </tr>
           </thead>
           <tbody>
           <tr>
            <td> E = Excelente</td>
            <td> 90-100</td>
          </tr>
          <tr>
            <td> N = Notable</td>
            <td> 71-89</td>
          </tr>
          <tr>
            <td> S = Satisfecho</td>
            <td> 60-70</td>
          </tr>
          <tr>
            <td> D = Deficiente</td>
            <td> 0-59</td>
          </tr>
          </tbody>
        </table></div></div>';
    
    
    $plantilla.='
    <center><h2>Graficos de competencias</h2></center>
    <div class="graficos-auto">
       ';
    for($i=0; $i< count($_idPreguntas); $i++){
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        '.$_preguntas[$i]["codigo"].'  -  '.$promedio[$i]["promedio"].'%
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'. $Nivel[$i]["nivel"].' " style="width: '.$promedio[$i]["promedio"].'%;"> '.$_preguntas[$i]["nom_comp"].'</div>
         </div><br>';        
    }
    $plantilla.='<br>
    <div class="graficos-codigo">
    Competencia
    </div>
    <div class="graficos-cabezera">
        <div class="grafico-cab-1"> D </div>
        <div class="grafico-cab-2"> S </div>
        <div class="grafico-cab-3"> N </div>
        <div class="grafico-cab-4"> E </div>
       </div></div>'; 
    
return $plantilla;
}

?>
          
           