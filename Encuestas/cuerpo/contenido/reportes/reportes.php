<?php
session_start();
if (isset($_SESSION['log_encuestas']) && $_SESSION['log_encuestas'] == true){
?>
<div class="container-fluid">
    <div class="row">
        <center><h1>Reportes</h1></center>
        <div class="container">
            <!-- imprimir registro inicio-->
            <div class="form-group">
            <form action="../../reporte/registro.php" method="post">
                <label class="etiqueta">Reporte de Registro:</label>
                 <div class="form-group">
                     <select id="" class="form-control" name="id" style="max-width:150px;">
                         <?php
                         include_once('../../../php/connection.php');
                            $database = new Connection();
                            $db = $database->open();
                            $sql = "SELECT id_registro FROM ecsnts_contesto;";
                            foreach ($db->query($sql) as $row) {
                                echo '<option value="'.$row['id_registro'].'">'.$row['id_registro'].'</option>';
                            }
                         ?>
                     </select>
                 </div>
                <button class="btn btn-info" type="submit"><span class="icon-download2"></span>Generar</button>
            </form>
            </div>
            <!-- imprimir registro fin-->
            <!-- imprimir registro inicio-->
            <div class="form-group">
            <form action="../../reporte/registro.php" method="post">
                <label class="etiqueta">Generar Comprobante:</label>
                 <div class="form-group">
                     <select id="" class="form-control" name="id" style="max-width:150px;">
                         <?php
                         include_once('../../../php/connection.php');
                            $database = new Connection();
                            $db = $database->open();
                            $sql = "SELECT id_registro FROM ecsnts_contesto;";
                            foreach ($db->query($sql) as $row) {
                                echo '<option value="'.$row['id_registro'].'">'.$row['id_registro'].'</option>';
                            }
                         ?>
                     </select>
                 </div>
                <button class="btn btn-info" type="submit"><span class="icon-download2"></span>Generar</button>
            </form>
            </div>
            <!-- imprimir registro fin-->
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