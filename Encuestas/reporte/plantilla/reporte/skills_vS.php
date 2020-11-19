<?php  
function getPlantilla($_usuario,$_conteo,$_conteo_jefe,$_conteo_Cliente,$_conteo_Companero,$_conteo_Subordinado,$_conteo_Autoevaluacion,$_preguntas,$_justificacionesJefe,$_justificacionesCliente,$_justificacionesCompanero,$_justificacionesSubordinado,$_justificacionesAutoevaluacion,$_idPreguntas,$_CDJefe,$_DJefe,$_NNJefe,$_AJefe,$_CAJefe,$_CDCliente,$_DCliente,$_NNCliente,$_ACliente,$_CACliente,$_CDCompanero,$_DCompanero,$_NNCompanero,$_ACompanero,$_CACompanero, $_CDSubordinado,$_DSubordinado,$_NNSubordinado,$_ASubordinado, $_CASubordinado, $_CDAutoevaluacion,$_DAutoevaluacion, $_NNAutoevaluacion,$_AAutoevaluacion,$_CAAutoevaluacion,$_preguntasTC,$_justificacionesJefeTC,$_justificacionesClienteTC,$_justificacionesCompaneroTC,$_justificacionesSubordinadoTC,$_justificacionesAutoevaluacionTC,$_idPreguntasTC,$_CDJefeTC,$_DJefeTC,$_NNJefeTC,$_AJefeTC,$_CAJefeTC,$_CDClienteTC,$_DClienteTC,$_NNClienteTC,$_AClienteTC,$_CAClienteTC,$_CDCompaneroTC,$_DCompaneroTC,$_NNCompaneroTC,$_ACompaneroTC,$_CACompaneroTC,$_CDSubordinadoTC,$_DSubordinadoTC, $_NNSubordinadoTC,$_ASubordinadoTC, $_CASubordinadoTC, $_CDAutoevaluacionTC,$_DAutoevaluacionTC, $_NNAutoevaluacionTC,$_AAutoevaluacionTC, $_CAAutoevaluacionTC){
    
    
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
    $contador_competencias = 5;
    foreach($_usuario as $usuario){
        $iduser = $usuario['idu'];
        $nombre = $usuario['nombre'];
        $area = $usuario['area'];
    }
    foreach($_conteo as $conteo){
        $con = $conteo['conteo'];
    }
    
    $conteo_jefe = $_conteo_jefe[0]["conteo"];
    $conteo_Cliente = $_conteo_Cliente[0]["conteo"];
    $conteo_Companero = $_conteo_Companero[0]["conteo"];
    $conteo_Subordinado = $_conteo_Subordinado[0]["conteo"];
    $conteo_Autoevaluacion = $_conteo_Autoevaluacion[0]["conteo"];
    
    if( $conteo_jefe == 0){ 
        $conteo_jefe = 1;
        $contador_competencias--;
    }
     if(  $conteo_Cliente == 0){
        $conteo_Cliente = 1;
         $contador_competencias--;
    }
     if( $conteo_Companero == 0){
        $conteo_Companero = 1;
         $contador_competencias--;
    }
    if($conteo_Subordinado == 0){
        $conteo_Subordinado = 1;
        $contador_competencias--;
    }
    if( $conteo_Autoevaluacion == 0){
        $conteo_Autoevaluacion = 1;
        $contador_competencias--;
    }
   // $_conteo_jefe,$_conteo_Cliente,$_conteo_Companero,$_conteo_Subordinado,$_conteo_Autoevaluacion
    
    $plantilla.='<div class="cabezera">
     <div class="user"> 
       <b>Id Usuario:</b> '.$iduser.' <br>
       <b>Nombre:</b> '.$nombre.' <br>
       <b>Area:</b> '.$area.' <br>
     </div>
     <div class="conteo"> 
       <b>No. veces Evaluado:</b> '.$con.'
     </div>
    </div><br>';
//seccion de tronco comun aqui empieza
    $plantilla.='<div class="Tronco-Comun">';
    //aqui empieza seccion pregunta area de jefe
    $PromediosTCJefe= array();
     //var_dump(); die();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $TOTAL = 0;
        
       $local= $_CDJefeTC[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_DJefeTC[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNJefeTC[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_AJefeTC[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CAJefeTC[$i] * 5 ;
       $TOTAL = $TOTAL + $local;
       
        $total = 5 * $conteo_jefe;
        
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosTCJefe[$i]["promedio"] = $tempo;
    
    }
    //aqui termina seccion de area de jefe
    
    //aqui empieza seccion pregunta area de cliente
    $PromediosTCCliente= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $TOTAL = 0;
       
       $local= $_CDClienteTC[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_DClienteTC[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNClienteTC[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_AClienteTC[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
        
       $local= $_CAClienteTC[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       
     $total = 5 * $conteo_Cliente;
       
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosTCCliente[$i]["promedio"] = $tempo;
         
    }
    //aqui termina seccion de area de cliente
    
    //aqui empieza seccion pregunta area de compañero
    $PromediosTCCompanero= array();
     
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $TOTAL = 0;
    
       $local= $_CDCompaneroTC[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_DCompaneroTC[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNCompaneroTC[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_ACompaneroTC[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CACompaneroTC[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
      
      $total = 5 * $conteo_Companero;
      $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosTCCompanero[$i]["promedio"] = $tempo;
         
    }
    //aqui termina seccion de area de compañero
    
     //aqui empieza seccion pregunta area de Subordinado
    $PromediosTCSubordinado= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $TOTAL = 0;
 $local= $_CDSubordinadoTC[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
    
       $local= $_DSubordinadoTC[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_NNSubordinadoTC[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_ASubordinadoTC[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
        
       $local= $_CASubordinadoTC[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       
    $total = 5 * $conteo_Subordinado;
      
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosTCSubordinado[$i]["promedio"] = $tempo;
         
     }
    //aqui termina seccion de area de Subordinado
    
      //aqui empieza seccion pregunta area de AutoEvaluacion
    $PromediosTCAutoEvaluacion= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $TOTAL = 0;
       
       $local= $_CDAutoevaluacionTC[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
       $local= $_DAutoevaluacionTC[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNAutoevaluacionTC[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_AAutoevaluacionTC[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CAAutoevaluacionTC[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
      
    $total = 5 * $conteo_Autoevaluacion;
      
      
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosTCAutoEvaluacion[$i]["promedio"] = $tempo;
         
      }
    //aqui termina seccion de area de Autoevaluacion
    

    //acotacion
    $plantilla.='<div class="Acotacion">
     <h2>Nivel de desempeño</h2>
     <table>
            <thead>
              <tr>
              <th>Valor</th>
              <th>Rango</th>
              <th>Color</th>
              </tr>
           </thead>
           <tbody>
           <tr>
            <td> E = Excelente</td>
            <td> 90-100</td>
            <td style="background-color:rgba(48,255,0,0.5);"></td>
          </tr>
          <tr>
            <td> N = Notable</td>
            <td> 71-89</td>
            <td style="background-color:rgba(214,255,0,0.5);"></td>
          </tr>
          <tr>
            <td> S = Satisfecho</td>
            <td> 60-70</td>
            <td style="background-color:rgba(255,108,0,0.5);"></td>
          </tr>
          <tr>
            <td> D = Deficiente</td>
            <td> 0-59</td>
             <td style="background-color:rgba(255,0,0,0.5);"></td>>
          </tr>
          </tbody>
        </table></div><br><br><br><br><br><br><br><br><br><br><br>';
 //acotacion
    
    //estadisticas
    $CompetenciasTC = array();
    $AutoevaluacionTC = 0; $Autoevaluacion_sumaTC = array();
    $ClienteTC =0; $Cliente_sumaTC = array();
    $CompaneroTC = 0; $Companero_sumaTC = array();
    $SubordinadoTC = 0; $Subordinado_sumaTC = array();
    $JefeTC = 0; $Jefe_sumaTC = array();
    
    $plantilla.='<center><h2>Promedio de competencias corporativas</h2></center>
    <div class="estadistica">
     <table>
            <thead>
              <tr>
              <th>Competencia</th>
              <th>AutoEvaluacion</th>
              <th>Cliente</th>
              <th>Colaborador</th>
              <th>Subordinado</th>
              <th>Jefe</th>
              <th>Total</th>
              <th>Nivel</th>
              </tr>
           </thead>
           <tbody>';
    $TEMPO=0;$echo=0;
    for($i = 0; $i < count($_idPreguntasTC); $i++){
        $temporal = 
            $PromediosTCAutoEvaluacion[$i]["promedio"] + 
            $PromediosTCCliente[$i]["promedio"] +
            $PromediosTCCompanero[$i]["promedio"] + 
            $PromediosTCSubordinado[$i]["promedio"] +
            $PromediosTCJefe[$i]["promedio"];
        $TEMPO = $temporal / $contador_competencias ;
         $echo = substr( $TEMPO, 0, 4);
        $CompetenciasTC [$i]["promedio"] = $echo;
        
        
        
        if($CompetenciasTC[$i]["promedio"] >= 90){
                      $CompetenciasTC[$i]["nivel"] = "E";
                  }elseif($CompetenciasTC[$i]["promedio"] >= 71 && $CompetenciasTC[$i]["promedio"] <=89){
                      $CompetenciasTC[$i]["nivel"]= "N";
                  }elseif($CompetenciasTC[$i]["promedio"] >= 60 && $CompetenciasTC[$i]["promedio"] <=70){
                      $CompetenciasTC[$i]["nivel"] = "S";
                  }elseif($CompetenciasTC[$i]["promedio"] >= 0 && $CompetenciasTC[$i]["promedio"] <=59){
                      $CompetenciasTC[$i]["nivel"] = "D";
                  }
        
        $plantilla.='<tr style="height:20px;">
            <td>'.$_preguntasTC[$i]["nom_comp"].' ('.$_preguntasTC[$i]["codigo"].')</td>
            <td>'.$PromediosTCAutoEvaluacion[$i]["promedio"].'%</td>
            <td>'.$PromediosTCCliente[$i]["promedio"].'%</td>
            <td>'.$PromediosTCCompanero[$i]["promedio"].'%</td>
            <td>'.$PromediosTCSubordinado[$i]["promedio"].'%</td>
            <td>'.$PromediosTCJefe[$i]["promedio"].'%</td>
            <td>'.$CompetenciasTC[$i]["promedio"].'%</td>
            <td class="columna-'.$CompetenciasTC[$i]["nivel"].'">'.$CompetenciasTC[$i]["nivel"].'</td>
          </tr>';
        
        $Autoevaluacion_sumaTC [$i] = $PromediosTCAutoEvaluacion[$i]["promedio"];
        $Cliente_sumaTC[$i] = $PromediosTCCliente[$i]["promedio"];
        $Companero_sumaTC[$i] = $PromediosTCCompanero[$i]["promedio"];
        $Subordinado_sumaTC[$i] = $PromediosTCSubordinado[$i]["promedio"];
        $Jefe_sumaTC[$i] = $PromediosTCJefe[$i]["promedio"];
    }
        $AutoevaluacionTC = array(); $Autoevaluacion_t = 0;
        $ClienteTC = array(); $Cliente_t = 0;
        $CompaneroTC = array(); $Companero_t = 0;
        $SubordinadoTC = array(); $Subordinado_t = 0;
        $JefeTC = array(); $Jefe_t = 0;
    
     for($i = 0; $i < count($_idPreguntasTC); $i++){
    $Autoevaluacion_t= $Autoevaluacion_t + $Autoevaluacion_sumaTC[$i];
    $Cliente_t = $Cliente_t +  $Cliente_sumaTC[$i];
    $Companero_t = $Companero_t + $Companero_sumaTC[$i];
    $Subordinado_t = $Subordinado_t + $Subordinado_sumaTC[$i];
    $Jefe_t = $Jefe_t + $Jefe_sumaTC[$i];
    }
    
    
    $pro = $Autoevaluacion_t  / count($_idPreguntasTC);
    $tempo = substr( $pro, 0, 4);
    $AutoevaluacionTC[0]["promedio"] = $tempo;
    if($AutoevaluacionTC[0]["promedio"] < 1){
        $AutoevaluacionTC[0]["promedio"] = 0;
    }
    
    $pro =  $Cliente_t / count($_idPreguntasTC);
    $tempo = substr( $pro, 0, 4);
    $ClienteTC[0]["promedio"]  = $tempo;
    if($ClienteTC[0]["promedio"] < 1){
        $ClienteTC[0]["promedio"] = 0;
    }
    
    $pro = $Companero_t / count($_idPreguntasTC);
    $tempo = substr( $pro, 0, 4);
    $CompaneroTC[0]["promedio"] = $tempo;
    if($CompaneroTC[0]["promedio"] <1){
        $CompaneroTC[0]["promedio"] = 0;
    }
    
    $pro = $Subordinado_t/ count($_idPreguntasTC);
    $tempo = substr( $pro, 0, 4);
    $SubordinadoTC[0]["promedio"] = $tempo;
    if($SubordinadoTC[0]["promedio"] < 1){
        $SubordinadoTC[0]["promedio"] = 0;
    }
    
    $pro = $Jefe_t/ count($_idPreguntasTC);
    $tempo = substr( $pro, 0, 4);
    $JefeTC[0]["promedio"] = $tempo;
    if($JefeTC[0]["promedio"] < 1){
        $JefeTC[0]["promedio"] = 0;
    }
        
     if($AutoevaluacionTC[0]["promedio"] >= 90){
                     $AutoevaluacionTC[0]["nivel"] = "E";
                  }elseif($AutoevaluacionTC[0]["promedio"] >= 71 && $AutoevaluacionTC[0]["promedio"] <=89){
                      $AutoevaluacionTC[0]["nivel"] = "N";
                  }elseif($AutoevaluacionTC[0]["promedio"] >= 60 && $AutoevaluacionTC[0]["promedio"] <=70){
                      $AutoevaluacionTC[0]["nivel"] = "S";
                  }elseif($AutoevaluacionTC[0]["promedio"] >= 0 && $AutoevaluacionTC[0]["promedio"] <=59){
                      $AutoevaluacionTC[0]["nivel"] = "D";
                  }
    if($ClienteTC[0]["promedio"] >= 90){
                     $ClienteTC[0]["nivel"] = "E";
                  }elseif($ClienteTC[0]["promedio"] >= 71 && $ClienteTC[0]["promedio"] <=89){
                      $ClienteTC[0]["nivel"] = "N";
                  }elseif($ClienteTC[0]["promedio"] >= 60 && $ClienteTC[0]["promedio"] <=70){
                      $ClienteTC[0]["nivel"] = "S";
                  }elseif($ClienteTC[0]["promedio"] >= 0 && $ClienteTC[0]["promedio"] <=59){
                      $ClienteTC[0]["nivel"] = "D";
                  }
    if($CompaneroTC[0]["promedio"] >= 90){
                     $CompaneroTC[0]["nivel"] = "E";
                  }elseif($CompaneroTC[0]["promedio"] >= 71 && $CompaneroTC[0]["promedio"] <=89){
                      $CompaneroTC[0]["nivel"] = "N";
                  }elseif($CompaneroTC[0]["promedio"] >= 60 && $CompaneroTC[0]["promedio"] <=70){
                      $CompaneroTC[0]["nivel"] = "S";
                  }elseif($CompaneroTC[0]["promedio"] >= 0 && $CompaneroTC[0]["promedio"] <=59){
                      $CompaneroTC[0]["nivel"] = "D";
                  }
    if($SubordinadoTC[0]["promedio"] >= 90){
                     $SubordinadoTC[0]["nivel"] = "E";
                  }elseif($SubordinadoTC[0]["promedio"] >= 71 && $SubordinadoTC[0]["promedio"] <=89){
                      $SubordinadoTC[0]["nivel"] = "N";
                  }elseif($SubordinadoTC[0]["promedio"] >= 60 && $SubordinadoTC[0]["promedio"] <=70){
                      $SubordinadoTC[0]["nivel"] = "S";
                  }elseif($SubordinadoTC[0]["promedio"] >= 0 && $SubordinadoTC[0]["promedio"] <=59){
                      $SubordinadoTC[0]["nivel"] = "D";
                  }
 if($JefeTC[0]["promedio"] >= 90){
                     $JefeTC[0]["nivel"] = "E";
                  }elseif($JefeTC[0]["promedio"] >= 71 && $JefeTC[0]["promedio"] <=89){
                      $JefeTC[0]["nivel"] = "N";
                  }elseif($JefeTC[0]["promedio"] >= 60 && $JefeTC[0]["promedio"] <=70){
                      $JefeTC[0]["nivel"] = "S";
                  }elseif($JefeTC[0]["promedio"] >= 0 && $JefeTC[0]["promedio"] <=59){
                      $JefeTC[0]["nivel"] = "D";
 }
    
    $plantilla.='
    <tr>
     <th>Total</th>
      <td>'.$AutoevaluacionTC[0]["promedio"].'%</td>
      <td>'.$ClienteTC[0]["promedio"].'%</td>
      <td>'.$CompaneroTC[0]["promedio"].'%</td>
      <td>'.$SubordinadoTC[0]["promedio"].'%</td>
      <td>'.$JefeTC[0]["promedio"].'%</td>
    </tr>
    <tr>
     <th>Nivel</th>
      <td class="columna-'.$AutoevaluacionTC[0]["nivel"].'">'.$AutoevaluacionTC[0]["nivel"].'</td>
      <td class="columna-'.$ClienteTC[0]["nivel"].'">'.$ClienteTC[0]["nivel"].'</td>
      <td class="columna-'.$CompaneroTC[0]["nivel"].'">'.$CompaneroTC[0]["nivel"].'</td>
      <td class="columna-'.$SubordinadoTC[0]["nivel"].'">'.$SubordinadoTC[0]["nivel"].'</td>
      <td class="columna-'.$JefeTC[0]["nivel"].'">'.$JefeTC[0]["nivel"].'</td>
    </tr>
    ';
    $plantilla.='</tbody></table></div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    //fin de estadisticas
    
    //inicio graficos competencias
     $plantilla.='<div class="graficos-auto-tc">
    <center><h2>Graficos de competencias</h2></center>
       ';
    for($i=0; $i< count($_idPreguntasTC); $i++){
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        '.$_preguntasTC[$i]["nom_comp"].'  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$CompetenciasTC[$i]["nivel"].' " style="width: '.$CompetenciasTC[$i]["promedio"].'%;">
          '.$_preguntasTC[$i]["codigo"].'-'.$CompetenciasTC[$i]["promedio"].'%</div>
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
    //fin graficos competencias
    
    //inicio graficos rol
     $plantilla.='<br><br><div class="graficos-auto">
    <center><h2>Graficos de rol</h2></center>';
    
    if($AutoevaluacionTC[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        AutoEvaluacion
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$AutoevaluacionTC[0]["nivel"].' " style="width: '.$AutoevaluacionTC[0]["promedio"].'%;">'.$AutoevaluacionTC[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        AutoEvaluacion
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$AutoevaluacionTC[0]["nivel"].' " style="width: '.$AutoevaluacionTC[0]["promedio"].'%;">'.$AutoevaluacionTC[0]["promedio"].'%</div>
         </div><br>';
    }
    
    if($ClienteTC[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Cliente  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$ClienteTC[0]["nivel"].' " style="width: '.$ClienteTC[0]["promedio"].'%;">'.$ClienteTC[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Cliente  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$ClienteTC[0]["nivel"].' " style="width: '.$ClienteTC[0]["promedio"].'%;">'.$ClienteTC[0]["promedio"].'%</div>
         </div><br>';
    }
    
    if($CompaneroTC[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Colaborgdfgdfgador 
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$CompaneroTC[0]["nivel"].' " style="width: '.$CompaneroTC[0]["promedio"].'%;">'.$CompaneroTC[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Colaborador 
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$CompaneroTC[0]["nivel"].' " style="width: '.$CompaneroTC[0]["promedio"].'%;">'.$CompaneroTC[0]["promedio"].'%</div>
         </div><br>';
    }
    
    if($SubordinadoTC[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Subordinado 
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$SubordinadoTC[0]["nivel"].' " style="width: '.$SubordinadoTC[0]["promedio"].'%;">'.$SubordinadoTC[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Subordinado 
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$SubordinadoTC[0]["nivel"].' " style="width: '.$SubordinadoTC[0]["promedio"].'%;">'.$SubordinadoTC[0]["promedio"].'%</div>
         </div><br>';
    }
    
    if($JefeTC[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Jefe  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$JefeTC[0]["nivel"].' " style="width: '.$JefeTC[0]["promedio"].'%;">'.$JefeTC[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Jefe  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$JefeTC[0]["nivel"].' " style="width: '.$JefeTC[0]["promedio"].'%;">'.$JefeTC[0]["promedio"].'%</div>
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
       </div></div><br>'; 
    //fin graficos rol 
    
   
     $plantilla.='</div>'; 
//seccion de tronco comun aqui empieza
    
     $plantilla.='<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
    
//seccion de area aqui empieza
    
    $conteo_jefe_a = $_conteo_jefe[0]["conteo"];
    $conteo_Cliente_a = $_conteo_Cliente[0]["conteo"];
    $conteo_Companero_a = $_conteo_Companero[0]["conteo"];
    $conteo_Subordinado_a = $_conteo_Subordinado[0]["conteo"];
    $conteo_Autoevaluacion_a = $_conteo_Autoevaluacion[0]["conteo"];
    
   $contador_total_area = 5;
    
    if( $conteo_jefe_a == 0){ 
        $conteo_jefe_a = 1;
        $contador_total_area--;
    }
     if(  $conteo_Cliente_a == 0){
        $conteo_Cliente_a = 1;
         $contador_total_area--;
    }
     if( $conteo_Companero_a == 0){
        $conteo_Companero_a = 1;
         $contador_total_area--;
    }
    if($conteo_Subordinado_a == 0){
        $conteo_Subordinado_a = 1;
        $contador_total_area--;
    }
    if( $conteo_Autoevaluacion_a == 0){
        $conteo_Autoevaluacion_a = 1;
        $contador_total_area--;
    }
    
    
    
    $plantilla.='<div class="Area"><center><h2>Promedio de competencias de puesto</h2></center>';
    
     //acotacion
    $plantilla.='<div class="Acotacion">
     <h2>Nivel de desempeño</h2>
     <table>
            <thead>
              <tr>
              <th>Valor</th>
              <th>Rango</th>
              <th>Color</th>
              </tr>
           </thead>
           <tbody>
           <tr>
            <td> E = Excelente</td>
            <td> 90-100</td>
            <td style="background-color:rgba(48,255,0,0.5);"></td>
          </tr>
          <tr>
            <td> N = Notable</td>
            <td> 71-89</td>
            <td style="background-color:rgba(214,255,0,0.5);"></td>
          </tr>
          <tr>
            <td> S = Satisfecho</td>
            <td> 60-70</td>
            <td style="background-color:rgba(255,108,0,0.5);"></td>
          </tr>
          <tr>
            <td> D = Deficicente</td>
            <td> 0-59</td>
             <td style="background-color:rgba(255,0,0,0.5);"></td>>
          </tr>
          </tbody>
        </table></div>';
 //acotacion 
    $plantilla.='<br><br><br><br><br><br><br><br><br><br><br><br>';
    //aqui empieza seccion pregunta area de jefe
    $PromediosAreaJefe= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntas); $i++){
        $TOTAL = 0;
     
       $local= $_CDJefe[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
       $local= $_DJefe[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_NNJefe[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_AJefe[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CAJefe[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       
    $total = 5 * $conteo_jefe_a;
      
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosAreaJefe[$i]["promedio"] = $tempo;
         
    }
    //aqui termina seccion de area de jefe
    
    //aqui empieza seccion pregunta area de cliente
    $PromediosAreaCliente= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntas); $i++){
        $TOTAL = 0;
       
       $local= $_CDCliente[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
       $local= $_DCliente[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNCliente[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_ACliente[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CACliente[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
      
        $total = 5 * $conteo_Cliente_a;
       
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosAreaCliente[$i]["promedio"] = $tempo;
      }
    //aqui termina seccion de area de cliente
    
    //aqui empieza seccion pregunta area de compañero
    $PromediosAreaCompanero= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntas); $i++){
        
        $TOTAL = 0;
        
      $local= $_CDCompanero[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
       $local= $_DCompanero[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_NNCompanero[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
       $local= $_ACompanero[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
        
       $local= $_CACompanero[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
      
        $total = 5 * $conteo_Companero_a;
       
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosAreaCompanero[$i]["promedio"] = $tempo;
      }
    //aqui termina seccion de area de compañero
    
     //aqui empieza seccion pregunta area de Subordinado
    $PromediosAreaSubordinado= array();
    
    $TOTAL = 0; $local = 0;
    for($i=0; $i< count($_idPreguntas); $i++){
        $TOTAL = 0;
    
        $local= $_CDSubordinado[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
        $local= $_DSubordinado[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_NNSubordinado[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
      
       $local= $_ASubordinado[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
       
       $local= $_CASubordinado[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       
    $total = 5 * $conteo_Subordinado_a;
      
      $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosAreaSubordinado[$i]["promedio"] = $tempo;
         
       }
    //aqui termina seccion de area de Subordinado
    
      //aqui empieza seccion pregunta area de AutoEvaluacion
    $PromediosAreaAutoEvaluacion= array();
    
    $TOTAL = 0; $local = 0;
    
    for($i=0; $i< count($_idPreguntas); $i++){
        $TOTAL = 0;
    
        $local= $_CDAutoevaluacion[$i] * 1 ;
       $TOTAL = $TOTAL + $local;
      
        $local= $_DAutoevaluacion[$i] * 2 ;
        $TOTAL = $TOTAL + $local;
      
        $local= $_NNAutoevaluacion[$i] * 3 ;
        $TOTAL = $TOTAL + $local;
       
        $local= $_AAutoevaluacion[$i] * 4 ;
       $TOTAL = $TOTAL + $local;
        
        $local= $_CAAutoevaluacion[$i] * 5 ;
        $TOTAL = $TOTAL + $local;
       
        $total = 5 * $conteo_Autoevaluacion_a;
       
        $pro = ($TOTAL * 100) / $total;
        $tempo = substr( $pro, 0, 4);
       $PromediosAreaAutoEvaluacion[$i]["promedio"] = $tempo;
         
     
    }
    //aqui termina seccion de area de Subordinado
    
    
    //estadisticas
    
    
    $Competencias = array();
    $Autoevaluacion = 0; $Autoevaluacion_suma = array();
    $Cliente =0; $Cliente_suma = array();
    $Companero = 0; $Companero_suma = array();
    $Subordinado = 0; $Subordinado_suma = array();
    $Jefe = 0; $Jefe_suma = array();
    
    $plantilla.='<div class="estadistica">
    
     <table>
            <thead>
              <tr>
              <th>Competencia</th>
              <th>AutoEvaluacion</th>
              <th>Cliente</th>
              <th>Colaborador</th>
              <th>Subordinado</th>
              <th>Jefe</th>
              <th>Total</th>
              <th>Nivel</th>
              </tr>
           </thead>
           <tbody>';
    for($i = 0; $i < count($_idPreguntas); $i++){
        $temporal = 
            $PromediosAreaAutoEvaluacion[$i]["promedio"] + 
            $PromediosAreaCliente[$i]["promedio"] +
            $PromediosAreaCompanero[$i]["promedio"] + 
            $PromediosAreaSubordinado[$i]["promedio"] +
            $PromediosAreaJefe[$i]["promedio"];
        
        $TEMPO = $temporal / $contador_total_area ;
         $echo = substr( $TEMPO, 0, 4);
        $Competencias [$i]["promedio"] = $echo;
        
    
        
        if($Competencias[$i]["promedio"] >= 90){
                      $Competencias[$i]["nivel"] = "E";
                  }elseif($Competencias[$i]["promedio"] >= 71 && $Competencias[$i]["promedio"] <=89){
                      $Competencias[$i]["nivel"]= "N";
                  }elseif($Competencias[$i]["promedio"] >= 60 && $Competencias[$i]["promedio"] <=70){
                      $Competencias[$i]["nivel"] = "S";
                  }elseif($Competencias[$i]["promedio"] >= 0 && $Competencias[$i]["promedio"] <=59){
                      $Competencias[$i]["nivel"] = "D";
                  }
        
        $plantilla.='<tr style="height:20px;">
            <td>'.$_preguntas[$i]["nom_comp"].' ('.$_preguntas[$i]["codigo"].')</td>
            <td>'.$PromediosAreaAutoEvaluacion[$i]["promedio"].'%</td>
            <td>'.$PromediosAreaCliente[$i]["promedio"].'%</td>
            <td>'.$PromediosAreaCompanero[$i]["promedio"].'%</td>
            <td>'.$PromediosAreaSubordinado[$i]["promedio"].'%</td>
            <td>'.$PromediosAreaJefe[$i]["promedio"].'%</td>
            <td>'.$Competencias[$i]["promedio"].'%</td>
            <td class="columna-'.$Competencias[$i]["nivel"].'">'.$Competencias[$i]["nivel"].'</td>
          </tr>';
        
        $Autoevaluacion_suma [$i] = $PromediosAreaAutoEvaluacion[$i]["promedio"];
        $Cliente_suma[$i] = $PromediosAreaCliente[$i]["promedio"];
        $Companero_suma[$i] = $PromediosAreaCompanero[$i]["promedio"];
        $Subordinado_suma[$i] = $PromediosAreaSubordinado[$i]["promedio"];
        $Jefe_suma[$i] = $PromediosAreaJefe[$i]["promedio"];
    }
        $Autoevaluacion = array(); $Autoevaluacion_t = 0;
        $Cliente = array(); $Cliente_t = 0;
        $Companero = array(); $Companero_t = 0;
        $Subordinado = array(); $Subordinado_t = 0;
        $Jefe = array(); $Jefe_t = 0;
    
     for($i = 0; $i < count($_idPreguntas); $i++){
    $Autoevaluacion_t= $Autoevaluacion_t + $Autoevaluacion_suma[$i];
    $Cliente_t = $Cliente_t +  $Cliente_suma[$i];
    $Companero_t = $Companero_t + $Companero_suma[$i];
    $Subordinado_t = $Subordinado_t + $Subordinado_suma[$i];
    $Jefe_t = $Jefe_t + $Jefe_suma[$i];
    }
    
    
    
    $Autoevaluacion[0]["promedio"] = $Autoevaluacion_t / count($_idPreguntas);
    $Cliente[0]["promedio"] =  $Cliente_t / count($_idPreguntas);
    $Companero[0]["promedio"] = $Companero_t / count($_idPreguntas);
    $Subordinado[0]["promedio"] = $Subordinado_t/ count($_idPreguntas);
    $Jefe[0]["promedio"] = $Jefe_t/ count($_idPreguntas);
        
    
if($Autoevaluacion[0]["promedio"] < 1){
        $Autoevaluacion[0]["promedio"] = 0;
    }
     if($Autoevaluacion[0]["promedio"] >= 90){
                     $Autoevaluacion[0]["nivel"] = "E";
                  }elseif($Autoevaluacion[0]["promedio"] >= 71 && $Autoevaluacion[0]["promedio"] <=89){
                      $Autoevaluacion[0]["nivel"] = "N";
                  }elseif($Autoevaluacion[0]["promedio"] >= 60 && $Autoevaluacion[0]["promedio"] <=70){
                      $Autoevaluacion[0]["nivel"] = "S";
                  }elseif($Autoevaluacion[0]["promedio"] >= 0 && $Autoevaluacion[0]["promedio"] <=59){
                      $Autoevaluacion[0]["nivel"] = "D";
                  }
     if($Cliente[0]["promedio"] < 1){
        $Cliente[0]["promedio"] = 0;
    }
    
    if($Cliente[0]["promedio"] >= 90){
                     $Cliente[0]["nivel"] = "E";
                  }elseif($Cliente[0]["promedio"] >= 71 && $Cliente[0]["promedio"] <=89){
                      $Cliente[0]["nivel"] = "N";
                  }elseif($Cliente[0]["promedio"] >= 60 && $Cliente[0]["promedio"] <=70){
                      $Cliente[0]["nivel"] = "S";
                  }elseif($Cliente[0]["promedio"] >= 0 && $Cliente[0]["promedio"] <=59){
                      $Cliente[0]["nivel"] = "D";
                  }
    if($Companero[0]["promedio"] < 1){
        $Companero[0]["promedio"] = 0;
    }
    if($Companero[0]["promedio"] >= 90){
                     $Companero[0]["nivel"] = "E";
                  }elseif($Companero[0]["promedio"] >= 71 && $Companero[0]["promedio"] <=89){
                      $Companero[0]["nivel"] = "N";
                  }elseif($Companero[0]["promedio"] >= 60 && $Companero[0]["promedio"] <=70){
                      $Companero[0]["nivel"] = "S";
                  }elseif($Companero[0]["promedio"] >= 0 && $Companero[0]["promedio"] <=59){
                      $Companero[0]["nivel"] = "D";
                  }
    
    if($Subordinado[0]["promedio"] < 1){
        $Subordinado[0]["promedio"] = 0;
    }
    
    if($Subordinado[0]["promedio"] >= 90){
                     $Subordinado[0]["nivel"] = "E";
                  }elseif($Subordinado[0]["promedio"] >= 71 && $Subordinado[0]["promedio"] <=89){
                      $Subordinado[0]["nivel"] = "N";
                  }elseif($Subordinado[0]["promedio"] >= 60 && $Subordinado[0]["promedio"] <=70){
                      $Subordinado[0]["nivel"] = "S";
                  }elseif($Subordinado[0]["promedio"] >= 0 && $Subordinado[0]["promedio"] <=59){
                      $Subordinado[0]["nivel"] = "D";
                  }
    
    if($Jefe[0]["promedio"] < 1){
        $Jefe[0]["promedio"] = 0;
    }
    
 if($Jefe[0]["promedio"] >= 90){
                     $Jefe[0]["nivel"] = "E";
                  }elseif($Jefe[0]["promedio"] >= 71 && $Jefe[0]["promedio"] <=89){
                      $Jefe[0]["nivel"] = "N";
                  }elseif($Jefe[0]["promedio"] >= 60 && $Jefe[0]["promedio"] <=70){
                      $Jefe[0]["nivel"] = "S";
                  }elseif($Jefe[0]["promedio"] >= 0 && $Jefe[0]["promedio"] <=59){
                      $Jefe[0]["nivel"] = "D";
 }
    
    $plantilla.='
    <tr>
     <th>Total</th>
      <td>'.$Autoevaluacion[0]["promedio"].'%</td>
      <td>'.$Cliente[0]["promedio"].'%</td>
      <td>'.$Companero[0]["promedio"].'%</td>
      <td>'.$Subordinado[0]["promedio"].'%</td>
      <td>'.$Jefe[0]["promedio"].'%</td>
    </tr>
    <tr>
     <th>Nivel</th>
      <td class="columna-'.$Autoevaluacion[0]["nivel"].'">'.$Autoevaluacion[0]["nivel"].'</td>
      <td class="columna-'.$Cliente[0]["nivel"].'">'.$Cliente[0]["nivel"].'</td>
      <td class="columna-'.$Companero[0]["nivel"].'">'.$Companero[0]["nivel"].'</td>
      <td class="columna-'.$Subordinado[0]["nivel"].'">'.$Subordinado[0]["nivel"].'</td>
      <td class="columna-'.$Jefe[0]["nivel"].'">'.$Jefe[0]["nivel"].'</td>
    </tr>
    ';
    $plantilla.='</tbody></table></div>
    <br>';
    //fin de estadisticas
    
    //inicio graficos competencias
     $plantilla.='<div class="graficos-auto">
    <center><h2>Graficos de competencias</h2></center>
       ';
    for($i=0; $i< count($_idPreguntas); $i++){
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        '.$_preguntas[$i]["nom_comp"].'
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Competencias[$i]["nivel"].' " style="width: '.$Competencias[$i]["promedio"].'%;">
         '.$_preguntas[$i]["codigo"].' -  '.$Competencias[$i]["promedio"].'%</div>
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
       </div></div><br>'; 
    //fin graficos competencias
    
    //inicio graficos rol
     $plantilla.='<div class="graficos-auto">
    <center><h2>Graficos de rol</h2></center>';
 
    if($Autoevaluacion[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Autoevaluacion  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Autoevaluacion[0]["nivel"].' " style="width: '.$Autoevaluacion[0]["promedio"].'%;">'.$Autoevaluacion[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Autoevaluacion  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Autoevaluacion[0]["nivel"].' " style="width: '.$Autoevaluacion[0]["promedio"].'%;">'.$Autoevaluacion[0]["promedio"].'%</div>
         </div><br>';
    }
    if($Cliente[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Cliente  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Cliente[0]["nivel"].' " style="width: '.$Cliente[0]["promedio"].'%;">'.$Cliente[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Cliente  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Cliente[0]["nivel"].' " style="width: '.$Cliente[0]["promedio"].'%;">'.$Cliente[0]["promedio"].'%</div>
         </div><br>';
    }
    
   if($Companero[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Compañero  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Companero[0]["nivel"].' " style="width: '.$Companero[0]["promedio"].'%;">'.$Companero[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Compañero  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Companero[0]["nivel"].' " style="width: '.$Companero[0]["promedio"].'%;">'.$Companero[0]["promedio"].'%</div>
         </div><br>';
    }
    
    
     if($Subordinado[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Subordinado  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Subordinado[0]["nivel"].' " style="width: '.$Subordinado[0]["promedio"].'%;">'.$Subordinado[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Subordinado  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Subordinado[0]["nivel"].' " style="width: '.$Subordinado[0]["promedio"].'%;">'.$Subordinado[0]["promedio"].'%</div>
         </div><br>';
    }
    
    
   if($Jefe[0]["promedio"] < 1){
    $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Jefe  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Jefe[0]["nivel"].' " style="width: '.$Jefe[0]["promedio"].'%;">'.$Jefe[0]["promedio"].'% (No Aplica)</div>
         </div><br>';
    }else{
        $plantilla.='
        <br>
        <div class="graficos-codigo">  
        Jefe  
        </div>
        <div class="graficos-100"> 
          <div class="graficos-generar graficos-'.$Jefe[0]["nivel"].' " style="width: '.$Jefe[0]["promedio"].'%;">'.$Jefe[0]["promedio"].'%</div>
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
       </div></div><br>'; 
    //fin graficos rol 
    
 
   
//seccion de area termino empieza
     $plantilla.='<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>';
//seccion de tc comienza aqui solo preguntas
    
    //estadisticas
   $plantilla.='
   <center><h2>Promedio de competencias corporativas</h2></center>
   <div class="preguntastc-solo">
     <table>
            <thead>
              <tr>
              <th colspan="2" style="font-size:100px;">Pregunta</th><td></td>
              <th style="font-size:100px;">AutoEvaluacion</th>
              <th style="font-size:100px;">Cliente</th>
              <th style="font-size:100px;">Colaborador</th>
              <th style="font-size:100px;">Subordinado</th>
              <th style="font-size:100px;">Jefe</th>
              <th style="font-size:100px;">Total</th>
              <th style="font-size:100px;">Nivel</th>
              </tr>
           </thead>
           <tbody>';
    
    for($i = 0, $x = 0; $i < count($_idPreguntasTC); $i++){
        
         $x = strlen ($_preguntasTC[$i]["descri"]);
        
        if($x >= 60){
            $cadena_1=substr( $_preguntasTC[$i]["descri"], 0, 60);
            $cadena_2 =substr( $_preguntasTC[$i]["descri"], 60, $x);
            
            $plantilla.='<tr>
            <th colspan="2" style="font-size:100px;">
             '.$cadena_1.'<br>'.$cadena_2.'<br>
            </th><td></td>
            <td style="font-size:100px;">'.$PromediosTCAutoEvaluacion[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCCliente[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCCompanero[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCSubordinado[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCJefe[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$CompetenciasTC[$i]["promedio"].'%</td>
            <td class="columna-'.$CompetenciasTC[$i]["nivel"].'" style="font-size:100px;">'.$CompetenciasTC[$i]["nivel"].'</td>
          </tr>';
            
        }else{  
        $plantilla.='<tr>
            <th colspan="2" style="font-size:100px;">
              '.$_preguntasTC[$i]["descri"].'<br>
            </th><td></td>
            <td style="font-size:100px;">'.$PromediosTCAutoEvaluacion[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCCliente[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCCompanero[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCSubordinado[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$PromediosTCJefe[$i]["promedio"].'%</td>
            <td style="font-size:100px;">'.$CompetenciasTC[$i]["promedio"].'%</td>
            <td class="columna-'.$CompetenciasTC[$i]["nivel"].'" style="font-size:100px;">'.$CompetenciasTC[$i]["nivel"].'</td>
          </tr>';
      }
    }
   
    
    $plantilla.='
    <tr>
     <td colspan="2"  style="font-size:100px;">Total</td><td></td>
      <td style="font-size:100px;">'.$AutoevaluacionTC[0]["promedio"].'%</td>
      <td style="font-size:100px;">'.$ClienteTC[0]["promedio"].'%</td>
      <td style="font-size:100px;">'.$CompaneroTC[0]["promedio"].'%</td>
      <td style="font-size:100px;">'.$SubordinadoTC[0]["promedio"].'%</td>
      <td style="font-size:100px;">'.$JefeTC[0]["promedio"].'%</td>
    </tr>
    <tr>
     <td colspan="2" style="font-size:100px;">Nivel</td><td></td>
      <td class="columna-'.$AutoevaluacionTC[0]["nivel"].'" style="font-size:100px;">'.$AutoevaluacionTC[0]["nivel"].'</td>
      <td class="columna-'.$ClienteTC[0]["nivel"].'" style="font-size:100px;">'.$ClienteTC[0]["nivel"].'</td>
      <td class="columna-'.$CompaneroTC[0]["nivel"].'" style="font-size:100px;">'.$CompaneroTC[0]["nivel"].'</td>
      <td class="columna-'.$SubordinadoTC[0]["nivel"].'" style="font-size:100px;">'.$SubordinadoTC[0]["nivel"].'</td>
      <td class="columna-'.$JefeTC[0]["nivel"].'" style="font-size:100px;">'.$JefeTC[0]["nivel"].'</td>
    </tr>
    ';
    $plantilla.='</tbody></table></div>';
    //fin de estadisticas
    
//seccion de tc termina aqui solo preguntas
//seccion de area  empieza aqui solo preguntas
    
    //estadisticas
 $plantilla.='
  <center><h3>Promedio de competencias de puesto</h3></center><div class="estadistica">
     <table>
            <thead>
              <tr>
              <th colspan="2"  style="font-size:100px;" >Pregunta</th><th></th>
              <th style="font-size:100px;" >AutoEvaluacion</th>
              <th style="font-size:100px;" >Cliente</th>
              <th style="font-size:100px;" >Colaborador</th>
              <th style="font-size:100px;" >Subordinado</th>
              <th style="font-size:100px;" >Jefe</th>
              <th style="font-size:100px;" >Total</th>
              <th style="font-size:100px;" >Nivel</th>
              </tr>
           </thead>
           <tbody>';
    for($i = 0, $x = 0; $i < count($_idPreguntas); $i++){
        
         $x = strlen ($_preguntas[$i]["descri"]);
        
        if($x >= 60){
            $cadena_1=substr( $_preguntas[$i]["descri"], 0, 60);
            $cadena_2 =substr( $_preguntas[$i]["descri"], 60, $x);
            
            $plantilla.='<tr>
            <th colspan="2"  style="font-size:100px;" >
             '.$cadena_1.'<br>'.$cadena_2.' <br>
            </th><td></td>
            <td  style="font-size:100px;" >'.$PromediosAreaAutoEvaluacion[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaCliente[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaCompanero[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaSubordinado[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaJefe[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$Competencias[$i]["promedio"].'%</td>
            <td class="columna-'.$Competencias[$i]["nivel"].'"  style="font-size:100px;" >'.$Competencias[$i]["nivel"].'</td>
          </tr>';
            
        }else{  
        $plantilla.='<tr>
            <th colspan="2"  style="font-size:100px;" >
              '.$_preguntas[$i]["descri"].' <br> 
            </th><td></td>
            <td  style="font-size:100px;" >'.$PromediosAreaAutoEvaluacion[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaCliente[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaCompanero[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaSubordinado[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$PromediosAreaJefe[$i]["promedio"].'%</td>
            <td  style="font-size:100px;" >'.$Competencias[$i]["promedio"].'%</td>
            <td class="columna-'.$Competencias[$i]["nivel"].'"  style="font-size:100px;" >'.$Competencias[$i]["nivel"].'</td>
          </tr>';
      }
    }
    $plantilla.='
    <tr>
     <th colspan="2"  style="font-size:100px;" >Total</th><th></th>
      <td style="font-size:100px;" >'.$Autoevaluacion[0]["promedio"].'%</td>
      <td style="font-size:100px;" >'.$Cliente[0]["promedio"].'%</td>
      <td style="font-size:100px;" >'.$Companero[0]["promedio"].'%</td>
      <td style="font-size:100px;" >'.$Subordinado[0]["promedio"].'%</td>
      <td style="font-size:100px;" >'.$Jefe[0]["promedio"].'%</td>
    </tr>
    <tr>
     <th colspan="2" style="font-size:100px;" >Nivel</th><th></th>
      <td class="columna-'.$Autoevaluacion[0]["nivel"].'" style="font-size:100px;" >'.$Autoevaluacion[0]["nivel"].'</td>
      <td style="font-size:100px;"  class="columna-'.$Cliente[0]["nivel"].'">'.$Cliente[0]["nivel"].'</td>
      <td  style="font-size:100px;" class="columna-'.$Companero[0]["nivel"].'">'.$Companero[0]["nivel"].'</td>
      <td style="font-size:100px;"  class="columna-'.$Subordinado[0]["nivel"].'">'.$Subordinado[0]["nivel"].'</td>
      <td  style="font-size:100px;" class="columna-'.$Jefe[0]["nivel"].'">'.$Jefe[0]["nivel"].'</td>
    </tr>
    ';
    $plantilla.='</tbody></table></div>';
    //fin de estadisticas
    
//seccion de area  termina aqui solo preguntas
    
    
    
//seccion de justificaciones  empieza aqui 
    $plantilla.='<br><br><br>';
     $plantilla.='<div class="justificaciones">
     <center><h3>Justificaciones de competencias corporativas</h3></center>
    ';
    
     for($i = 0, $j=0; $i < count($_idPreguntasTC); $i++, $j=0 ){
       $plantilla.='<div class="titular-jus-tc">'.$_preguntasTC[$i]["descri"].'</div>
       <div class="jus-jus">';
       foreach($_justificacionesJefeTC as $justificacion_jf_tc){
           
        if($_idPreguntasTC[$i]["id_pregunta"] == $justificacion_jf_tc["idp"]){
            //var_dump($idptc);die();
            $plantilla.=$justificacion_jf_tc["justificacion"].'<br>';
            $j++;
        }else{
            $plantilla.='';}
       } 
       foreach($_justificacionesClienteTC as $justificacion_cl_tc){
           
        if($_idPreguntasTC[$i]["id_pregunta"] == $justificacion_cl_tc["idp"]){
            //var_dump($idptc);die();
            $plantilla.=$justificacion_cl_tc["justificacion"].'<br>';
            $j++;
        }else{
            $plantilla.='';}
       }
         foreach($_justificacionesCompaneroTC as $justificacion_co_tc){
           
        if($_idPreguntasTC[$i]["id_pregunta"] == $justificacion_co_tc["idp"]){
            //var_dump($idptc);die();
            $plantilla.=$justificacion_co_tc["justificacion"].'<br>';
            $j++;
        }else{
            $plantilla.='';}
       }
        foreach($_justificacionesSubordinadoTC as $justificacion_su_tc){
           
        if($_idPreguntasTC[$i]["id_pregunta"] == $justificacion_su_tc["idp"]){
            //var_dump($idptc);die();
            $plantilla.=$justificacion_su_tc["justificacion"].'<br>';
            $j++;
        }else{
            $plantilla.='';}
       }
    
     }
    $plantilla.='</div></div>';
    
//seccion de justificaciones  empieza termina 
    
//seccion de justificaciones  empieza aqui  area
    $plantilla.='<br><br><br>';
     $plantilla.='<div class="justificaciones">
     <center><h3>Justificaciones de competencias de puesto</h3></center>
     <table>
            <thead>';
    
     for($i = 0, $j=0, $x = 0; $i < count($_idPreguntas); $i++, $j=0 ){
         
               $x = strlen ($_preguntas[$i]["descri"]);
        
        if($x >= 60){
            $cadena_1=substr( $_preguntas[$i]["descri"], 0, 60);
            $cadena_2 =substr( $_preguntas[$i]["descri"], 60, $x);
            $plantilla.='<tr><th><center>'.$cadena_1.'<br>'.$cadena_2.'</center></th></tr>';
        }else{
       $plantilla.='<tr><th><center>'.$_preguntas[$i]["descri"].'</center></th></tr>';}
       foreach($_justificacionesJefe as $justificacion_jf_){
           
        if($_idPreguntas[$i]["id_pregunta"] == $justificacion_jf_["idp"]){
            //var_dump($idptc);die();
            $plantilla.=' <tr><td>'.$justificacion_jf_["justificacion"].'</td></tr>';
            $j++;
        }else{
            $plantilla.='<tr>
             <td>
              
             </td>
            </tr>';}
       } 
       foreach($_justificacionesCliente as $justificacion_cl_){
           
        if($_idPreguntas[$i]["id_pregunta"] == $justificacion_cl_["idp"]){
            //var_dump($idptc);die();
            $plantilla.=' <tr><td>'.$justificacion_cl_["justificacion"].'</td></tr>';
            $j++;
        }else{
            $plantilla.='<tr>
             <td>
              
             </td>
            </tr>';}
       }
         foreach($_justificacionesCompanero as $justificacion_co_){
           
        if($_idPreguntas[$i]["id_pregunta"] == $justificacion_co_["idp"]){
            //var_dump($idptc);die();
            $plantilla.=' <tr><td>'.$justificacion_co_["justificacion"].'</td></tr>';
            $j++;
        }else{
            $plantilla.='<tr>
             <td>
              
             </td>
            </tr>';}
       }
        foreach($_justificacionesSubordinado as $justificacion_su_){
           
        if($_idPreguntas[$i]["id_pregunta"] == $justificacion_su_["idp"]){
            //var_dump($idptc);die();
            $plantilla.=' <tr><td>'.$justificacion_su_["justificacion"].'</td></tr>';
            $j++;
        }else{
            $plantilla.='<tr>
             <td>
              
             </td>
            </tr>';}
       }
    
     }
    $plantilla.='</tbody></table></div>';
    
//seccion de justificaciones  empieza termina  area
    
    
    
    
return $plantilla;
}

?>
          
           