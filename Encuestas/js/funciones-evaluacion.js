$(document).ready(function(){
//	$(".contestar").click(GenerarEvaluacion);
	$('#faltantes').on('click', '.validacion', function(){
		let Id_validacion = $(this).data("validacion");
		GenerarEvaluacion(Id_validacion)
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