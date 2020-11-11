<?php 
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
    $id_validacion = '';
    if (isset($_POST['validacion'])) {
        include_once('../../../php/connection.php');
        $id_validacion = $_POST['validacion'];

        //sacar datos generales de la encuesta seleccionada
        try {
            $database = new Connection();
            $db = $database->open();
            $query = 'SELECT * from ecsnts_validacion WHERE ecsnts_validacion.Calificador ='.$_SESSION["id"].' AND ecsnts_usuario.id_usuario = ecsnts_Validacion.Calificador';
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

        echo '
        <div id="titulo_evaluacion" class="text-center">
        <h4>Usted esta evaluando a: 
        <span>Edgar Jasso</span>
        <p>puesto: <span>Desarrollo de Proiectos</span></p>
        </h4>
  </div>
  <div id="cuerpo_evaluacion">
  
    <form id="evaluacion">

      <div class="form-group" id="encuestas_pregunta_1">
        <h5 class="text-center">1.- Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam autem repudiandae quam. Alias,</h5>
        <div id="" class="pregunta text-center">
          <label class="etiqueta-n">
            <input name="p1" type="radio" value="Completamente en desacuerdo" class="radios " required autocomplete="off" >Completamente en desacuerdo
          </label><br>
          <label class="etiqueta-n">
            <input name="p1" type="radio" value="No estoy de acuerdo" class="radios " required autocomplete="off" >No estoy de acuerdo
          </label><br>
          <label class="etiqueta-n">
            <input name="p1" type="radio" value="Ni acuerdo - ni en desacuerdo" class="radios " required autocomplete="off" >Ni acuerdo - ni en desacuerdo
          </label><br>
          <label class="etiqueta-n">
            <input name="p1" type="radio" value="De acuerdo" class="radios " required autocomplete="off" >De acuerdo
          </label><br>
          <label class="etiqueta-n">
            <input name="p1" type="radio" value="Completamente de acuerdo" class="radios" required autocomplete="off" >Completamente de acuerdo
          </label> <br><br>
            <textarea name="j1" id="j1" cols="30" rows="10" placeholder=" Justificacion aqui..."  maxlength="200" minlength="30" required></textarea>
        </div>
      </div>

    </form>

  </div>
        ';
    }else{
        echo 'debe de seleccionarse una encuesta a contestar';
    }
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>