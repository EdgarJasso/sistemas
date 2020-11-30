$(document).ready(function () {

    grafico_periodo();
    $('#grafico_periodo_periodo').change(grafico_periodo);

    grafico_area();
    $('#grafico_area_periodo').change(grafico_area);
    $('#grafico_area_nombre').change(grafico_area);

    grafico_califica();
    $('#grafico_califica_periodo').change(grafico_califica);
    $('#grafico_califica_persona_nombre').change(grafico_califica);

    grafico_evaluado();
    $('#grafico_evaluado_periodo').change(grafico_evaluado);
    $('#grafico_evaluado_persona_nombre').change(grafico_evaluado);
});

function grafico_periodo(){
    $('#grafico_1').remove();
    $('#grafico_periodo_contenedor').append('<canvas id="grafico_1"></canvas>');
    let periodo = document.getElementById('grafico_periodo_periodo').value;
    $.ajax({
        type: "post",
        url:"../../cuerpo/contenido/grafico/encuestas.php",
        data: "periodo="+periodo,
        dataType: "json",
        success: function (response) {
            console.log(response);
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
                options: {
                    animation: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    }
                }
            });
            chart.update();
        },
        error: function(response){
            console.log(response);
        }
    });
}

function grafico_area(){
    $('#grafico_area').remove();
   $('#grafico_area_contenedor').append('<canvas id="grafico_area"></canvas>');
   var titulo = document.getElementById('grafico_area_titulo');
   titulo.innerHTML= '';
   let periodo = document.getElementById('grafico_area_periodo').value;
   let usuario = document.getElementById('grafico_area_nombre').value;
  // let nombre = document.getElementById('grafico_califica_persona').attr('data-name');
   $.ajax({
       type: "post",
       url:"../../cuerpo/contenido/grafico/area.php",
       data: "periodo="+periodo + 
             "&id="+usuario,
       dataType: "json",
       success: function (response) {
           console.log(response);
           console.log('exito');
          // titulo.innerHTML= periodo + " " + nombre;
           var ctx = document.getElementById('grafico_area').getContext('2d');
           var chart = new Chart(ctx, {
               // The type of chart we want to create
               type: 'bar',

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
               options: {
                   animation: {
                       tension: {
                           duration: 1000,
                           easing: 'linear',
                           from: 1,
                           to: 0,
                           loop: true
                       }
                   }
               }
           });
           chart.update();
       },
       error: function(response){
           console.log(response);
           console.log('error');
       }
   });
}
function grafico_califica(){
     $('#grafico_calificador').remove();
    $('#grafico_califica_contenedor').append('<canvas id="grafico_calificador"></canvas>');
    var titulo = document.getElementById('grafico_califica_titulo');
    titulo.innerHTML= '';
    let periodo = document.getElementById('grafico_califica_periodo').value;
    let usuario = document.getElementById('grafico_califica_persona_nombre').value;
   // let nombre = document.getElementById('grafico_califica_persona').attr('data-name');
    $.ajax({
        type: "post",
        url:"../../cuerpo/contenido/grafico/califica.php",
        data: "periodo="+periodo + 
              "&id="+usuario,
        dataType: "json",
        success: function (response) {
            console.log(response);
            console.log('exito');
           // titulo.innerHTML= periodo + " " + nombre;
            var ctx = document.getElementById('grafico_calificador').getContext('2d');
            var chart = new Chart(ctx, {
                // The type of chart we want to create
                type: 'doughnut',

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
                options: {
                    animation: {
                        tension: {
                            duration: 1000,
                            easing: 'linear',
                            from: 1,
                            to: 0,
                            loop: true
                        }
                    }
                }
            });
            chart.update();
        },
        error: function(response){
            console.log(response);
            console.log('error');
        }
    });
}

function grafico_evaluado(){
    $('#grafico_evaluado').remove();
   $('#grafico_evaluado_contenedor').append('<canvas id="grafico_evaluado"></canvas>');
   var titulo = document.getElementById('grafico_evaluado_titulo');
   titulo.innerHTML= '';
   let periodo = document.getElementById('grafico_evaluado_periodo').value;
   let usuario = document.getElementById('grafico_evaluado_persona_nombre').value;
  // let nombre = document.getElementById('grafico_califica_persona').attr('data-name');
   $.ajax({
       type: "post",
       url:"../../cuerpo/contenido/grafico/evaluado.php",
       data: "periodo="+periodo + 
             "&id="+usuario,
       dataType: "json",
       success: function (response) {
           console.log(response);
           console.log('exito');
          // titulo.innerHTML= periodo + " " + nombre;
           var ctx = document.getElementById('grafico_evaluado').getContext('2d');
           var chart = new Chart(ctx, {
               // The type of chart we want to create
               type: 'doughnut',

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
               options: {
                   animation: {
                       tension: {
                           duration: 1000,
                           easing: 'linear',
                           from: 1,
                           to: 0,
                           loop: true
                       }
                   }
               }
           });
           chart.update();
       },
       error: function(response){
           console.log(response);
           console.log('error');
       }
   });
}