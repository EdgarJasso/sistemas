<?php 

function getEncabezado($semana, $nr_s, $PMG, $nr_pmg, $PMC, $nr_pmc, $TMG, $nr_tmg, $TMC, $nr_tmc){
   $fechaActual=time();
    $plantilla='
<div id="logo">
      <h1><img src="img/cryoo.jpg" style=" width:50%;"></h1> 
      </div>
        
      
      <div id="company">
        <div>Grupo Cryo</div>
        <div>Circuito Economistas 31A,<br /> Edo. México 54085, MX</div>
        <div>(55) 1522-4856</div>
        <div><a href="mailto:company@example.com">correo@example.com</a></div>
      </div>
      <br>
      <div id="project">
        <div><span>Proyecto: </span> Cryo 360°</div>
        <div><span>Area:</span>Nuevo Ingreso';
        $plantilla.='</div>
        <div><span>Fecha: </span>"'; 
        $plantilla.= date("d-m-Y"); 
        $plantilla.='"</div>
     </div><br><br><br><br><br>';
   
    //primera semana
    $plantilla.= ' 
   <center><h3>Semana de Ingreso</h3></center>
   <table>
     <thead><tr>
      <th>Id Pregunta</th>
      <th>Descripcion</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
     </tr></thead>
     <tbody>';
    foreach($semana as $consulta){ 
        $plantilla.='
           <tr>
            <td>'; $plantilla.=$consulta["Pregunta"]; $plantilla.='</td>
            <td>'; $plantilla.= $consulta["descripcion"]; $plantilla.='</td>
           <td>'; $plantilla.= $consulta["Respuesta"];$plantilla.='</td>
           <td>'; $plantilla.= $consulta["cantidad"]; $plantilla.='</td>
           <td>no</td>
           <td>'; $plantilla.=($nr_s - $consulta["cantidad"]); $plantilla.='</td>
        </tr>';
    }
    $plantilla.= '
     </tbody>
    </table>
   <center><h5>Numero de Respuestas:'; $plantilla.=$nr_s.'</h5></center><br><br>';
    
    //primer mes (gerente)
    $plantilla.= ' 
   <br><br><center><h3>Primer Mes (Gerente)</h3></center>
   <table>
     <thead><tr>
      <th>Id Pregunta</th>
      <th>Descripcion</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
     </tr></thead>
     <tbody>';
    foreach($PMG as $consulta){ 
        $plantilla.='
           <tr>
            <td>'; $plantilla.=$consulta["Pregunta"]; $plantilla.='</td>
            <td>'; $plantilla.= $consulta["descripcion"]; $plantilla.='</td>
           <td>'; $plantilla.= $consulta["Respuesta"];$plantilla.='</td>
           <td>'; $plantilla.= $consulta["cantidad"]; $plantilla.='</td>
           <td>no</td>
           <td>'; $plantilla.=($nr_pmg - $consulta["cantidad"]); $plantilla.='</td>
        </tr>';
    }
    $plantilla.= '
     </tbody>
    </table>
   <center><h5>Numero de Respuestas:'; $plantilla.=$nr_pmg.'</h5></center><br><br><br>';
    
    //primer mes (candidato)
    $plantilla.= ' 
   <center><h3>Primer Mes (Candidato)</h3></center>
   <table>
     <thead><tr>
      <th>Id Pregunta</th>
      <th>Descripcion</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
     </tr></thead>
     <tbody>';
    foreach($PMC as $consulta){ 
        $plantilla.='
           <tr>
            <td>'; $plantilla.=$consulta["Pregunta"]; $plantilla.='</td>
            <td>'; $plantilla.= $consulta["descripcion"]; $plantilla.='</td>
           <td>'; $plantilla.= $consulta["Respuesta"];$plantilla.='</td>
           <td>'; $plantilla.= $consulta["cantidad"]; $plantilla.='</td>
           <td>no</td>
           <td>'; $plantilla.=($nr_pmc - $consulta["cantidad"]); $plantilla.='</td>
        </tr>';
    }
    $plantilla.= '
     </tbody>
    </table>
   <center><h5>Numero de Respuestas:'; $plantilla.=$nr_pmc.'</h5></center><br><br>';
    
    //tercer mes (gerente)
    $plantilla.= ' 
   <center><h3>Tercer Mes (Gerente)</h3></center>
   <table>
     <thead><tr>
      <th>Id Pregunta</th>
      <th>Descripcion</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
     </tr></thead>
     <tbody>';
    foreach($TMG as $consulta){ 
        $plantilla.='
           <tr>
            <td>'; $plantilla.=$consulta["Pregunta"]; $plantilla.='</td>
            <td>'; $plantilla.= $consulta["descripcion"]; $plantilla.='</td>
           <td>'; $plantilla.= $consulta["Respuesta"];$plantilla.='</td>
           <td>'; $plantilla.= $consulta["cantidad"]; $plantilla.='</td>
           <td>no</td>
           <td>'; $plantilla.=($nr_tmg - $consulta["cantidad"]); $plantilla.='</td>
        </tr>';
    }
    $plantilla.= '
     </tbody>
    </table>
   <center><h5>Numero de Respuestas:'; $plantilla.=$nr_tmg.'</h5></center><br><br><br><br>';
    
    //tercer mes (candidato)
    $plantilla.= ' 
   <br><br><br><br><center><h3>Tercer Mes (candidato)</h3></center>
   <table>
     <thead><tr>
      <th>Id Pregunta</th>
      <th>Descripcion</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
      <th>Respuesta</th>
      <th>Cantidad</th>
     </tr></thead>
     <tbody>';
    foreach($TMC as $consulta){ 
        $plantilla.='
           <tr>
            <td>'; $plantilla.=$consulta["Pregunta"]; $plantilla.='</td>
            <td>'; $plantilla.= $consulta["descripcion"]; $plantilla.='</td>
           <td>'; $plantilla.= $consulta["Respuesta"];$plantilla.='</td>
           <td>'; $plantilla.= $consulta["cantidad"]; $plantilla.='</td>
           <td>no</td>
           <td>'; $plantilla.=($nr_tmc - $consulta["cantidad"]); $plantilla.='</td>
        </tr>';
    }
    $plantilla.= '
     </tbody>
    </table>
   <center><h5>Numero de Respuestas:'; $plantilla.=$nr_tmc.'</h5></center><br><br>';

    return $plantilla;
}
?>