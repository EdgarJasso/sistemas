$(function () {
    $('#bit_fecha').datetimepicker({
        icons: {
            time: "icon-clock",
            date: "iconcalendar",
            up: "icon-arrow-up2",
            down: "icon-arrow-down2",
            previous: "icon-arrow-left2",
            next: "icon-arrow-right2",
            today: "icon-target",
            clear: "icon-bin"
        }
    });
});
$(function () {
    $('#bit_fecha_e').datetimepicker({
        icons: {
            time: "icon-clock",
            date: "iconcalendar",
            up: "icon-arrow-up2",
            down: "icon-arrow-down2",
            previous: "icon-arrow-left2",
            next: "icon-arrow-right2",
            today: "icon-target",
            clear: "icon-bin"
        }
    });
});

function AgregarViewBitacora(datos){ 

    d = datos.split('||');
    
    $('#view_id_bitacora').html(d[0]);
    $('#view_id_peticion').html(d[1]);
	$('#view_encargado').html(d[2]);
	$('#view_fecha').html(d[3]);
    $('#view_estado').html(d[4]);
    $('#view_comentarios').html(d[5]);

}

function  agregardatosbit(idpeticion, encargado, fecha, estado, comentarios){
    cadena="idpeticion=" + idpeticion +
		   "&encargado=" + encargado +
           "&fecha=" + fecha +
           "&estado=" + estado +
           "&comentarios=" + comentarios;
        //alert(cadena);
        $.ajax({
            type:"post",
            url:"../../cuerpo/contenido/bitacora/add.php",
            data: cadena,
            success:function(data){
                if(data==1){
                    Swal.fire({
                        title: 'Agregado Exitosamente!',
                        icon: 'success',
                        timer: 3000,
                        timerProgressBar: true,
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                    $('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
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

function agregarformBit(datos){
    d = datos.split('||');
 
	$('#IdBitacora_e').val(d[0]);
	$('#bit_peticion_e').val(d[1]);
	$('#bit_encargado_e').val(d[2]);
    $('#bit_fecha_e').val(d[3]);
    $('#bit_estado_e').val(d[4]);
    $('#bit_comentarios_e').val(d[5]);

}

function actualizaDatosBit(){
    idBit=$('#IdBitacora_e').val();
    idPet=$('#bit_peticion_e').val();
	encargado=$('#bit_encargado_e').val();
	fecha=$('#bit_fecha_e').val();
    estado=$('#bit_estado_e').val();
    comentarios=$('#bit_comentarios_e').val();
    
	cadenaBit=
    "idBit="+ idBit +
	"&idPet=" +idPet+
	"&encargado="+encargado+
    "&fecha="+fecha+
    "&estado="+estado+
    "&comentarios="+comentarios;
  
    $.ajax({
        type:"post",
        url:"../../cuerpo/contenido/bitacora/edit.php",
        data: cadenaBit,
        success:function(data){
            if(data==1){
                Swal.fire({
                    title: 'Actualizado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                $('#marcadores').load('../../php/marcadores.php');
                $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
                $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
                $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
                $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
                $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
                $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
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

function preguntarBit(id){
 alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
 function(){ eliminarDatosBit(id) },
 function(){ alertify.error('Se cancelo')});
}

function eliminarDatosBit(id){
	cadena = "id="+id;
	 
    $.ajax({
        type:"post",
        url:"../../cuerpo/contenido/bitacora/delete.php",
        data: cadena,
        success:function(data){
            if(data==1){
                Swal.fire({
                    title: 'Eliminado Exitosamente!',
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
                });
                $('#marcadores').load('../../php/marcadores.php');
    $('#contenedor_area').load('../../cuerpo/contenido/area/tabla.php'); 
    $('#contenedor_empleados').load('../../cuerpo/contenido/empleados/tabla.php'); 
    $('#contenedor_usuarios').load('../../cuerpo/contenido/usuarios/tabla.php'); 
    $('#contenedor_servicios').load('../../cuerpo/contenido/servicios/tabla.php'); 
    $('#contenedor_peticiones').load('../../cuerpo/contenido/peticiones/tabla.php'); 
    $('#contenedor_bitacora').load('../../cuerpo/contenido/bitacora/tabla.php'); 
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


$(document).ready(function(){
	$("#guardar_bitacora").click(ValidarBitNew);
		$("#bit_peticion").click(validarBitPet);
		$("#bit_encargado").click(validarBitEncargado);
		$("#bit_fecha").click(validarBitFecha);
		$("#bit_estado").click(validarBitEstado);

    $("#actualizar_bitacora").click(ValidarBitNew_e);
		$("#bit_peticion_e").click(validarBitPet_e);
		$("#bit_encargado_e").click(validarBitEncargado_e);
		$("#bit_fecha_e").click(validarBitFecha_e);
		$("#bit_estado_e").click(validarBitEstado_e);

});

function ValidarBitNew(){
    var b_peticion = validarBitPet();
    var b_encargado = validarBitEncargado();
    var b_fecha = validarBitFecha();
    var b_estado = validarBitEstado();

    if( b_peticion == "true" && b_encargado == "true" && b_fecha == "true"&& b_estado == "true" ){
        info_peticion =  $("#bit_peticion").val();
        info_encargado =  $("#bit_encargado").val();
        info_fecha = $("#bit_fecha").val();
        info_estado =  $("#bit_estado").val();
        info_comentarios = $("#bit_comentarios").val();
        
        agregardatosbit(info_peticion, info_encargado, info_fecha, info_estado, info_comentarios);
    
    }else{
        console.log('Error al agregar informacion(Bitacora)');
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

function validarBitPet(){
	var valor = document.getElementById("bit_peticion").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_pet').remove();
		$('#bit_peticion').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_peticion').parent().append('<span id="icono_texto_bit_pet" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_pet').remove();
		$('#bit_peticion').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_peticion').parent().children("span").text("").hide();
		$('#bit_peticion').parent().append('<span id="icono_texto_bit_pet" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarBitEncargado(){
	var valor = document.getElementById("bit_encargado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_enc').remove();
		$('#bit_encargado').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_encargado').parent().append('<span id="icono_texto_bit_enc" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_enc').remove();
		$('#bit_encargado').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_encargado').parent().children("span").text("").hide();
		$('#bit_encargado').parent().append('<span id="icono_texto_bit_enc" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarBitFecha(){
    
    var valor = document.getElementById("bit_fecha").value;
  //  alert(valor);
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
    let espacios = /^\s$/;
    let fecha = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9]|2[aApP][mM])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0){
		$('#icono_texto_bit_fecha').remove();$('.input-group-addon').remove();
		$('#bit_fecha').parent().attr("class", "form-group has-error has-feedback");
        $('#bit_fecha').parent().append('<span id="icono_texto_bit_fecha" class="icon-cross form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		$('#text_help_pet_fecha').text("Ingrese un formato valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_fecha').remove();
		$('#bit_fecha').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_fecha').parent().children("span").text("").hide();
		$('#bit_fecha').parent().append('<span id="icono_texto_bit_fecha" class="icon-checkmark form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		estado  = "true";
    }
    
return estado;
}
function validarBitEstado(){
	var valor = document.getElementById("bit_estado").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_est').remove();
		$('#bit_estado').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_estado').parent().append('<span id="icono_texto_bit_est" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_est').remove();
		$('#bit_estado').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_estado').parent().children("span").text("").hide();
		$('#bit_estado').parent().append('<span id="icono_texto_bit_est" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function ValidarBitNew_e(){
    var b_peticion_e = validarBitPet_e();
    var b_encargado_e = validarBitEncargado_e();
    var b_fecha_e = validarBitFecha_e();
    var b_estado_e = validarBitEstado_e();

    if( b_peticion_e == "true" && b_encargado_e == "true" && b_fecha_e == "true"&& b_estado_e == "true" ){
        info_peticion_e =  $("#bit_peticion").val();
        info_encargado_e =  $("#bit_encargado").val();
        info_fecha_e = $("#bit_fecha").val();
        info_estado_e =  $("#bit_estado").val();
        info_comentarios_e = $("#bit_comentarios").val();
        
        actualizaDatosBit();
    
    }else{
        console.log('Error al Editar informacion(Bitacora)');
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

function validarBitPet_e(){
	var valor = document.getElementById("bit_peticion_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_pet_e').remove();
		$('#bit_peticion_e').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_peticion_e').parent().append('<span id="icono_texto_bit_pet_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion_e').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_pet_e').remove();
		$('#bit_peticion_e').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_peticionv').parent().children("span").text("").hide();
		$('#bit_peticion_e').parent().append('<span id="icono_texto_bit_pet_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarBitEncargado_e(){
	var valor = document.getElementById("bit_encargado_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_enc_e').remove();
		$('#bit_encargado_e').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_encargado_e').parent().append('<span id="icono_texto_bit_enc_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion_e').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_enc_e').remove();
		$('#bit_encargado_e').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_encargado_e').parent().children("span").text("").hide();
		$('#bit_encargado_e').parent().append('<span id="icono_texto_bit_enc_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}
function validarBitFecha_e(){
    
    var valor = document.getElementById("bit_fecha_e").value;
  //  alert(valor);
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
    let espacios = /^\s$/;
    let fecha = /^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9]|2[aApP][mM])$/;
	let estado  = "false";

	if( valor == null || valor.length == 0){
		$('#icono_texto_bit_fecha_e').remove();$('.input-group-addon').remove();
		$('#bit_fecha_e').parent().attr("class", "form-group has-error has-feedback");
        $('#bit_fecha_e').parent().append('<span id="icono_texto_bit_fecha_e" class="icon-cross form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		$('#text_help_pet_fecha_e').text("Ingrese un formato valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_pet_fecha_e').remove();
		$('#bit_fecha_e').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_fecha_e').parent().children("span").text("").hide();
		$('#bit_fecha_e').parent().append('<span id="icono_texto_bit_fecha_e" class="icon-checkmark form-control-feedback mt-2" style="right: 30px;top: 40px;"></span><span class="input-group-addon"><span class="icon-calendar"></span></span>');
		estado  = "true";
    }
    
return estado;
}
function validarBitEstado_e(){
	var valor = document.getElementById("bit_estado_e").value;
	let numeros = /[0-9]/;
	let letras = /^[a-zA-ZáéíóúÁÉÍÓÚ]{5,20}\s{0,1}[a-zA-ZáéíóúÁÉÍÓÚ]{0,20}$/;
	let espacios = /^\s$/;
	let estado  = "false";

	if( valor == "null"){
		$('#icono_texto_bit_est_e').remove();
		$('#bit_estado_e').parent().attr("class", "form-group has-error has-feedback");
		$('#bit_estado_e').parent().append('<span id="icono_texto_bit_est_e" class="icon-cross form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		$('#text_bit_peticion_e').text("Seleccione un registro valido").show();
		estado  = "false";
	}else{
		$('#icono_texto_bit_est_e').remove();
		$('#bit_estado_e').parent().attr("class", "form-group has-success has-feedback");
		$('#bit_estado_e').parent().children("span").text("").hide();
		$('#bit_estado_e').parent().append('<span id="icono_texto_bit_est_e" class="icon-checkmark form-control-feedback mt-2" style="right: 10px;top: 35px;"></span>');
		estado  = "true";
    }

return estado;
}

function PrintBit(){
    Swal.fire({
                    title: 'Espere un momento!',
                    icon: 'info',
                    timer: 2000,
                    timerProgressBar: true,
                    showCancelButton: false,
                    showConfirmButton: false
    });
}