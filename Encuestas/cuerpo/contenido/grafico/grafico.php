<div class="container-fluid" id="grafico">
    <center>
        <h1>
            Dashboard
        </h1>
    </center>
    <form class="form-inline">
        <div class="form-group">
            <label for="grafico_periodo_periodo">Periodo:</label>
            <select id="grafico_periodo_periodo" class="form-control">
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

<script src="../../js/funciones-graficos.js"></script>