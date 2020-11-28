$(document).ready(function () {
    grafico_periodo();
    $('#grafico_periodo_periodo').change(grafico_periodo);
});

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

function grafico_periodo(){
    $('#grafico_1').remove();
    $('#grafico_periodo_contenedor').append('<canvas id="grafico_1"></canvas>');
    var titulo = document.getElementById('grafico_periodo_titulo');
    titulo.innerHTML= '';
    let periodo = document.getElementById('grafico_periodo_periodo').value;
    $.ajax({
        type: "post",
        url:"../../cuerpo/contenido/grafico/encuestas.php",
        data: "periodo="+periodo,
        dataType: "json",
        success: function (response) {
            console.log(response);
            titulo.innerHTML= periodo;
            var ctx = document.getElementById('grafico_1').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'pie',

                // The data for our dataset
                data: {
                    labels: ['Faltantes', 'Hechas'],
                    datasets: [{
                        label: periodo,
                        backgroundColor: ['rgb(220,20,3)','rgb(0,192,35)'],
                        borderColor: ['rgb(251,32,3)','rgb(0,255,46)'],
                        data: response
                    }]
                },

                // Configuration options go here
                options: {}
            });
            chart.update();
        },
        error: function(response){
            console.log(response);
        }
    });
}