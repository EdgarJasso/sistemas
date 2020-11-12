<?php 
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
    $id_validacion = '';
    if (isset($_POST['validacion'])) {
        include_once('../../../php/connection.php');
        $id_validacion = $_POST['validacion'];
        //echo $id_validacion;
        //sacar datos generales de la encuesta seleccionada
        try {
            $database = new Connection();
            $db = $database->open();
            $query = 'SELECT Nombre, Categoria from ecsnts_validacion WHERE ecsnts_validacion.Id_validacion ='.$id_validacion;
            $stmt = $db->prepare($query);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $row = $stmt->rowCount();
            $datos = $stmt->fetch();
            $db = null;                 
        } catch (PDOException $e) {
            echo "Error: ".$e->getMessage()." !<br>";
        }
       // var_dump($datos); echo '<br><br><br>';
        //sacar datos tronco comun
        try {
          $database = new Connection();
          $db = $database->open();
          $sql="SELECT * FROM ecsnts_pregunta WHERE id_area = 1 AND categoria ='Tronco Común'";
          $stmt_general = $db->prepare($sql);
          $stmt_general->setFetchMode(PDO::FETCH_ASSOC);
          $stmt_general->execute();
          $row_general = $stmt_general->rowCount();
            while ($preguntas_general =  $datos_general = $stmt_general->fetch()) {
              $general[] = $preguntas_general;
            }
          $db = null;                 
        } catch (PDOException $e) {
          echo "Error: ".$e->getMessage()." !<br>";
        }
        //sacar datos de categorias
        try {
          $database = new Connection();
          $db = $database->open();
          $SQL="SELECT * FROM ecsnts_pregunta, ecsnts_categoria, ecsnts_area WHERE ecsnts_area.id_area = ecsnts_pregunta.id_area AND ecsnts_pregunta.categoria = ecsnts_categoria.Descripcion AND ecsnts_categoria.Id_categoria ='".$datos['Categoria']."'";
          $stmt_categoria = $db->prepare($SQL);
          $stmt_categoria->setFetchMode(PDO::FETCH_ASSOC);
          $stmt_categoria->execute();
          $row_categoria = $stmt_categoria->rowCount();
            while ($preguntas_categoria =  $datos_categoria = $stmt_categoria->fetch()) {
              $categoria[] = $preguntas_categoria;
            }
          //var_dump($categoria); echo '<br>';
          $db = null;                 
        } catch (PDOException $e) {
          echo "Error: ".$e->getMessage()." !<br>";
        }

        $cabezal = '
        <div id="titulo_evaluacion" class="text-center">
        <h4>Usted esta evaluando a: 
        <span>'.$datos['Nombre'].'</span>
        <p>en el puesto de: <span>'.$categoria[0]['Descripcion'].'</span></p>
        </h4>
        </div>';

        $cuerpo ='
        <div id="cuerpo_evaluacion">

        preguntas aqui
        
        </div>';
        echo $cabezal.$cuerpo;
    }else{
        echo 'debe de seleccionarse una encuesta a contestar';
    }
}else{
    echo "Inicia Sesion para acceder a este contenido.<br>";
    include '../../../dominio.php';
    echo '<script type="text/javascript">window.location = "'.URL.'/Encuestas";</script>';
}
?>