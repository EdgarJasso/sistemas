$(document).ready(function(){

	//$("#enviar_datos").click(EnviarDatosEvaluacion);

	$('#faltantes').on('click', '.validacion', function(){
		let Id_validacion = $(this).data("validacion");
		GenerarEvaluacion(Id_validacion)
	}); 

	$('#faltantes').on('click', '.seguridad', function(){
		let Id_validacion = $(this).data("validacion");
		GenerarEvaluacionS(Id_validacion)
	}); 

		$('#evaluacion_datos').submit(function( event ) {
			event.preventDefault();
			enviar_evaluacion();
		});

		$('#evaluacion_datos_s').submit(function( event ) {
			event.preventDefault();
			enviar_evaluacion_s();
		});
	
	
});
function GenerarEvaluacion(validacion){
	let cuerpo = document.getElementById('evaluacion_cuerpo');
	cuerpo.innerHTML = "";
	$.ajax({
		type: "post",
		url: "../../cuerpo/contenido/validacion/generar_encuesta.php",
		data: "validacion="+validacion,
		success: function (response) {
			//console.log(response);
			cuerpo.innerHTML = response;
		},
		error: function(response) {
			console.log(response);
		}
	});
}
function GenerarEvaluacionS(validacion){
	let cuerpo = document.getElementById('evaluacion_cuerpo_s');
	cuerpo.innerHTML = "";
	$.ajax({
		type: "post",
		url: "../../cuerpo/contenido/validacion/generar_encuesta_s.php",
		data: "validacion="+validacion,
		success: function (response) {
			//console.log(response);
			cuerpo.innerHTML = response;
		},
		error: function(response) {
			console.log(response);
		}
	});
}
function enviar_evaluacion(){
	let dataString = $('#evaluacion_datos').serialize();
	let clean_data = dataString.replace(/%20/g," ");
	//console.log(clean_data);
		alertify.success('Enviando Datos');
	$.ajax({
		type: "post",
		url: "../../cuerpo/contenido/validacion/add_evaluacion.php",
		data: clean_data,
		success: function (response) {
			//$('#Contestar').modal('hide');
			$( '#Contestar').removeClass( "in" );
            $("body").removeClass("modal-open");
            $("#Contestar").css("display", "none");
			Swal.fire({
				title: 'Evaluacion Enviada!',
				text: 'numero de registro: '+response,
				icon: 'success',
				timer: 4000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
				});
				$('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
    $('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
    $('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
    $('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php');
    $('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  
    $('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  
    $('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
    $('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php');
		},
		error: function (response) {
			console.log('error:'+response);
		}
	});
}
function enviar_evaluacion_s(){
	let dataString = $('#evaluacion_datos_s').serialize();
	let clean_data = dataString.replace(/%20/g," ");
	//console.log(clean_data);
		alertify.success('Enviando Datos');
	$.ajax({
		type: "post",
		url: "../../cuerpo/contenido/validacion/add_evaluacion_s.php",
		data: clean_data,
		success: function (response) {
			//$('#Contestar').modal('hide');
			$('#Contestar_s').removeClass( "in" );
            $("body").removeClass("modal-open");
            $("#Contestar_s").css("display", "none");
			Swal.fire({
				title: 'Evaluacion Enviada!',
				text: 'numero de registro: '+response,
				icon: 'success',
				timer: 4000,
				timerProgressBar: true,
				showCancelButton: false,
				showConfirmButton: false
				});
				$('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
				$('#contenedor_categoria').load('../../cuerpo/contenido/categoria/tabla.php'); 
				$('#contenedor_competencias').load('../../cuerpo/contenido/competencias/tabla.php'); 
				$('#contenedor_contesto').load('../../cuerpo/contenido/contesto/tabla.php'); 
				$('#contenedor_pregunta').load('../../cuerpo/contenido/pregunta/tabla.php');
				$('#contenedor_respuesta').load('../../cuerpo/contenido/respuestas/tabla.php');  
				$('#contenedor_usuario').load('../../cuerpo/contenido/usuarios/tabla.php');  
				$('#contenedor_validacion').load('../../cuerpo/contenido/validacion/tabla.php');  
				$('#contenedor_encuestas_faltantes').load('../../cuerpo/contenido/validacion/tabla_individual.php');
		},
		error: function (response) {
			console.log('error:'+response);
		}
	});
}