$(document).ready(function(){

    $("#area").click(validarArea);
    $("#area").change(generarempleados);

    $("#empleado").click(validarEmpleado);
    $("#servicio").click(validarServicio);

    $("#btn-send").click(ValidarInfo);

   // $("#entrar").click(CheckLogin);
});
jQuery(document).on('submit', '#login', function(event){
    event.preventDefault();
    CheckLogin();
});

function ValidarInfo(){
    var Area = validarArea();
    var Empleado = validarEmpleado();
    var Servicio = validarServicio();

    if( Area == "true" && Empleado == "true" && Servicio == "true" ){
        info_area =  $("#area").val();
        info_empleado =  $("#empleado").val();
        info_servicio =  $("#servicio").val();
        info_comentarios = $("#comentarios").val();
        
        AgregarInfo(info_area, info_empleado, info_servicio, info_comentarios);
    
    }else{
        console.log('Error al agregar informacion(Peticion)');
        Swal.fire({
            title: 'Error en la validacion \n Favor de revisar',
            icon: 'warning',
            timer: 2000,
            timerProgressBar: true,
            showCancelButton: false,
            showConfirmButton: false
        });
    }

}
function AgregarInfo(info_area, info_empleado, info_servicio, info_comentarios){
    cadena = "info_empleado=" + info_empleado +
             "&info_area=" + info_area + 
             "&info_servicio=" + info_servicio+
             "&comentarios=" + info_comentarios;
    $.ajax({
        type:"post",
        url:"php/peticion.php",
        data: cadena,
        success:function(data){
            if(data==1){
                Swal.fire({
                    title: 'Su infromacion a sido enviada correctamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                limpiarcampos();
            }else{
                console.log(data);
                Swal.fire({
                    title: 'Error en el proceso!\n\n\n'+data,
                    icon: 'error',
                    confirmButtonText: 'Continuar'
                });
            }
        }
    });
}
function generarempleados(){
    var id_a = $('#area').val();
    var id = "empleado";
    cadena = "id_a=" + id_a +
             "&id=" + id;
    $.ajax({
    type:"post",
    url:"php/generar_empleados.php",
    data: cadena,
        success:function(data){
            $('#empleado').html(data);
        }
    });
}
function validarArea(){
	var valor = document.getElementById("area").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_area').remove();
		$('#area').parent().attr("class", "form-group has-error has-feedback");
		$('#area').parent().append('<span id="icono_texto_area" class="icon-cross form-control-feedback mt-2" style="right: 10px;"></span>');
		$('#text_help_area').text("Seleccione un area valida").show();
		estado  = "false";
	}else{
		$('#icono_texto_area').remove();
		$('#area').parent().attr("class", "form-group has-success has-feedback");
		$('#area').parent().children("span").text("").hide();
		$('#area').parent().append('<span id="icono_texto_area" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarEmpleado(){
	var valor = document.getElementById("empleado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_empleado').remove();
		$('#empleado').parent().attr("class", "form-group has-error has-feedback");
		$('#empleado').parent().append('<span id="icono_texto_empleado" class="icon-cross form-control-feedback mt-2" style="right: 10px;"></span>');
		$('#text_help_empleado').text("Seleccione un empleado valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_empleado').remove();
		$('#empleado').parent().attr("class", "form-group has-success has-feedback");
		$('#empleado').parent().children("span").text("").hide();
		$('#empleado').parent().append('<span id="icono_texto_empleado" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function validarServicio(){
	var valor = document.getElementById("servicio").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_servicio').remove();
		$('#servicio').parent().attr("class", "form-group has-error has-feedback");
		$('#servicio').parent().append('<span id="icono_texto_servicio" class="icon-cross form-control-feedback mt-2" style="right: 10px;"></span>');
		$('#text_help_servicio').text("Seleccione un servicio valido ").show();
		estado  = "false";
	}else{
		$('#icono_texto_servicio').remove();
		$('#servicio').parent().attr("class", "form-group has-success has-feedback");
		$('#servicio').parent().children("span").text("").hide();
		$('#servicio').parent().append('<span id="icono_texto_servicio" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;"></span>');
		estado  = "true";
    }
    
return estado;
}
function limpiarcampos(){

    $('#icono_texto_area').remove();
    $('#area').parent().attr("class", "form-group");
    $('#area').val("null");

    $('#icono_texto_empleado').remove();
    $('#empleado').parent().attr("class", "form-group");
    $('#empleado').val("null");

    $('#icono_texto_servicio').remove();
    $('#servicio').parent().attr("class", "form-group");
    $('#servicio').val("null");

    $('#comentarios').val("");
}
function CheckLogin(){ 
    var CL_name = $('#name').val();
    var CL_pass = $('#pass').val();

    cadenaCL = "name=" + CL_name +
             "&pass=" + CL_pass;
    $.ajax({
        type:"post",
        url:"root/checklogin.php",
        data: cadenaCL,
        success:function(r){
            if(r==1){
                console.log(r);
                Swal.fire({
                    title: 'Acceso Aprobado!',
                    icon: 'success',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/root/index.php";
                    }, 2000);
            }else if(r==0){
                console.log(r);
                Swal.fire({
                    title: 'Acceso Denegado!',
                    icon: 'warning',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/index.php";
                    }, 2000);
            }else{
                console.log(r);
                Swal.fire({
                    title: 'Informacion Erronea!',
                    icon: 'error',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                setTimeout(
                    function(){
                        window.location.href = "../php/index.php";
                    }, 2000);
            }
        }
    });
}