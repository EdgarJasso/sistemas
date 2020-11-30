<?php include('../../../php/connection.php');?>
<div class="container-fluid" id="grafico">
    <center>
        <h1>
            Dashboard
        </h1>
    </center>
    <div id="container container_all_graficos">

        <div id="container_all_one">

            <div id="container_of_grafic">

            <form class="text-center">
                <div class="">
                    <h4 class="">Encuestas Faltantes</h4>    

                    <label for="grafico_periodo_periodo">Periodo:</label>
                    <select id="grafico_periodo_periodo" class="">
                        <option value="2020-2">2020-2</option>
                        <?php for ($i=21; $i <=30 ; $i++) { 
                            echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
                            echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
                        }?>
                    </select>
                </div>
            </form>
            <div class="grafico_periodo">
                <center><h4 id="grafico_periodo_titulo"></h4></center>
                <div id="grafico_periodo_contenedor">
                </div>
            </div>

            </div>

            <div id="container_of_grafic">
                <form class="text-center" id="grafico_area_form">
                    <div class="">
                    <h4 class="">Encuestas Faltantes del Area:</h4>    
                        <label for="grafico_area_periodo">Periodo:</label>
                        <select id="grafico_area_periodo" class="">
                            <option value="2020-2">2020-2</option>
                            <?php for ($i=21; $i <=30 ; $i++) { 
                                echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
                                echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
                            }?>
                        </select>
                        <label for="grafico_area_persona">Persona:</label>
                        <select name="grafico_area_persona" id="grafico_area_nombre" class="">
                        <?php  
                        try {
                            $database = new Connection();
                            $db = $database->open();
                            $query="SELECT * FROM ecsnts_area WHERE ecsnts_area.id_area != 1";
                                foreach ($db->query($query) as $row) {
                                    echo '<option  value="'.$row['id_area'].'">'.$row['id_area'].' - '.$row['nombre'].'</option>';
                                }
                                $db = null;                 
                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage()." !<br>";
                        }?> 
                        </select>
                    </div>
                </form>
                <div class="grafico_area">
                    <center><h4 id="grafico_area_titulo"></h4></center>
                    <div id="grafico_area_contenedor">
                    </div>
                </div>
            </div>
        </div> <br>
        <div id="container_all_two">


            <div id="container_of_grafic">

            <form class="text-center" id="grafico_califica_form">
                <div class="">
                <h4 class="">Encuestas Faltantes del usuario:</h4>    
                    <label for="grafico_califica_periodo">Periodo:</label>
                    <select id="grafico_califica_periodo" class="">
                        <option value="2020-2">2020-2</option>
                        <?php for ($i=21; $i <=30 ; $i++) { 
                            echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
                            echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
                        }?>
                    </select>
                    <label for="grafico_califica_persona">Persona:</label>
                    <select name="grafico_califica_persona" id="grafico_califica_persona_nombre" class="">
                    <?php  
                    try {
                        $database = new Connection();
                        $db = $database->open();
                        $query="SELECT * FROM ecsnts_usuario";
                            foreach ($db->query($query) as $row) {
                                echo '<option  value="'.$row['id_usuario'].'">'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                            }
                            $db = null;                 
                    } catch (PDOException $e) {
                        echo "Error: ".$e->getMessage()." !<br>";
                    }?> 
                    </select>
                </div>
            </form>
            <div class="grafico_califica">
                <center><h4 id="grafico_califica_titulo"></h4></center>
                <div id="grafico_califica_contenedor">
                </div>
            </div>

            </div>

            <div id="container_of_grafic">
                <form class="text-center" id="grafico_evaluado_form">
                    <div class="">
                        <h4 class="">Evaluaciones Faltantes del usuario:</h4> 
                        <label for="grafico_evaluado_periodo">Periodo:</label>
                        <select id="grafico_evaluado_periodo" class="">
                            <option value="2020-2">2020-2</option>
                            <?php for ($i=21; $i <=30 ; $i++) { 
                                echo ' <option value="20'.$i.'-1">20'.$i.'-1</option>';
                                echo ' <option value="20'.$i.'-2">20'.$i.'-2</option>';
                            }?>
                        </select>
                        <label for="grafico_evaluado_persona">Persona:</label>
                        <select name="grafico_evaluado_persona" id="grafico_evaluado_persona_nombre" class="">
                        <?php  
                        try {
                            $database = new Connection();
                            $db = $database->open();
                            $query="SELECT * FROM ecsnts_usuario";
                                foreach ($db->query($query) as $row) {
                                    echo '<option  value="'.$row['id_usuario'].'" >'.$row['id_usuario'].' - '.$row['nombre'].'</option>';
                                }
                                $db = null;                 
                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage()." !<br>";
                        }?> 
                        </select>
                    </div>
                </form>
                <div class="grafico_evaluado">
                <center><h4 id="grafico_evaluado_titulo"></h4></center>
                <div id="grafico_evaluado_contenedor">
                </div>
            </div>

            </div>

        </div>

    </div> 

    
</div>

<script src="../../js/funciones-graficos.js"></script>